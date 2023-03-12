<?php
session_start();
include('includes/header.php');

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>



<?php  


if (isset($_SESSION["cancelle_succesfully"])) {
	echo "
	  <script>
    Swal.fire({
      icon: 'success',
      title: 'reservation has been cancelled',
      showConfirmButton: false,
      timer: 1500
    })
	  </script>
	";
	unset($_SESSION["cancelle_succesfully"]); // unset the session variable so that the modal is not shown again on page refresh
  }




?>












<style>
  .fa-solid {
    font-size: 23px;

  }
</style>


<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/logo1.png" style="width: 225px; height: 66px;" alt="Fresh Pages">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="officePage.php">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>





<?php

require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();

$id = $_SESSION["adherent_id"];


$sql = "SELECT * FROM adherent WHERE code_adherent ='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
}

?>


<div style="box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;"
  class="container card mt-5 d-flex">

  <div class="mt-3">
    <div style="width: 300px; height: 300px; position: absolute;">
      <img src="assets/blank-profile-picture-973460_1280.webp" width="200px" alt="">
    </div>

    <h5 style="margin-left: 1100px;"><i class="fa-solid fa-gear" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i> Settings</h5>

    <h3 class="text-center">Hello
      <?php if (isset($row['nome'])) {
        echo $row['nome'];
        echo $row['code_adherent'];

      } ?> see your Acounts details
    </h3><br>

  </div>





  <section class="mx-auto">
    <div class="row mb-4">
      <div class="col-md-8 mb-3 mb-md-0">
        <input type="text" name="adresse" placeholder="adresse" value="<?php echo $row['adresse'] ?>" id="adresse"
          class="form-control signupInputs" readonly>
      </div>
      <div class="col-md-4">
        <input type="text" name="name" placeholder="Firstname" id="name" value="<?php echo $row['nome'] ?>"
          class="form-control signupInputs mt-1" readonly>

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6 mb-3 mb-md-0">
        <input type="text" name="email" placeholder="email" id="email" value="<?php echo $row['email'] ?>"
          class="form-control signupInputs" readonly>
      </div>
      <div class="col-md-6">
        <input type="number" name="phone" placeholder="phone number" id="phone" value="<?php echo $row['phone'] ?>"
          class="form-control signupInputs" readonly>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4 mb-3 mb-md-0">
        <input type="text" name="cin" placeholder="cin" id="cin" value="<?php echo $row['cin'] ?>"
          class="form-control signupInputs mt-4" readonly>
      </div>
      <div class="col-md-8">
        <label for="">La date de naissance</label>
        <input type="date" name="birth_date" placeholder="birth date" id="date"
          value="<?php echo $row['date_birth']; ?>" class="form-control signupInputs" readonly>
      </div>
    </div>


    <div class="row mb-3">
      <div class="col-md-6 mb-3 mb-md-0 mt-2">

        <select disabled name="type" class="form-control"
          style="height: 45px; border: 2px solid #dddfe2; margin-top: 4%;">
          <?php
          $selected_type = $row['type'];
          ?>
          <option value="">-- choisirez vous etat --</option>
          <option selected value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        </select>


      </div>
      <div class="col-md-6">


        <input type="text" name="username" placeholder="username" id="username" value="<?php echo $row['nickname'] ?>"
          class="form-control signupInputs mt-3" readonly>

      </div>
    </div>

    <div class="row">
      <a data-bs-toggle="modal" data-bs-target="#exampleModal" 
        style="background-color: #FF5C00; width: 40%; margin: 6% auto; color: white; font-weight: 600; font-size: 18px; height: 45px; border-radius: 10px;">Edit
        Profile</a>
    </div>
  </section>

</div>








