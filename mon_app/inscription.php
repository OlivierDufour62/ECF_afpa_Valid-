<?php
session_start();
require_once('config/connect_bdd.php');

if(isset($_POST['lastname'])){
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT);

$req = "INSERT INTO inscris (lastname, firstname, email, password) VALUES (:lastname,:firstname,:email,:password)";
$stmt = $dbh->prepare($req);
$stmt->execute([':lastname'=>$lastname,':firstname'=>$firstname,':email'=>$email, ':password'=>$password]);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<title>inscription</title>
</head>
<body>
<form method="POST">
        <div class="form-group">
            <label for="firstname">firstname</label>
            <input type="text" class="form-control" id="firstname" value="" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" class="form-control" name="lastname" value="" id="lastname">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">inscription</button>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

