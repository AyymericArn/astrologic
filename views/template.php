<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <style> * {display: block;}</style>
    <link rel="stylesheet" href="./public/css/main.css">
</head>

<body>
    <?php include('../views/layout/header.php'); ?>
    <?= $content ?>
    <?php include('../views/layout/footer.php'); ?>
    <script type="module" src="./public/js/app.js"></script>
</body>
</html>