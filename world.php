<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($results)){
  echo "<table border = '1'>";
    echo "<tr>";
        echo "<th>Country Name</th>";
        echo "<th>Continent</th>";
        echo "<th>Independence Year</th>";
        echo "<th>Head of State</th>";
    echo "</tr>";
      foreach ($results as $row){
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['continent'] . "</td><td>" . $row['independence_year'] . "</td><td>" . $row['head_of_state'] . "</td></tr>";
      }
      echo "</table>";
    }
    else{
      echo "No Match";
    }

?>
