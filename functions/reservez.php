<?php
session_start();
require_once '../oopConnection.php';

  $db = new Database("localhost", "root", "", "books");
  $conn = $db->getConnection();
  

// BRINGINS THE VALUES
  $reserved = 'reserved';
  $code_ouvrage = $_POST['code_ouvrage'];
  $user_id = $_POST["user_id"];
  $code_reservation = '';
  $date_reservation = date('Y-m-d H:i:s', time());
  $date_expiration = date('Y-m-d H:i:s', strtotime($date_reservation . ' +1 day'));

  
// ----------------------------- UPDATE OUVRAGE STATE--------------------------
  $stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
  $stmt->bindParam(':ouvrage_state', $reserved);
  $stmt->bindParam(':code_ouvrage', $code_ouvrage);



// ---------------------------------------- AD RESERVATION---------------------------------
  $stmt2 = $conn->prepare("INSERT INTO reservation (code_reservation, date_reservation, date_expiration, code_ouvrage, code_adherent)
  VALUES (:code_reservation, :date_reservation, :date_expiration, :code_ouvrage, :code_adherent)");
  $stmt2->bindParam(':code_reservation', $code_adherent);
  $stmt2->bindParam(':date_reservation', $date_reservation);
  $stmt2->bindParam(':date_expiration', $date_expiration);
  $stmt2->bindParam(':code_ouvrage', $code_ouvrage);
  $stmt2->bindParam(':code_adherent', $user_id);
  


//  CHECKING IF USER HAS MORE THAN 3 RESERVATION BOrroING

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





if ($count >= 3) {

  $_SESSION['user_reserved_3'] = "sorry your reserved more than 3 item";
  echo $_SESSION['user_reserved_3'];
  header("Location: ../homePage.php");

  exit();

} else {
  $_SESSION['reserved'] = "reserved";
  echo  $_SESSION['reserved'];
  $stmt->execute();
  $stmt2->execute();
  header("Location: ../homePage.php");

}






?>