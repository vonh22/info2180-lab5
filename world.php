<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$context = "";
if (isset($_GET['context'])){
    $context = ($_GET['context']);
}

$stmt1 = $conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on 
c.country_code = cs.code WHERE cs.name LIKE '%$country%'");


if ($stmt1 !== FALSE && $context == 'cities'){
    $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($results1)){
    echo "<table class = 'r1table' border = '1'>";
      echo "<tr>";
          echo "<th>Name</th>"; 
          echo "<th>District</th>";
          echo "<th>Population</th>";
      echo "</tr>";
        foreach ($results1 as $row){
          echo "<tr><td>" . $row['name'] . "</td><td>" . $row['district'] . "</td><td>" . $row['population'] . "</td></tr>";
        }
        echo "</table>";
      }
    else {
      echo "No Match Found";
    }
}

elseif (!empty($results)){

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
      echo "No Match Found";
    }

?>
