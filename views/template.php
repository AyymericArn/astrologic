<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Capriola|Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/main.css">
</head>

<body>
    <?php include('../views/layout/header.php'); ?>
    <?= $content ?>
    <?php include('../views/layout/footer.php'); ?>
    <script type="module" src="./public/js/home.js"></script>
    <script type="module" src="./public/js/app.js"></script>
</body>
</html>