<!-- ============ EDIT INFORMATION ============= -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true" id="exampleModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Large Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal content goes here.</p>


        <form action="updateFunctions/updateProfile.php" method="POST" id="formProfile" class="signupform">



          <!-- Name and Address inputs -->
          <div class="row mb-2">


            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Name</label>
              <div class="formvalid">
                <input type="text" name="name" id="nameProfile" class="form-control" placeholder="First name"
                  value="<?php echo $row['nome'] ?>">
                <small></small>
              </div>
            </div>


            <div class="col-md-6 mb-3">
              <label for="adresse" class="form-label">Address</label>
              <div class="formvalid">
                <input type="text" name="adresse" id="adresseProfile" class="form-control" placeholder="Address"
                  value="<?php echo $row['adresse'] ?>">
                <small></small>
              </div>
            </div>


          </div>



          <!-- Email and Phone inputs -->
          <div class="row mb-2">

            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="formvalid">
                <input type="email" name="email" id="emailProfile" class="form-control" placeholder="Email address"
                  value="<?php echo $row['email'] ?>">
                <small></small>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Phone Number</label>


              <div class="formvalid">
                <input type="tel" name="phone" id="phoneProfile" class="form-control" placeholder="Phone number"
                  value="<?php echo $row['phone'] ?>">
                <small></small>
              </div>

            </div>


          </div>

          <!-- CIN and Birth Date inputs -->
          <div class="row mb-2">


            <div class="col-md-6 mb-3">
              <label for="cin" class="form-label">CIN</label>
              <div class="formvalid">

                <input type="text" name="cin" id="cinProfile" class="form-control" placeholder="CIN"
                  value="<?php echo $row['cin'] ?>">
                <small></small>
              </div>

            </div>

            <div class="col-md-6 mb-3">
              <label for="birth_date" class="form-label">Birth Date</label>
              <div class="formvalid">
                <input type="date" name="birth_date" id="dateProfile" class="form-control" placeholder="Birth date"
                  value="<?php echo $row['date_birth'] ?>">
                <small></small>
              </div>
            </div>

          </div>

          <!-- Type and Username inputs -->
          <div class="row mb-2">


            <div class="col-md-6 mb-3">
              <label for="type" class="form-label">Type</label>


              <div class="formvalid">
                <select name="type" id="OccupationProfile" class="form-select">
                  <?php
                  $selected_type = $row['type'];
                  ?>
                  <option value="">-- choisirez vous etat --</option>
                  <option selected value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                  <?php if ($selected_type != "Etudiant"): ?>
                    <option value="Etudiant">Etudiant</option>
                  <?php endif; ?>
                  <?php if ($selected_type != "Fonctionnaire"): ?>
                    <option value="Fonctionnaire">Fonctionnaire</option>
                  <?php endif; ?>
                  <?php if ($selected_type != "Employe"): ?>
                    <option value="Employe">Employe</option>
                  <?php endif; ?>
                  <?php if ($selected_type != "Femme au foyer"): ?>
                    <option value="Femme au foyer">Femme au foyer</option>
                  <?php endif; ?>
                </select>
                <small></small>

              </div>
            </div>




            <div class="col-md-6 mb-3">
              <label for="username" class="form-label">Username</label>

              <div class="formvalid">
                <input type="text" name="username" id="nicknameProfile" class="form-control" placeholder="username"
                  value="<?php echo $row['nickname'] ?>">
                <small></small>
              </div>



            </div>


          </div>


          <div class="row mb-2">

            <div class="col-md-6 mb-3">
              <label for="Password" class="form-label">Password</label>

              <div class="formvalid">
                <input type="text" name="Password" id="password1Profile" class="form-control" placeholder="Password">
                <small></small>
              </div>



            </div>

            <div class="col-md-6 mb-3">
              <label for="repeat_password" class="form-label">Repeat password</label>


              <div class="formvalid">
                <input type="password" name="repeat_password" id="pwd_repeatedProfile" class="form-control"
                  placeholder="Repeat Password">
                <small></small>
              </div>


            </div>

          </div>


          <div style="margin-left: 1%;" class="row my-2">


            <div class="form-check">
            
            <div class="formvalid">
            <label class="form-check-label" for="openmodaldetails">
                make sure this informations are correct
              </label>
              <input class="form-check-input" type="checkbox" id="openmodaldetails">   <br>
              <small></small>
              </div>
        

            </div>
          </div>

          <div class="row">
            <button type="submit" id="signupbtn" class="btn btn-primary" style="width: 74%;
