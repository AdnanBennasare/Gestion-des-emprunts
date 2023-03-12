<?php
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


$password = $_POST["pwd"];
$re_password = $_POST["reapeat_pwd"];


if ($re_password !== $password) {
  echo 'not same pass';
  exit();

}











$stmt = $conn->prepare("INSERT INTO adherent (code_adherent, nome, adresse, email, phone, cin, date_birth, type, penaltie, nickname, password, date_creation, admin)
VALUES (:code_adherent, :nome, :adresse, :email, :phone, :cin, :date_birth, :type, :penaltie, :nickname, :password, :date_creation, :admin)");

$code_adherent = null;
$nome = $_POST["name"];
$adresse = $_POST["adresse"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cin = $_POST["cin"];
$birth_date = date('Y-m-d H:i:s', time());
$type = $_POST["type"];
$penaltie = 0;
$nickname = $_POST["username"];
$password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
$date = $_POST["birth_date"];
$admin = 'false';


$stmt->bindParam(':code_adherent', $code_adherent);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':cin', $cin);
$stmt->bindParam(':date_birth', $birth_date);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':penaltie', $penaltie);
$stmt->bindParam(':nickname', $nickname);
$stmt->bindParam(':password', $password_hash);
$stmt->bindParam(':date_creation', $date);
$stmt->bindParam(':admin', $admin);



$query = $conn->prepare("SELECT cin, nickname, email, phone FROM adherent WHERE email = :email OR phone = :phone OR cin = :cin OR nickname = :nickname");
$query->execute(array(':email' => $email, ':phone' => $phone,  ':nickname' => $nickname, ':cin' => $cin));

$row = $query->fetch(PDO::FETCH_ASSOC);
 
if ($row) {
  
  
  if ($row['email'] === $_POST["email"]) {
    echo 'email already kyn';
    die("name is nececed");

  }else if ($row['phone'] == $_POST["phone"]) {
    echo 'phone already kyn';
    exit;

  } else if ($row['nickname'] === $_POST["username"]) {
    echo 'nickname already kyn';
    exit;

  } else if ($row['cin'] === $_POST["cin"]) {
    echo 'cin already kyn';
    exit;

  }
  echo 'hhhhh';

} else {
  echo 'dcnjksnc';
    $stmt->execute();
    header("location: loginPage.php");
    echo 'successfully';

}


































// ================ TRUE

// $query = $pdo->prepare("SELECT email, phone FROM adherent WHERE email = :email or phone = :phone");
// $query->execute(array(':email' => $email, ':phone' => $phone));
// $row = $query->fetch();

// print_r($row);

// if ($row['email'] == $email) {
//   echo 'email already kyn';
// }

// if ($row['phone'] == $phone) {
//   echo 'phone already kyn';
// }



// if ($query->rowCount() > 0) {
//   echo "kynnnnnnnnnnn";
//   echo '<br>';
// while ($row = $query->fetch()) {
//   echo $row['code_adherent'];
//   echo '<br>';

// }
// } else {
//   $stmt->execute();
//   echo "successfully";

// }
