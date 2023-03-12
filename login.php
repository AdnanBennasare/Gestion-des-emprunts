<?php
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();

session_start();

$nickname = htmlspecialchars($_POST["Username"]);

  $stmt = $conn->prepare("SELECT * FROM adherent WHERE nickname =:nickname");
  $stmt->bindParam(':nickname', $nickname);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

      if ($row['banned'] == 1) {
        $_SESSION["banned"] = 'banned';
        echo $_SESSION["banned"];
        header("Location: loginPage.php");
         exit;  
        } 


      if (password_verify($_POST["pwd"], $row["password"])) {


        if ($row['admin'] == 1) {
      
          header("Location: officePage.php");
          exit;  
          
        } else {
          $_SESSION["adherent_id"] = $row["code_adherent"];
          header("Location: homePage.php");
          exit;  
        }

  
      
   } else {      
       echo 'Password is false';
       $_SESSION["incorrect"] = 'icorrect';
        echo $_SESSION["incorrect"];
        header("Location: loginPage.php");
   }
  
    } else {
      $_SESSION["incorrect"] = 'icorrect';
      echo $_SESSION["incorrect"];
      header("Location: loginPage.php");
        echo "No matching rows found.";
    }







    






  ?>


