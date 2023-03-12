<?php 
session_start();
require_once '../oopConnection.php';

  $db = new Database("localhost", "root", "", "books");
  $conn = $db->getConnection();
  
  
  $empruntez = 'available';
  $code_ouvrage = $_POST['code_ouvrage_emp'];
  $code_adherent = $_POST["code_adherent_emp"];
  $code_reservation = $_POST["code_reservation_emp"];
  $date_emprunt = date('d-m-y h:i:s');
  $date_retour =  date('d-m-y h:i:s', strtotime('+14 days'));
  $code_emprunt = '';

print_r($_POST);  

  $stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
  $stmt->bindParam(':ouvrage_state', $empruntez);
  $stmt->bindParam(':code_ouvrage', $code_ouvrage);
  $stmt->execute();


$stmt4 = $conn->prepare("DELETE FROM reservation WHERE code_reservation = :code_reservation");
$stmt4->bindParam(':code_reservation', $code_reservation);

$conn->exec('SET foreign_key_checks = 0');
$stmt4->execute();
$conn->exec('SET foreign_key_checks = 1');


header("location: ../profile.php");
$_SESSION['cancelle_succesfully'] = 'cancelle-succesfully';


?>