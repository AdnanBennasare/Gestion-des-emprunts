<?php
session_start();
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();





class ouvrage {
    public $title;
    public $auteurname;
    public $image;
    public $status;
    public $type;

    public $edition_date;
    public $purshase_date;
    public $pages_num;
    public $state;

    
    public function __construct($title, $auteurname, $image, $status, $type, $edition_date, $purshase_date, $pages_num, $state) {

        $this->title = $title;
        $this->auteurname = $auteurname;
        $this->image = $image;
        $this->status = $status;
        $this->type = $type;
        $this->edition_date = $edition_date;
        $this->purshase_date = $purshase_date;
        $this->pages_num = $pages_num;
        $this->state = $state;


    }
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {


 $img_name = $_FILES['my_image']['name'];
 $img_size = $_FILES['my_image']['size'];
 $img_tmp_name = $_FILES['my_image']['tmp_name'];
 $img_error = $_FILES['my_image']['error'];

 if ($img_error === 0) {
    if ($img_size > 225000) {
        $_SESSION["largeimage"] = 'largeimage';
        echo $_SESSION["largeimage"];
        $em_error = "your image is too large";
        header("location: officePage.php");

        echo $em_error;
        exit();

    } else {
        $img_type = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_type_lowercase = strtolower($img_type);
        $allowed_type = array("jpg", "jpeg", "png");
        echo $img_type;
        if (in_array($img_type_lowercase, $allowed_type)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_type_lowercase;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($img_tmp_name, $img_upload_path);

           echo 'right type';

        } else {
            echo 'wrong type';
            exit();
        
        }
     
    }
 } else {
    echo 'an error has acourred';
    exit();


 }







$title = $_POST['title'];
$auteurname = $_POST['auteurname'];
$image = $new_img_name;
$status = $_POST['state'];
$type = $_POST['type'];
$edition_date = $_POST['editiondate'];
$purshase_date = $_POST['purshasedate'];
$pages_num = $_POST['pages'];

$state = 'available';
$num_inserts = $_POST['num_inserts'];

// Loop to insert the data the specified number of times
for ($i = 0; $i < $num_inserts; $i++) {


// Create a new Contact object
$ouvrage = new ouvrage($title, $auteurname, $image, $status, $type, $edition_date, $purshase_date, $pages_num, $state);




$stmt = $conn->prepare("INSERT INTO ouvrage (titre, nom_lauteur, image, status, type , date_edition, date_purchase, num_pages, ouvrage_state) VALUES (:titre, :nom_lauteur, :image, :status, :type, :date_edition, :date_purchase, :num_pages, :ouvrage_state)");


// Bind the contact's data to the statusment
$stmt->bindParam(":titre", $ouvrage->title);
$stmt->bindParam(":nom_lauteur", $ouvrage->auteurname);
$stmt->bindParam(":image", $ouvrage->image);
$stmt->bindParam(":status", $ouvrage->status);
$stmt->bindParam(":type", $ouvrage->type);
$stmt->bindParam(":date_edition", $ouvrage->edition_date);
$stmt->bindParam(":date_purchase", $ouvrage->purshase_date);
$stmt->bindParam(":num_pages", $ouvrage->pages_num);
$stmt->bindParam(":ouvrage_state", $ouvrage->state);




// Execute the statement
if ($stmt->execute()) {

    $_SESSION["addedItem"] = 'addedItem';
    echo $_SESSION["addedItem"];

    echo "Contact added successfully";
    header("location: officePage.php");
} else {
    echo "Error adding contact: ";
}
}
}
// Close the statement and database pdoection

?>



