
<?php
require_once 'oopConnection.php';


$db = new Database("localhost", "root", "", "books");
$conn = $db->getConnection();


echo 'hey';

if (isset($_POST['delete_button_set'])){

    $id_del = $_POST['deletepop_id'];
    echo $id_del;
    $stmt = $conn->prepare("DELETE FROM `ouvrage` WHERE code_ouvrage='$id_del'");

    $stmt->execute();
    echo 'tmsah';

    }

?>