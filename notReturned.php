<?php
include('includes/header.php');
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






<?php

require_once 'oopConnection.php';

$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();

$stmt2 = $conn->prepare("SELECT *
FROM emprunt e
JOIN adherent a ON e.code_adherent = a.code_adherent
JOIN ouvrage o ON e.code_ouvrage = o.code_ouvrage
WHERE e.date_retour = '0000-00-00'");

$stmt2->execute();
$rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$currentDate = new DateTime();


$stmt3 = $conn->prepare("UPDATE adherent SET penaltie = 0");
$stmt3->execute();

?>

<div class="" style="width: 70%; margin: 2% auto;">
    <?php
    $i = 0;
    foreach ($rows as $row) {

        $dateBorrowed = new DateTime($row['date_emprunt']);
        $date_supose_return = $dateBorrowed->modify('+14 days');

        if ($date_supose_return < $currentDate) {
            $i++;

            ?>
         
            <div class="card1">
            <h6>
                <?php echo $i ?>
            </h6>
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
                        <h4>Le nom de emprenteur :
                            <?php echo $row['nome'] ?>
                        </h4>
                        <h4><strong>Le phone de emprenteur :</strong>
                            <?php echo $row['phone'] ?>
                        </h4>
                        <h4><strong>L'email de emprenteur :</strong>
                            <?php echo $row['email'] ?>
                        </h4>
                    </div>
                    <div class="info2">
                        <h4><strong>La date d'emprunt :</strong>
                            <?php echo $row['date_emprunt'] ?>
                        </h4>
                        <h4>
                            <strong>la date supose retour :</strong>
                            <?php echo $date_supose_return->format('Y-m-d'); ?>
                        </h4>
                        <h4><strong>Le code d'ouvrage </strong>
                            <?php echo $row['code_ouvrage'] ?>
                        </h4>
                    </div>


                </div>
            </div>



            <?php
            $code_adherent = $row['code_adherent'];
            $stmt = $conn->prepare("UPDATE adherent SET penaltie = penaltie + 1 WHERE code_adherent = :code_adherent");
            $stmt->bindParam(':code_adherent', $code_adherent);
            $stmt->execute();

        } else {


        }

    }

    ?>

</div>






<?php
include('includes/footer.php');
?>