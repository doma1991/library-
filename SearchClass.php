<?php

$dsn = "mysql:host=localhost;dbname=library_v8";
$user = "root";
$pass = "";
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $user, $pass, $opt);

class Search {
   private $conn;

    public function __construct(PDO $pdo) {
        $this->conn = $pdo;
    }
  
public function search($pdo, $bookname) {

 try {
    $stmt = $pdo->prepare("Select * from book where title = ?");
    $stmt ->execute([$bookname]);
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   $result = $stmt->fetchAll();
   if ($result == null) {
//     echo '<pre>'; print_r($result); echo '</pre>';  
       echo "No results for $bookname.";
   } else {
       echo '<pre>'; print_r($result); echo '</pre>';
   }
    
} catch (PDOException $e)
{
    $e->getMessage();
    die("Search Error");
}
}
}

//$search = new Search($pdo);
//$search->search($pdo, "ABC");
