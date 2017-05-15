<?php

class Model {

        private function connect(){
            $conn;
            if(!isset($conn)){ // Jika tidak ada sambungan database yang tersambung
                $conn = new mysqli(
                    'host', 
                    'username', 
                    'password',
                    'database');
            }
            return $conn;
        }

        protected function query_this($query){
            $conn = $this->connect();
            $conn->query($query); // 1.) $result menyimpan hasil query dalam bentuk ASSOCIATIVE ARRAY
            $conn->close();
        }

        protected function query_this_and_return($query){
            $conn = $this->connect();
            $result = $conn->query($query); // 1.) $result menyimpan hasil query dalam bentuk ASSOCIATIVE ARRAY
            $conn->close();
            $rows_arr = array(); // 2.) Membuat wadah ARRAY untuk kumpulan record
            /*
                3.) $row_arr adalah suatu ARRAY yang berisi field2 dari satu record
                Semua record akan dikeluarkan dengan menggunakan fungsi fetch_assoc()
                selama $result ada isinya
            */
            while($row_arr = $result->fetch_assoc()) 
            {
                /*
                    4.) $row_arr yang tadinya adalah ARRAY kemudian diconvert menjadi bentuk OBJECT
                    dan disimpan dalam variabel sementara $row_obj.
                    Hal ini supaya pengaksesannya mudah.
                */
                $row_obj = (object) $row_arr;
                /*
                    5.) $row_obj kemudian dimasukkan ke dalam ARRAY $rows_arr untuk dikumpulkan.
                */
                $rows_arr[] = $row_obj;
            }
            
            /*
                6.) $rows_arr yang tadinya adalah ARRAY 
                kemudian diconvert ke bentuk OBJECT supaya bisa dilakukan foreach();
            */            
            $rows = (object) $rows_arr;
            return $rows;
        }

        public function to_single_row($object){
            $new_array = (array) $object;
            // print_r($new_array);
            $row = $new_array[0];

            return $row;
        }

        public function find($table, $conditions){
            // echo $table.", ".$conditions;
            $rows = $this->where($table, $conditions);
            $row = $this->to_single_row($rows);

            return $row;
        }

        public function all($table){
            $query = "select * from $table";
            $rows = $this->query_this_and_return($query);

            return $rows;
        }

        public function only_where($table, $fields, $conditions){
            $query = "select $fields from $table where $conditions";
            $rows = $this->query_this_and_return($query);

            return $rows;
        }

        public function where($table, $conditions){
            // echo $table.", ".$conditions;
            $query = "select * from $table where $conditions";
            // echo $query;
            $rows = $this->query_this_and_return($query);

            return $rows;
        }

        public function count($table, $conditions){
            $query;
            if ($conditions != "") {
                $query = "select count(*) as count from $table where $conditions";
            }else{
                $query = "select count(*) as count from $table";
            }
            $rows = $this->query_this_and_return($query);
            $row = $this->to_single_row($rows);
            $value = $row->count;
            
            return $value;
        }

        public function get_id($field, $value){

            // echo $field.", ".$value;
            $row = $this->find("users", "$field = $value");
            $id = $row->id;

            return $id;

        }

}