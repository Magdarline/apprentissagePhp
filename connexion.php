<?php
session_start();
include("./script/functions.php");

if (!empty($_POST)) {
    $securizedDataFromForm = treatFormData (
        $_POST,
        "email",
        "password",
    );
    extract($securizedDataFromForm, EXTR_OVERWRITE);
    $data = openDB();
    $users = $data["user"];
    foreach ($users as $user) {
        if ($email == $user["email"]) {
            $canConnect = password_verify($password, $user["password"]);
            if ($canConnect) {
                $_SESSION["user"] = [
                    "name" => $user["name"],
                    "firstName" => $user["firstName"],
                    "email" => $user["email"],
                    "role" => $user["role"],
                ];
                header("Location:/");
            } else {
                $badPassword = true;
            }
        }
        
    }
    $errorMessage = "l'email ou le mot de passe est invalide";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Connexion</title>
</head>
<body>
    <?php include("./partial/_navBar.php");?>
    <div class="container">
        <h1>Connexion</h1>

         <?php if($errorMessage); ?> 
        <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Attention!</h4>
        <p class="mb-0"> <?php echo $errorMessage ?></p>
        </div>
        
        <form method="post">
                
            <div class="form-group">
                <label class="col-form-label" for="email">E-mail : </label>
                <input type="email" class="form-control border border-3" name="email">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="password">Mot de passe : </label>
                <input type="password" class="form-control border border-3" name="password">
            </div>
            <input class="btn btn-primary mb-4 mt-3" type="submit" value="Se Connecter">
        </form>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>