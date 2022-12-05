<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';

if ($_SESSION['loggedIn']!=1) {
  Header('Location: index.php');
}

if(isset($_SESSION['id'])) {
  $user = $_SESSION['id'];
}
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
/*port 3306 was not allowing me to open php admin so I had to change it and this line would not run without specifying the new port*/
/*First name, last name, email, company, type */
$allContactsQ = $conn->query("SELECT * FROM Contacts");
$allContacts = $allContactsQ->fetchAll(PDO::FETCH_ASSOC);
$lookup = $_COOKIE['lookup'];

if ($lookup == 'salesLeads') {
  $stmt = $conn->query("SELECT id, title, firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.type='Sales Lead'");
} 
if ($lookup=="support"){
  $stmt = $conn->query("SELECT id,title, firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.type='Support'");
} 
if ($lookup=="assignedToMe") {
    $stmt = $conn->query("SELECT id,title, firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.assigned_to='$user'");
} 
if ($lookup=="all"){
    $stmt = $conn->query("SELECT id,title, firstname, lastname, email, company, Contacts.type FROM Contacts");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Company</th>
    <th>Type</th>
    <th></th>
  </tr>
  <?php foreach ($results as $r): ?>
    <tr>
      <td><a href='ViewFullContactsDetail.php?query=<?=$r["id"]?>' id="tableName"><?=$r['title'].". ".$r['firstname']." ".$r['lastname']?></a></td>
      <td id="tableContent"><?=$r['email'];?></td>
      <td id="tableContent"><?=$r['company'];?></td>
      <?php if ($r['type']=='Sales Lead'): ?>
        <td id="justifySL"><?="<div id='salesLead'>".$r['type']."</div>";?></td>
      <?php else: ?>
        <td id="justifySL"><?="<div id='support'>".$r['type']."</div>";?></td>
      <?php endif; ?>
      <td id="justifyView"><a href='ViewFullContactsDetail.php?query=<?=$r["id"]?>' id='viewLink'>View</a></td>
    </tr>
  <?php endforeach; ?>
</table>