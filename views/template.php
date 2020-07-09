<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://kit.fontawesome.com/d45c6aae0f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>

<?php
include "modules/menu.php";
?>

<section>
<?php
$mvc = new MvcController();
$mvc -> enlacesPaginasController();
?>
</section>

</body>

</html>