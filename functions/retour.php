<?php 
session_start();


require_once '../oopConnection.php';

$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


$available = 'available';
$currentdate = date('Y-m-d H:i:s', time());
$code_adherent = $_POST['code_adherent_emp'];
$code_ouvrage = $_POST['code_ouvrage_emp'];
$code_emprunt = $_POST['code_emprunt_emp'];



$stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
$stmt->bindParam(':ouvrage_state', $available);
$stmt->bindParam(':code_ouvrage', $code_ouvrage);


$stmt2 = $conn->prepare("UPDATE emprunt SET date_retour = :date_retour WHERE code_emprunt  = :code_emprunt");
$stmt2->bindParam(':date_retour', $currentdate);
$stmt2->bindParam(':code_emprunt', $code_emprunt);





echo 'evreything is allrigth';
$conn->exec('SET foreign_key_checks = 0');
$stmt->execute();
$conn->exec('SET foreign_key_checks = 1');
$conn->exec('SET foreign_key_checks = 0');
$stmt2->execute();
$conn->exec('SET foreign_key_checks = 1');


$_SESSION["returned"] = 'returned';
echo $_SESSION["returned"];
header("Location: ../ouvrageretournez.php");
?>