<?php 

require_once '../oopConnection.php';

$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();

require_once '../classes/signupClass.php';


$code_adherent = ""; // Use an empty string as the default value
$nome = $_POST["name"];
$adresse = $_POST["adresse"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cin = $_POST["cin"];
$date_birth = $_POST["birth_date"];
$type = $_POST["type"];
$penaltie = 0;
$nickname = $_POST["username"];
$password = password_hash($_POST["Password"], PASSWORD_DEFAULT);
$date_creation = date('d-m-y h:i:s');
$admin = 'false';
$id_user = $_POST["id_user"];

$adherent = new Adherent($code_adherent, $nome, $adresse, $email, $phone, $cin, $date_birth, $type, $penaltie, $nickname, $password, $date_creation, $admin);

$stmt = $conn->prepare("UPDATE adherent 
                        SET 
                            code_adherent = :code_adherent,
                            nome = :nome,
                            adresse = :adresse,
                            email = :email,
                            phone = :phone,
                            cin = :cin,
                            date_birth = :date_birth,
                            type = :type,
                            penaltie = :penaltie,
                            nickname = :nickname,
                            password = :password,
                            date_creation = :date_creation,
                            admin = :admin 
                        WHERE code_adherent = :id_user");

$stmt->bindParam(':code_adherent', $id_user); // Bind the variable, not the superglobal
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':cin', $cin);
$stmt->bindParam(':date_birth', $date_birth);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':penaltie', $penaltie);
$stmt->bindParam(':nickname', $nickname);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':date_creation', $date_creation);
$stmt->bindParam(':admin', $admin);
$stmt->bindParam(':id_user', $id_user);



$query = $conn->prepare("SELECT cin, nickname, email, phone, code_adherent FROM adherent WHERE email = :email OR phone = :phone OR cin = :cin OR nickname = :nickname");
$query->execute(array(':email' => $email, ':phone' => $phone,  ':nickname' => $nickname, ':cin' => $cin));
$row = $query->fetch(PDO::FETCH_ASSOC);




print_r($row);
echo $id_user;




if ($row && $row['code_adherent'] == $id_user) {


  $conn->exec('SET foreign_key_checks = 0');
    $stmt->execute();
    $conn->exec('SET foreign_key_checks = 1');
  echo "tokhalif";

  header("location: ../profile.php");




} elseif ($row && $row['code_adherent'] !== $id_user){

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
  $conn->exec('SET foreign_key_checks = 0');
    $stmt->execute();
    $conn->exec('SET foreign_key_checks = 1');

}


















// UPDATE adherent 
// SET 
//     code_adherent = :code_adherent,
//     nome = :nome,
//     adresse = :adresse,
//     email = :email,
//     phone = :phone,
//     cin = :cin,
//     date_birth = :date_birth,
//     type = :type,
//     penaltie = :penaltie,
//     nickname = :nickname,
//     password = :password,
//     date_creation = :date_creation,
//     admin = :admin 
// WHERE id_user = :id_user
// PHP code:

// bash
// Copy code
// $id_user = $_POST["id_user"];

// $stmt = $conn->prepare("UPDATE adherent 
//                         SET 
//                             code_adherent = :code_adherent,
//                             nome = :nome,
//                             adresse = :adresse,
//                             email = :email,
//                             phone = :phone,
//                             cin = :cin,
//                             date_birth = :date_birth,
//                             type = :type,
//                             penaltie = :penaltie,
//                             nickname = :nickname,
//                             password = :password,
//                             date_creation = :date_creation,
//                             admin = :admin 
//                         WHERE id_user = :id_user");

// $stmt->bindParam(':code_adherent', $_POST['code_adherent']);
// $stmt->bindParam(':nome', $_POST['nome']);
// $stmt->bindParam(':adresse', $_POST['adresse']);
// $stmt->bindParam(':email', $_POST['email']);
// $stmt->bindParam(':phone', $_POST['phone']);
// $stmt->bindParam(':cin', $_POST['cin']);
// $stmt->bindParam(':date_birth', $_POST['date_birth']);
// $stmt->bindParam(':type', $_POST['type']);
// $stmt->bindParam(':penaltie', $_POST['penaltie']);
// $stmt->bindParam(':nickname', $_POST['nickname']);
// $stmt->bindParam(':password', $_POST['password']);
// $stmt->bindParam(':date_creation', $_POST['date_creation']);
// $stmt->bindParam(':admin', $_POST['admin']);
// $stmt->bindParam(':id_user', $id_user);

// $stmt->execute();
?>