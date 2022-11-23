<?php
/*$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';*/

$allContactsQ = $conn->query("SELECT * FROM Contacts");
$allContacts = $allContactsQ->fetchAll(PDO::FETCH_ASSOC);
$conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4", $username, $password)
/*port 3306 was not allowing me to open php admin so I had to change it and this line would not run without specifying the new port*/
/*First name, last name, email, company, type */
if ($lookup == 'salesLeads') {
  $stmt = $conn->query("SELECT firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.type=='Sales Lead'");
} else if ($lookup=="support"){
  $stmt = $conn->query("SELECT firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.type=='Support'");
} else if ($lookup=="assignedToMe") {
    $stmt = $conn->query("SELECT firstname, lastname, email, company, Contacts.type FROM Contacts WHERE Contacts.assigned_to=='$allContacts['assigned_to']'");
} else {
    $stmt = $conn->query("SELECT firstname, lastname, email, company, Contacts.type FROM Contacts");
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
      <td><?=$r['firstname']." ".$r['lastname'];?></td>
      <td><?=$r['email'];?></td>
      <td><?=$r['company'];?></td>
      <td><?="<div id='salesLead'>".$r['type']."</div>";?></td>
      <td><?="<a href='viewContacts.php' id='view'>View</a>";?></td>
    </tr>
  <?php endforeach; ?>
</table>