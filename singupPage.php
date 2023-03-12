<?php 

include('includes/header.php');
?> 
<link rel="stylesheet" href="style.css">



<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/logo1.png" style="width: 225px; height: 66px;" alt="Fresh Pages" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="SingupPage.php">Sign up</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="loginPage.php" >Log in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>





<!-- FORM -->
<div  style="width: 40%; margin: 10% auto;">
<h3 style="margin-left: 32%; font-weight: bold; font-family: 'Quicksand';" class="mb-3" >Sign up Now !</h3>

<form action="regesteroop.php" method="POST" class="signupform" id="form">

  <!-- Name Adress input -->
  <div class="row mb-3">
    <div class="col-md-4">
      <div class="form-group">
      <div class="formvalid">
        <input type="text" name="name" placeholder="Firstname" id="name" class="form-control signupInputs" required>
        <small></small>
      </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="form-group">
      <div class="formvalid">

        <input type="text" name="adresse" placeholder="adresse" id="adresse" class="form-control signupInputs" required>
        <small></small>
      </div>
      </div>

    </div>
  </div>

  <!-- Email CIn input -->
  <div class="row mb-4">
    <div class="col-md-7">
      <div class="form-group">
      <div class="formvalid">

        <input type="email" name="email" placeholder="email" id="email" class="form-control signupInputs" required>

        <small></small>
        </div>

      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <div class="formvalid">
        <input type="number" name="phone" placeholder="phone number" id="phone" class="form-control signupInputs" required>
        <small></small>
      </div>
    </div>
  </div>
  </div>


  

  <!-- CIN birth_date  input -->
  <div class="row mb-3">
    <div class="col-md-4">
      <div class="form-group">
        <label for=""></label>
      <div class="formvalid">
        
        <input type="text" name="cin" placeholder="cin" id="cin" class="form-control signupInputs" required>
        <small></small>

      </div>
      </div>
    </div>



    <div class="col-md-7">
      <div class="form-group">
        <label for="birth_date">La date de naissance</label>
      <div class="formvalid">
        <input type="date" name="birth_date" id="date" class="form-control signupInputs" required>
        <small></small>
      </div>
    </div>
    </div>

  </div>

  <div class="row mb-3">
    <div class="col-md-7 mt-2">
      <div class="form-group">
      <div class="formvalid">
        <select id="Occupation" name="type" class="form-control" style="height: 45px; border: 2px solid #dddfe2;" required  >
          <option value="">-- choisirez vous etat --</option>
          <option value="Etudiant">Etudiant</option>
          <option value="Fonctionnaire">Fonctionnaire</option>
          <option value="Employe">Employe</option>
          <option value="Femme au foyer">Femme au foyer</option>
        </select>
        <small></small>
        </div>

      </div>
    </div>

    <div class="col-md-4 mt-2">
      <div class="form-group">
      <div class="formvalid">
        <input type="text" name="username" placeholder="username" id="nickname" class="form-control signupInputs" required>
        <small></small>
      </div>
    </div>
    </div>
  </div>

  <!-- PASSWORD input -->
  <div class="row mb-3 ">
      <div class="col-sm-5">
      <div class="formvalid">
        <input type="password" name="pwd" placeholder="password" id="password1" class="form-control signupInputs" required>
        <small></small>
      </div>
      </div>

   
      <div class="col-sm-6">
      <div class="formvalid">
        <input type="password" name="reapeat_pwd" placeholder="Repeat password" id="pwd_repeated" class="form-control signupInputs" required>
        <small></small>
        </div>
      </div>
    </div>






    <div class="row mb-3">

    <div class="form-check">
  <input class="form-check-input" type="checkbox" id="openmodaldetails">
  <label class="form-check-label" for="openmodaldetails">
    agree to the our Privecy Policy
  </label>
</div>


    </div>


    <div class="row">
      <button type="submit" class="btn btn-primary" style="width: 54%;
margin-left: 20%; background-color: #FF5C00; border: none; height: 10%" id="signupbtn" >Sign Up</button>
</div>

<div class="row">
  <a href="loginPage.php" class="btn btn-success mt-3" style="width: 44%;
margin-left: 25%;">already have an acount log in !</a>

</div>







</form>
</div>


<script src="signupvalidation.js"></script>

<?php 
include('includes/footer.php');

?> 




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
  $('#openmodaldetails').change(function() {
    if($(this).is(":checked")) {
      $('#exampleModal').modal('show');
    }
    else {
      $('#exampleModal').modal('hide');
    }
  });
});


</script>