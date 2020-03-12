<?php
$user = 'root';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ecf_afpa', $user);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}