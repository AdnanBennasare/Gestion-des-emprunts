<?php
session_start();
include('includes/header.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

<?php  

if (isset($_SESSION["user_reserved_3"])) {
	echo "
	  <script>
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: \"Sorry you cant reserve more than 3 times!\",
		  footer: '<a>Why do I have this issue?</a>'
		}).then((result) => {
		  // handle the result of the modal
		  if (result.isConfirmed) {
			// do something if the user clicked \"OK\"
		  } else if (result.isDismissed) {
			// do something if the user clicked \"Cancel\" or clicked outside the modal
		  }
		});
	  </script>
	";
	unset($_SESSION["user_reserved_3"]); // unset the session variable so that the modal is not shown again on page refresh
  }



  if (isset($_SESSION["reserved"])) {
    echo "
 <script>
    Swal.fire({
      icon: 'success',
      title: 'reserved succesfully',
      showConfirmButton: false,
      timer: 1500
    })
      </script>
    ";
    unset($_SESSION["reserved"]); // unset the session variable so that the modal is not shown again on page refresh
    }
?>



<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/logo12.png" style="width: 220px; height: 63px;" alt="Fresh Pages" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item middle_links">
          <a class="nav-link " href="homePage.php">Home</a>
        </li>
        <li class="nav-item middle_links">
         <a class="nav-link" href="officePage.php">About Us</a>
        </li>
        <li class="nav-item">
      <div class="btn-group">
      <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user" style="font-size: 20px"></i></a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="profile.php">See Profile</a></li>
      <li>
      <a class="dropdown-item" href="logoutofacount.php"><i style="font-size: 17px;"
    class="fa-solid fa-right-from-bracket"></i> Log Out</a>
      </li>
    </ul>
    </div>

        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="jumbotron jumbotron-fluid" style="background-image: url('assets/bg1.png');">
  <div class="container">
    <h1 class="display-4">Welcome to My Website</h1>
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



<!-- font-family: 'Open Sans', sans-serif;

font-family: 'Playfair Display', serif;

font-family: 'Poppins', sans-serif;

font-family: 'Quicksand', sans-serif;

font-family: 'Raleway', sans-serif; -->



<div class="home_links container">
  <h3 style="font-size: 1.75rem;
  color: #028517; font-weight: bold; font-family: 'Raleway', sans-serif;">My Links</h3>
  <div class="middle_links row mt-5 mb-5">
    <div class="col-md-2 col-md-offset-2">
      <a href="homePage.php?category=Livres" class="nav-link middle_link" id="livres-link">Livres</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=des revues" class="nav-link middle_link" id="revues-link">revues</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=des romans" class="nav-link middle_link" id="romans-link">Romans</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=CDs" class="nav-link middle_link" id="cds-link">CDs</a>
    </div>
    <div class="col-md-2 ">
      <a href="homePage.php?category=des cassettes" class="nav-link middle_link" id="cassettes-video-link">Cassettes vidéo</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=DVDs" class="nav-link middle_link" id="dvds-link">DVDs</a>
    </div>
  </div>
</div>




<?php

require_once 'classes/searchFilter.php';
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


$ouvrage = new Ouvrage($conn);

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (isset($_GET['category'])) {
  $rows = $ouvrage->getByCategory($_GET['category']);
} else if (!empty($search)) {
  $rows = $ouvrage->getAllByName($search);
} else {
  $rows = $ouvrage->getAll();
}

?>



<div style="margin-left: 2%;" class="d-flex flex-wrap wrap gap-4">
  <?php foreach ($rows as $row) { ?>


    <div class="full_card" style="background-color: white; position: relative;">
  <div class="image">
    <img src="uploads/<?php echo $row['image']; ?>" alt="Your Image">
    <div class="overlay_home">
      <p class="overlay_home-text"><?php echo $row['type']; ?></p>
    </div>
  </div>
  <div class="text">
    <p style="color: #D32F26; font-size: 18px;"><?php echo $row['titre']; ?></p>
    <p><strong>l'état </strong> <?php echo $row['status']; ?></p>
    <p><strong>l'Auteur nom </strong> <?php echo $row['nom_lauteur']; ?></p>
    <span><strong>La date d'edition : </strong><?php echo $row['date_edition']; ?></span><br>
    <span><strong>La date d'achat : </strong><?php echo $row['date_purchase']; ?></span>
    <p><strong>Le nombre des pages</strong> <?php echo $row['num_pages']; ?> P</p>
    <p>Another Heading 4</p>
   
           <form action="functions/reservez.php" method="POST">
            <input type="hidden" value="<?php echo $_SESSION["adherent_id"];?>" name="user_id">
            <input type="hidden"  value="<?php echo $row['code_ouvrage'];?>" name="code_ouvrage">




            <?php  
if($row['ouvrage_state'] == "reserved" || $row['ouvrage_state'] == "empruntez" ){
  ?>

<h6 style="color: red;" >indisponible</h6>

<?php 
} else {
  ?>
  
  <button type="submit" class="btn btn-info mt-1 mb-2" style="background-color: #FF5C00; width: 50%; margin-left: 12%; color: white; font-weight: 600; font-size: 18px;">Reservez</button>


  <?php  
} 
?>
            
           </form>
  </div>
</div>






  <?php } ?>

  </div>

















   

<?php
include('includes/actuallfooter.php');
include('includes/footer.php');
?>



<script src="js/addBorder.js" ></script>


<script>


$(document).ready(function () { 


function scrollWin() {
window.scrollBy(0, 530);
}
scrollWin();
  
 });

</script>





















