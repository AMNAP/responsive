<?php

class Database {
    private $hostname = 'localhost';
    private $databasenaam = 'User';
    private $username = 'root';
    private $password = 'root';
    public $conn;
    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->databasenaam);
        } catch (mysqli_sql_exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}

function showusers(){
$sql = "SELECT `ID`, `voornaam`, `achternaam`, `email`, `foto` FROM `users`";
        $connection = new Database();
        $result = $connection->conn->query($sql);
        if (isset($result)) {
            for($x=1;$x <= $result->num_rows;$x++){
                $row = $result->fetch_assoc(); 
                echo "<img src='UserPic/".$row['foto']."' class='btn' id=".$row['ID'].">
                      <div class='item".$row['ID']."'>".$row['voornaam']." ".$row['achternaam']."<br><a href='mailto:".$row['email']."'> ".$row['email']."</a></div> ";
            }
            $connection->conn->close();    
        }
}

$q = $_REQUEST['id'];

$sql = "SELECT * FROM `users` WHERE ID = ".$q."";
$connection = new Database();
$result = $connection->conn->query($sql);

while ($row= mysqli_fetch_array($result)) {
    echo "<img class='bigpic' src='UserPic/".$row['foto']."'/>";
    echo "<div class='inhoudtekst'><p>".$row['voornaam']." ".$row['achternaam']."</p>";
    echo "
                <span>".$row['mobiel']."</span><br>
                <span>".$row['straat']."</span><br>
                <span>".$row['woonplaats']."</span><br>
                <span>".$row['email']."</span><br>   
         </div> ";
    
    $connection->conn->close();
}
  
?>



