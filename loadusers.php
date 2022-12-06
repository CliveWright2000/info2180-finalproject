<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<table>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Created</th>
    </tr>";
    
foreach ($results as $row)
echo"<tr> 
    <td id='tableName'>" . $row['firstname'] .' '. $row['lastname'] . "</td>
    <td id='tableContent'>" . $row['email'] . "</td>
    <td id='tableContent'>".ucfirst($row['role'])."</td>
    <td id='tableContent'>" . $row['created_at'] . "</td>
    </tr>";
?>