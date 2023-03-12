
<?php
include('includes/header.php');
session_start();
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>




<?php  

if (isset($_SESSION["returned"])) {
	echo "
	  <script>
    Swal.fire({
      icon: 'success',
      title: 'item returned',
      showConfirmButton: false,
      timer: 1500
    })
	  </script>
	";
	unset($_SESSION["returned"]); // unset the session variable so that the modal is not shown again on page refresh
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
$date_retour = '0000-00-00';


if (isset($_GET['search'])) {

  $client_name = '%' . $_GET['search'] . '%';

  $stmt5 = $conn->prepare("SELECT *FROM emprunt e
  JOIN adherent a ON e.code_adherent = a.code_adherent
  JOIN ouvrage o ON e.code_ouvrage = o.code_ouvrage
  WHERE e.date_retour = '0000-00-00' AND nickname LIKE :nickname");

$stmt5->bindParam(':nickname', $client_name);
$stmt5->execute();
$rows = $stmt5->fetchAll(PDO::FETCH_ASSOC);

} else {

  $stmt2 = $conn->prepare("SELECT *
  FROM emprunt e
  JOIN adherent a ON e.code_adherent = a.code_adherent
  JOIN ouvrage o ON e.code_ouvrage = o.code_ouvrage
  WHERE e.date_retour  = '0000-00-00'");
  $stmt2->execute();
  $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}



?>

<div class="container">
<h2 class="mt-5">valide les emprunts retournez</h2>

<div class="container d-flex flex-wrap wrap gap-5 mt-5">

<?php 
foreach ($rows as $row) {
$date_emprunt = $row['date_emprunt'];
$suposez_date = date('Y-m-d', strtotime($date_emprunt . ' +14 days')); 
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
            <h4><strong>La date emprunt:</strong>
                <?php echo $row['date_emprunt'] ?>
            </h4>
            <h4><strong>date suposez de routour</strong> <?php echo $suposez_date?>
            </h4>
            <h4><strong>Le code d'ouvrage </strong>
                <?php echo $row['code_ouvrage'] ?>
            </h4>
        </div>



<form action="functions/retour.php" method="POST" >

<input type="hidden" value="<?php echo $row['code_adherent']?>"  name="code_adherent_emp" >
<input type="hidden" value="<?php echo $row['code_ouvrage']?>" name="code_ouvrage_emp" >
<input type="hidden" value="<?php echo $row['code_emprunt']?>" name="code_emprunt_emp" >


  <button type="submit" class="btn btn-primary">set retounez</button>

</form>
  </div>
</div>
<?php 
 }
?>








</div>

</div>