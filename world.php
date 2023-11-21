<?php
error_reporting(0);
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = '%'. $_GET['country'] . '%';
if($_GET['context']=='cities'){
 
    $stmt = $conn->query("SELECT * FROM countries a inner join cities b on a.code = b.country_code where a.name like '$country' ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
    </tr>

    <?php foreach ($results as $row): ?>
    <tr>

        <td><?= $row['name']  ?></td>
        <td><?= $row['district']  ?></td>
        <td><?= $row['population']; ?></td>

    </tr>
    <?php endforeach; ?>



</table>

<?php
}else{

    $stmt = $conn->query("SELECT * FROM countries where name like '$country'  ");
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<table>
    <tr>
        <th>Country Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
    <tr>

        <td><?= $row['name']  ?></td>
        <td><?= $row['continent']  ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state'] ?></td>
    </tr>
    <?php endforeach; ?>



</table>
<?php }    ?>