<?php
session_start();
require_once('config/connect_bdd.php');
if (isset($_SESSION['id'])) {
    if (isset($_POST['lastname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $id = $_SESSION['id'];
        $update = "UPDATE inscris SET lastname=:lastname,firstname=:firstname WHERE id=:id";
        $stmt = $dbh->prepare($update);
        $stmt->execute([':lastname' => $lastname, ':firstname' => $firstname, ':id' => $id]);
        
    }
    $req = "SELECT * FROM inscris WHERE id=:id";
        $stmt2 = $dbh->prepare($req);
        $stmt2->execute([':id' => $id]);
        $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        extract($result);
        var_dump($result);
}else{
    header('Location: index.php');
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

    <title>info</title>
</head>

<body>
    <form method="POST">
        <div class="form-group">
            <label for="firstname">firstname</label>
            <input type="text" class="form-control" id="firstname" value="<?=$firstname ?>" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" class="form-control" name="lastname" value="<?= $lastname ?>" id="lastname">
        </div>
        <button type="submit" class="btn btn-primary">modifier</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>