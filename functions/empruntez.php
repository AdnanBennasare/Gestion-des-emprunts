<?php
session_start();
require_once '../oopConnection.php';

  $db = new Database("localhost", "root", "", "books");
  $conn = $db->getConnection();
  
  
  $empruntez = 'empruntez';
  $code_ouvrage = $_POST['code_ouvrage_emp'];
  $code_adherent = $_POST["code_adherent_emp"];
  $code_reservation = $_POST["code_reservation_emp"];
  $date_emprunt = date('Y-m-d H:i:s', time());
  $date_retour = '';
  $code_emprunt = '';


  $stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
  $stmt->bindParam(':ouvrage_state', $empruntez);
  $stmt->bindParam(':code_ouvrage', $code_ouvrage);


  $stmt2 = $conn->prepare("INSERT INTO emprunt (code_emprunt, date_emprunt, date_retour , code_ouvrage, code_adherent, code_reservation)
  VALUES (:code_emprunt, :date_emprunt, :date_retour , :code_ouvrage, :code_adherent, :code_reservation)");
  $stmt2->bindParam(':code_emprunt', $code_emprunt);
  $stmt2->bindParam(':date_emprunt', $date_emprunt);
  $stmt2->bindParam(':date_retour', $date_retour);
  $stmt2->bindParam(':code_ouvrage', $code_ouvrage);
  $stmt2->bindParam(':code_adherent', $code_adherent);
  $stmt2->bindParam(':code_reservation', $code_reservation);


$stmt4 = $conn->prepare("DELETE FROM reservation WHERE code_reservation = :code_reservation");
$stmt4->bindParam(':code_reservation', $code_reservation);






$stmt3 = $conn->prepare("SELECT COUNT(*) AS total_count
FROM (
  SELECT code_reservation, code_adherent FROM reservation
  UNION ALL
  SELECT code_emprunt, code_adherent FROM emprunt WHERE date_retour = '0000-00-00'
) AS combined
WHERE combined.code_adherent = :code_adherent");





$stmt3->bindParam(':code_adherent', $user_id);
$stmt3->execute();
$rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$count = $rows3[0]['total_count'];
echo $count;


if ($count >= 3) {

  $_SESSION['user_empruntez_3'] = "sorry your empruntez more than 3 item";
  echo $_SESSION['user_empruntez_3'];
  exit();
  

} else {
  


  
  $_SESSION['valideeReservation'] = "valideeReservation";
  echo $_SESSION['valideeReservation'];
  header("Location: ../officereservations.php");

  $stmt->execute();
  $stmt2->execute();
$conn->exec('SET foreign_key_checks = 0');
  $stmt4->execute();
  $conn->exec('SET foreign_key_checks = 1');

}


