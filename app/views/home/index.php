<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home/Index!</title>
</head>
<body>
    <h1>Hello, <?=$data['name']?></h1>              <!--They're the same-->
    <h1>Hello, <?php echo $data['name'];?></h1>
</body>
</html>