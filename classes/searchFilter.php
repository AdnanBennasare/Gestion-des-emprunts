<?php 


class Ouvrage {
    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function getByCategory($category) {
      $sql = "SELECT * FROM ouvrage WHERE type=:category";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':category', $category);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function getAllByName($search) {
      $sql = "SELECT * FROM ouvrage WHERE titre LIKE :search";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindValue(':search', '%' . $search . '%');
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function getAll() {
      $sql = "SELECT * FROM ouvrage";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  

  
?>