<?php
session_start();
if($_SESSION["user"]) {
    if (!in_array("ROLE_ADMIN", $_SESSION["user"] ["role"])) {
        header("Location:/");
    }
} else {
    header("Location:/");
}
include("./script/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Page admin</title>
</head>
<body>
    <?php include("./partial/_navBar.php");?>
    <div class="container">
        <h1>Page Admin</h1>
        <p>Page accessible uniquement à l'administrateur</p>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>