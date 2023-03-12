<?php 
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


require_once 'classes/signupClass.php';







$code_adherent = null;
$nome = $_POST["name"];
$adresse = $_POST["adresse"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cin = $_POST["cin"];
$date_birth = $_POST["birth_date"]; 
$type = $_POST["type"];
$penaltie = 0;
$nickname = $_POST["username"];
$password = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
$date_creation = date('Y-m-d H:i:s', time());
$admin = 0;

$adherent = new Adherent($code_adherent, $nome, $adresse, $email, $phone, $cin, $date_birth, $type, $penaltie, $nickname, $password, $date_creation, $admin);

$stmt = $conn->prepare("INSERT INTO adherent (code_adherent, nome, adresse, email, phone, cin, date_birth, type, penaltie, nickname, password, date_creation, admin)
VALUES (:code_adherent, :nome, :adresse, :email, :phone, :cin, :date_birth, :type, :penaltie, :nickname, :password, :date_creation, :admin)");

$stmt->bindParam(":code_adherent", $adherent->code_adherent);
$stmt->bindParam(":nome", $adherent->nome);
$stmt->bindParam(":adresse", $adherent->adresse);
$stmt->bindParam(":email", $adherent->email);
$stmt->bindParam(":phone", $adherent->phone);
$stmt->bindParam(":cin", $adherent->cin);
$stmt->bindParam(":date_birth", $adherent->date_birth);
$stmt->bindParam(":type", $adherent->type);
$stmt->bindParam(":nickname", $adherent->nickname);
$stmt->bindParam(":penaltie", $adherent->penaltie);
$stmt->bindParam(":password", $adherent->password);
$stmt->bindParam(":date_creation", $adherent->date_creation);
$stmt->bindParam(":admin", $adherent->admin);


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
    $stmt->execute();
    header("location: loginPage.php");

}