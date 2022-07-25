<?php session_start();
require 'config.php';
require 'functions.php';
require 'classes/User.php';
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta content="True" name="HandheldFriendly">
    <meta content="width=device-width, initial-scale=1, maximum-scale=3.0, user-scalable=3" name="viewport" >
    <meta name="description" content="Aplicatie management utilizatori">
    <meta name="keywords" content="utilizatori, management, aplicatie">
    <meta name="author" content="Andreea Goga">
    <meta name="copyright" content="Copyright 2022, Andreea Goga">
    <meta name="owner" content="Andreea Goga">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#9f111b" />
    <title>Aplicatie management date utilizatori</title>
    <link href="style.css" rel="stylesheet">
<!--     CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--     JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<!--<div>-->
<!--    <a href='index.php' target='_self'>Mergi la pagina principala</a>-->
<!--    <form action="logout.php" method="POST">-->
<!--        <input type="submit" value="Log out" name="logout"/>-->
<!--    </form>-->
<!---->
<!--</div>-->
<div>
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <?php if(empty($_SESSION['username']) )
    {
    ?>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li> <li class="nav-item">
        <?php } ?>
        <a class="nav-link" href="inscriere.php">Inscriere</a>
    </li>
    <?php if(isset($_SESSION['username']))
    {
        ?>
        <li class="nav-item" >
        <a class="nav-link" href = "logout.php" > Logout</a >
    </li >
    <?php }?>
    <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil</a>
    </li> <li class="nav-item">
</ul>
</div>
</body>

</html>
<?php

$urlurl=$_SERVER['QUERY_STRING'];
$urlurllen = strlen($urlurl);
if($urlurllen >= '20') {
    "<meta http-equiv='refresh' content='0'; URL='index.php'>";
}
?>
