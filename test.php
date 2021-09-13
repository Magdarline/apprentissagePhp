<?php
session_start();
include("./script/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Deuxieme projet</title>
</head>
<body>
<?php include("./partial/_navBar.php");?>
<h1>ma page test</h1>

<pre>
============================================================

<?php
    if ($_SESSION["user"]) {
        echo "vous êtes connecté";
    } else {
        echo "vous n'existez pas";
    }
    ?>

============================================================
</pre>

<pre>
============================================================

<?php
    if (in_array("ROLE_ADMIN", $_SESSION["user"]["role"])) {
        echo "vous êtes administrateur";
    } else {
        echo "vous n'avez pas de role particulier";
    }
    ?>

============================================================
</pre>

<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>