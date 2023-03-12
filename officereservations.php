<?php
include('includes/header.php');
session_start();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>




<?php  


if (isset($_SESSION["valideeReservation"])) {
	echo "
	  <script>
    Swal.fire({
      icon: 'success',
      title: 'reservation has been validated',
      showConfirmButton: false,
      timer: 1500
    })
	  </script>
	";
	unset($_SESSION["valideeReservation"]); // unset the session variable so that the modal is not shown again on page refresh
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

<div class="jumbotron jumbotron-fluid" style="background-image: url('assets/assets.png');">
  <div class="container">
    <h1 class="display-4">Ajouter une ouvrage cela</h1>
    <p class="lead">Lorem ipsum dolor sit amet, sdcdcdscdsc consectetur adipiscing elit.</p>
    <form method="GET" action="" class="formdd-inline">
      <div class="input-group">
        <input type="text" name="search" class="formdd-control" placeholder="Search...">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit" style="padding: 10px; background-color: #FF5C00; font-size: 18px; font-weight: bold;"  >Search</button>
        </div>
      </div>
    </form>
  </div>
</div>






<?php 



require_once 'oopConnection.php';

$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


$stmt2 = $conn->prepare("SELECT *
FROM reservation r
JOIN adherent a ON r.code_adherent = a.code_adherent
JOIN ouvrage o ON r.code_ouvrage = o.code_ouvrage
WHERE o.ouvrage_state = 'reserved'");
$stmt2->execute();
$rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) { 

  $current_date = date('Y-m-d H:i:s', time());
  $date_expiration = $row['date_expiration'];
  $code_ouvrage = $row['code_ouvrage'];
  $code_reservation = $row['code_reservation'];
  $available = 'available';

if ($current_date > $date_expiration) {

  $stmt4 = $conn->prepare("DELETE FROM reservation WHERE code_reservation = :code_reservation");
  $stmt4->bindParam(':code_reservation', $code_reservation);
  $conn->exec('SET foreign_key_checks = 0');
  $stmt4->execute();
  $conn->exec('SET foreign_key_checks = 1');


  $stmt = $conn->prepare("UPDATE ouvrage SET ouvrage_state = :ouvrage_state WHERE code_ouvrage = :code_ouvrage");
  $stmt->bindParam(':ouvrage_state', $available);
  $stmt->bindParam(':code_ouvrage', $code_ouvrage);

  $conn->exec('SET foreign_key_checks = 0');
  $stmt->execute();
  $conn->exec('SET foreign_key_checks = 1');

}

}

?>

<div class="container">
<h1>Les reservation</h1>

<div class="container d-flex flex-wrap wrap gap-5 mt-5">

<?php 
foreach ($rows as $row) { 

    ?>




    <div class="card1">
    
                <div class="card-image1">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="Your Image">
                    <div class="image-overlay1">
                        <p>Hover over me</p>
                    </div>
                </div>
                <div class="card-content1">
                    <div class="info1">

                        <h3 style="color: red;">
                            <?php echo $row['titre'] ?>
                        </h3>
                        <h4>
                        <strong>le nom reserveur :</strong>
                        
                            <?php echo $row['nome'] ?>
                        </h4>
                        <h4><strong>cin</strong>
                            <?php echo $row['cin'] ?>
                        </h4>
                        <h4><strong>L'email</strong>
                            <?php echo $row['email'] ?>
                        </h4>
                    </div>
                    <div class="info2">
                        <h4><strong>La date reservation :</strong>
                            <?php echo $row['date_reservation'] ?>
                        </h4>
                        <h4>
                            <strong>la date expiration :</strong>
                            <?php echo $row['date_expiration'] ?>
                        </h4>
                        <h4><strong>Le code d'ouvrage </strong>
                            <?php echo $row['code_ouvrage'] ?>
                        </h4>
                    </div>


<form action="functions/empruntez.php" method="POST" >

<input type="hidden" value="<?php echo $row['code_adherent']?>"  name="code_adherent_emp" >
<input type="hidden" value="<?php echo $row['code_reservation']?>" name="code_reservation_emp" >
<input type="hidden" value="<?php echo $row['code_ouvrage']?>" name="code_ouvrage_emp" >

  
  <button type="submit" class="btn btn-primary" style="margin-top: 180%;">validez</button>

</form>
  </div>
</div>





<?php 
 }
?>

</div>

