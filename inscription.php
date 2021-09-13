<?php
session_start();
include("./script/functions.php");

if (!empty($_POST)) {
    $securizedDataFromForm = treatFormData (
        $_POST,
        "name",
        "firstName",
        "email",
        "password",
);

    extract($securizedDataFromForm, EXTR_OVERWRITE);
    $data = openDB();

    $hashPassword = password_hash($password, PASSWORD_ARGON2ID);

    array_push($data["user"], [
        "email" => $email,
        "name" => $name,
        "firstName" => $firstName,
        "password" => $hashPassword,
        "role" => ["ROLE_USER"],
    ]);
    writeDB($data);


    header("Location: /connexion.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Inscription</title>
</head>

<body>
    <?php include("./partial/_navBar.php"); ?>
    <div class="container">
        <h1>Inscription</h1>
        <form method="post">
            <div class="form-group">
                <label class="col-form-label" for="name">Nom: </label>
                <input type="text" class="form-control border border-3" name="name">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="firstName">Prénom : </label>
                <input type="text" class="form-control border border-3" name="firstName">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="email">E-mail : </label>
                <input type="email" class="form-control border border-3" name="email">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="password">Mot de passe : </label>
                <input type="password" class="form-control border border-3" name="password">
            </div>
            <input class="btn btn-primary mb-4 mt-3" type="submit" value="S'INSCRIRE">
        </form>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>