margin: 2% auto; background-color: #FF5C00; border: none;">Save changes</button>
          </div>
    <input type="text" value="<?php  echo $row['code_adherent']  ?>" name="id_user">
          </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- SIDE BAR -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
  id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>










<?php
$user_id = $row['code_adherent'];
  // to check how many times user has repeated in reservation table




$stmt2 = $conn->prepare("SELECT *
  FROM emprunt e
  JOIN adherent a ON e.code_adherent = a.code_adherent
  JOIN ouvrage o ON e.code_ouvrage = o.code_ouvrage
  WHERE e.code_adherent = :code_adherent AND e.date_retour = '0000-00-00'");


  $stmt2->bindParam(':code_adherent', $user_id);
  $stmt2->execute();
  $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  

  $stmt3 = $conn->prepare("SELECT *
  FROM reservation r
  JOIN adherent a ON r.code_adherent = a.code_adherent
  JOIN ouvrage o ON r.code_ouvrage = o.code_ouvrage
  WHERE r.code_adherent = :code_adherent");
  $stmt3->bindParam(':code_adherent', $user_id);
  $stmt3->execute();
  $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);


?>


<div style="margin-top: 10%;">

<h2 class="text-center" >Votre emprunts</h2>

<?php 

$has_available = false;

foreach ($rows2 as $row) {
  if ($row['ouvrage_state'] == "available") {
    $has_available = true;
    break;
  }

?>




<div class="card1" style="width: 70%; margin: 3% auto;"> 
                <div class="card-image1" >
                    <img src="uploads/<?php echo $row['image']; ?>" alt="Your Image">
                    <div class="image-overlay1">
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <div class="card-content1">
                    <div class="info1">

                        <h3 style="color: red;">
                            <?php echo $row['titre'] ?>
                        </h3>
                        <h4>Le nom de lauteur :
                            <?php echo $row['nom_lauteur'] ?>
                        </h4>
                        <h4><strong>l'état:</strong>
                        <?php echo $row['status'] ?>
                        </h4>
                        <h4><strong>la date d'édition :</strong>
                            <?php echo $row['date_edition'] ?>
                        </h4>
                    </div>
                    <div class="info2">
                        <h4><strong>La date d'achat :</strong>
                            <?php echo $row['date_purchase'] ?>
                        </h4>
                        <h4>
                            <strong>num_pages  :</strong>
                            <?php echo $row['num_pages'] ?> P
                        </h4>
                    </div>
                </div>
            </div>




<?php 

}

?>




<h2 class="text-center" >Votre reservations </h2>




<?php 




foreach ($rows3 as $row) { 
?>








<div class="card1" style="width: 70%; margin: 3% auto;"> 
                <div class="card-image1">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="Your Image">
                    <div class="image-overlay1">
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <div class="card-content1">
                    <div class="info1">

                        <h3 style="color: red;">
                            <?php echo $row['titre'] ?>
                        </h3>
                        <h4>Le nom de lauteur :
                            <?php echo $row['nom_lauteur'] ?>
                        </h4>
                        <h4><strong>l'état:</strong>
                        <?php echo $row['status'] ?>
                        </h4>
                        <h4><strong>la date d'édition :</strong>
                            <?php echo $row['date_edition'] ?>
                        </h4>
                    </div>
                    <div class="info2">
                        <h4><strong>La date d'achat :</strong>
                            <?php echo $row['date_purchase'] ?>
                        </h4>
                        <h4>
                            <strong>num_pages  :</strong>
                            <?php echo $row['num_pages'] ?> P
                        </h4>
                    </div>
        



<form action="functions/cancelle.php" method="POST">
<input type="hidden" value="<?php echo $row['code_adherent']?>"  name="code_adherent_emp" >
<input type="hidden" value="<?php echo $row['code_reservation']?>" name="code_reservation_emp" >
<input type="hidden" value="<?php echo $row['code_ouvrage']?>" name="code_ouvrage_emp" >
<button type="submit" class="btn btn-danger" style="margin-top: 6%;" >Cancell reservation</button>

</form>
  </div>
</div>


<?php 
 }

?>



</div>














































<script src="profile.js"></script>
<?php
include('includes/footer.php');
?>