<?php
include('includes/header.php');
session_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>





<?php 



if (isset($_SESSION["largeimage"])) {
	echo "
	  <script>
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: \"Sorry you're image is too large!\",
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
	unset($_SESSION["largeimage"]); // unset the session variable so that the modal is not shown again on page refresh
  }





if (isset($_SESSION["addedItem"])) {
  echo $_SESSION["addedItem"];
	echo "
	  <script>
    Swal.fire({
      icon: 'success',
      title: 'item added succesfully',
      showConfirmButton: false,
      timer: 1500
    })
	  </script>
	";
	unset($_SESSION["addedItem"]); // unset the session variable so that the modal is not shown again on page refresh
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



<div class="" style="width: 50%; margin: 5% auto 2% 37%;">


<form action="additem.php" method="POST" enctype="multipart/form-data">
<p class="" style="margin-left: 43px;">Ajouter une ouvrage sur la médiathèque mantenan !</p>

<div class="mt-3">

<div class="row mb-3">
  <div class="col-md-4">
    <input type="file" class="form-control" placeholder="Place an image" name="my_image">
  </div>
  <div class="col-md-3">
    <input type="text" class="form-control" placeholder="Titre" name="title">
  </div>
 </div>

<div class="row mb-3">
    
  <div class="col-md-4">
    <input type="text" class="form-control" placeholder="Le nom d'auteur" name="auteurname">
  </div>
  <div class="col-md-3">
  <select class="form-control" name="type">
      <option value="">-- choisir une type --</option>
      <option value="Livres">Livres</option>
      <option value="des revues">des revues</option>
      <option value="des romans">des romans</option>
      <option value="des cassettes">des cassettes</option>
      <option value="CDs">CDs</option>
      <option value="DVDs">DVDs</option>
    </select>

  </div>
  </div>




  <div class="row mb-3">

  <div class="col-md-3">
    <input type="number" placeholder="Le nombre des pages" class="form-control" name="pages">
  </div>

  <div class="col-md-4">
    <input type="date" placeholder="La date d'edition" class="form-control" name="editiondate">
  </div>

</div>

<div class="row mb-3">
 
  <div class="col-md-3">
    <input type="date" placeholder="La date d'achat" class="form-control" name="purshasedate">
  </div>

  <div class="col-md-4">
    <select class="form-control" name="state">
      <option value="">-- L'etat d'ouvrage --</option>
      <option value="Neuf">Neuf</option>
      <option value="Bon état">Bon état</option>
      <option value="Acceptable">Acceptable</option>
      <option value="Assez usé">Assez usé</option>
      <option value="Déchiré">Déchiré</option>
    </select>
  </div>

  </div>

  <div class="row mb-3">
      
        <div class="col-sm-5 mt-1">
      <p>duplicate this item as many as you wish</p>
      </div>

  <div class="col-md-2">
    <input type="number" placeholder="* Times" class="form-control" name="num_inserts">
  </div>
  </div>

  <div class="row addouvragebtn" >
  <button type="submit" class="btn btn-primary" name="upload">Inser ouvrage</button>
  </div>

</div>


</form>
</div>








<div class="home_links container">
  <h3 style="font-size: 1.75rem;
  color: #028517; font-weight: bold; font-family: 'Raleway', sans-serif;">My Links</h3>
  <div class="middle_links row mt-5 mb-5">
    <div class="col-md-2 col-md-offset-2">
      <a href="officePage.php?category=Livres" class="nav-link middle_link" id="livres-link">Livres</a>
    </div>
    <div class="col-md-2">
      <a href="officePage.php?category=des revues" class="nav-link middle_link" id="revues-link">revues</a>
    </div>
    <div class="col-md-2">
      <a href="officePage.php?category=des romans" class="nav-link middle_link" id="romans-link">Romans</a>
    </div>
    <div class="col-md-2">
      <a href="officePage.php?category=CDs" class="nav-link middle_link" id="cds-link">CDs</a>
    </div>
    <div class="col-md-2 ">
      <a href="officePage.php?category=des cassettes" class="nav-link middle_link" id="cassettes-video-link">Cassettes vidéo</a>
    </div>
    <div class="col-md-2">
      <a href="officePage.php?category=DVDs" class="nav-link middle_link" id="dvds-link">DVDs</a>
    </div>
  </div>
</div>















<?php

require_once 'classes/searchFilter.php';
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();



$stmt2 = $conn->prepare("SELECT * FROM adherent WHERE penaltie >= 3");
$stmt2->execute();
$rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {

    // Update baan column for rows with penaltie >= 3
    $stmt3 = $conn->prepare("UPDATE adherent SET banned = 1 WHERE code_adherent = :code_adherent");
    $stmt3->bindValue(':code_adherent', $row['code_adherent']);
    $stmt3->execute();
}





$sql = "SELECT * FROM ouvrage";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);



$ouvrage = new Ouvrage($conn);
$search = $_GET['search'] ?? '';
$rows  = $ouvrage->getAllByName($search);

if (isset($_GET['category'])) {
  $rows = $ouvrage->getByCategory($_GET['category']);
} elseif (!empty($search)) {
  $rows = $ouvrage->getAllByName($search);
} else {
  $rows = $ouvrage->getAll();
}






?>



<div style="margin-left: 2%;" class="d-flex flex-wrap wrap gap-4 mt-5">
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

   
          <div style="margin-left: 9rem; margin-bottom: 1rem;">
            <input type="hidden" class="delete_id_value" value="<?php echo $row['code_ouvrage'];  ?>">
            <a class="confirm_the_delete btn btn-danger ml-2">DELETE</a>
          </div>

  </div>
</div>





  <?php } ?>

  </div>







<?php

include('includes/footer.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/addBorder.js" ></script>

<script>
  $(document).ready(function () {
    $('.confirm_the_delete').click(function (e) {
      e.preventDefault();
      var deletewithmodal = $(this).closest("div").find('.delete_id_value').val();
      console.log(deletewithmodal);

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this announce file!",
        icon: "error",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {

            $.ajax({
              type: "POST",
              url: "delete.php",
              data: {
                "delete_button_set": 1,
                "deletepop_id": deletewithmodal,

            },
              success: function (response) {

              swal("anonce deleted successfully", {
                  icon: "success",
              }).then((result) => {
              location.reload();
            });


              }
            });

          }
        });



    });
  });





  $(document).ready(function () { 


function scrollWin() {
window.scrollBy(0, 600);
}
scrollWin();
  
 });


</script>