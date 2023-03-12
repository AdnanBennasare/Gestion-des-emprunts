<?php
session_start();
include('includes/header.php');

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>




<?php  

if (isset($_SESSION["added"])) {
      echo "
        <script>
      Swal.fire({
        icon: 'success',
        title: 'client added as an admin succesfully',
        showConfirmButton: false,
        timer: 1500
      })
        </script>
      ";
      unset($_SESSION["added"]); // unset the session variable so that the modal is not shown again on page refresh
    }


?>


<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/logo12.png" style="width: 220px; height: 63px;" alt="Fresh Pages" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="officePage.php">Home</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="officereservations.php">Les reservation</a>
        </li>
         <li class="nav-item">
         <a class="nav-link" href="empruntsPages.php">les emprunts</a>
        </li>
        <li class="nav-item">
         <a class="nav-link"  href="ouvrageretournez.php">validez les emprunts retournez</a>
        </li>
        <li class="nav-item">
         <a class="nav-link"  href="notReturned.php">pas returned</a>
        </li>
        <li class="nav-item">
         <a class="nav-link"  href="addAdmin.php">ajouter Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<form method="GET" action="" class="formdd-inline">
      <div class="input-group">
        <input type="text" name="search" class="formdd-control" placeholder="Search...">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" style="padding: 10px; background-color: #FF5C00; font-size: 18px; font-weight: bold;"  >Search</button>
        </div>
      </div>
    </form>

    <div class="container d-flex flex-wrap wrap gap-5 mt-5">

<?php   
require_once 'oopConnection.php';
$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


if (isset($_GET['search'])) {

$client_name = '%' . $_GET['search'] . '%';
$stmt = $conn->prepare("SELECT * FROM adherent WHERE nickname LIKE :nickname");
$stmt->bindParam(':nickname', $client_name);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    ?>

    <div class="card1">
    
    <div class="card-image1">
        <img src="assets/blank-profile-picture-973460_1280.webp" alt="Your Image">
        <div class="image-overlay1">
            <p>no profile picture</p>
        </div>
    </div>
    <div class="card-content1">
        <div class="info1">

            <h3 style="color: red;">
                <?php echo $row['nome'] ?>
            </h3>
            <h4>
            <strong>le tele de client</strong>
            
                <?php echo $row['phone'] ?>
            </h4>
            <h4><strong>le vin de client</strong>
                <?php echo $row['cin'] ?>
            </h4>
            <h4><strong>L'email de client</strong>
                <?php echo $row['email'] ?>
            </h4>
        </div>
        <div class="info2">
            <h4><strong>la date d'naissance</strong>
                <?php echo $row['date_birth'] ?>
            </h4>
            <h4><strong>les pinalitie</strong> <?php echo $row['penaltie']?> /3
            </h4>
            <h4><strong>l'adresse </strong>
                <?php echo $row['adresse'] ?>
            </h4>
<form action="addAdmin.php?code=<?php echo $row['code_adherent']?>" method="POST">
<button type="submit" class="btn btn-primary" style="margin-top: 13%;">add admin</button>
</form>
</div>

  </div>
</div>

<?php   
}
}


if (isset($_GET['code'])) {
   

    $stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
    $stmt->bindParam(':ouvrage_state', $empruntez);
    $stmt->bindParam(':code_ouvrage', $code_ouvrage);


            $code_adherent = $_GET['code'];
            $stmt = $conn->prepare("UPDATE adherent SET admin  = admin  + 1 WHERE code_adherent = :code_adherent");
            $stmt->bindParam(':code_adherent', $code_adherent);
            $stmt->execute();
            $_SESSION["added"] = 'added';
            echo $_SESSION["added"];
            header("Location: addAdmin.php");

} 

?>



  
</div>


<?php
include('includes/footer.php');
?>
