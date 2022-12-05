<?php
session_start();

if ($_SESSION['loggedIn']!=1) {
    Header('Location: index.php');
  }
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$Contactsid =$_GET['query'] + 0;
$_SESSION['thisContactId'] = $Contactsid;
$stmt = $conn->query("SELECT Contacts.id, Contacts.title, Contacts.firstname, Contacts.lastname, Contacts.email, Contacts.telephone, Contacts.company, Contacts.type, Contacts.assigned_to, Contacts.created_by, Contacts.created_at, Contacts.updated_at FROM Contacts WHERE Contacts.id = '$Contactsid'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $conn->query("SELECT comment, created_by, created_at FROM Notes WHERE contact_id='$Contactsid'");
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$createdBy = $results[0]["created_by"];
$assignedTo = $results[0]['assigned_to'];
$creatorContactQ = $conn->query("SELECT firstname, lastname FROM users WHERE id = '$createdBy'");
$ccqResult = $creatorContactQ->fetchAll(PDO::FETCH_ASSOC);
$assignedToQ =  $conn->query("SELECT firstname, lastname FROM users WHERE id = '$assignedTo'");
$atqResult = $assignedToQ->fetchAll(PDO::FETCH_ASSOC);
if(sizeof($results2)>0) {
    //$created_by = $results2//[0]["created_by"];
    //$ncqComment = $results2//[0]['comment'];
    //$ncqCreatedAt = $results2//[0]['created_at'];
    $joinQ=$conn->query("SELECT users.firstname,users.lastname,Notes.comment, Notes.created_by, Notes.created_at FROM users INNER JOIN Notes ON Notes.created_by=users.id WHERE Notes.contact_id='$Contactsid'");
    $join = $joinQ->fetchAll(PDO::FETCH_ASSOC);
} else {
    //$created_by = NULL;
    //$ncqComment = "";
    //$ncqCreatedAt = NULL;
}


$noteCreatorQ = $conn->query("SELECT id, firstname, lastname FROM users");
$ncqResults = $noteCreatorQ->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['thisType'] = $results[0]['type'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="FullContactsStyle.css">
        <link rel="stylesheet" href="dashboardStyle.css">
       <script type="text/javascript" src="viewContacts.js"></script>
    </head>
        <body>
        <div class="container">
            <?php include 'page-header-sidebar.php'; ?>
            <div class="Contactcontent">
            <div class="Header">
                <div class ="ContactInfo" >
                    <img src="avatar.png">
                    <div class = "Contactdata">
                    <h3> <?= $results[0]['title']." ".$results[0]['firstname']." ".$results[0]['lastname'] ?></h1> 
                    <p>Created on <?=$results[0]['created_at']?> by <?=$ccqResult[0]['firstname']." ".$ccqResult[0]["lastname"]?> </p>
                    <p> Updated on <?=$results[0]['updated_at']?></p>
                    </div>
                </div>
                <div class="buttonArea">
            
                <div class="assign">
                    <button  id="assignBtn"><img src="blackpalm.png" id="blackpalm"><h5>Assign to Me</h5></button>
                </div>
                <div class="SwitchTo">
                        <button  id="Switch"><img src ="switch.png"><?php if ($results[0]['type']=='Sales Lead'):?>
                        <h5>Switch to Support</h5>
                        <?php else: ?>
                          <h5>Switch to Sales Lead</h5>  
                        <?php endif; ?>
                        </button>  
                </div>
                </div>
                
            </div>

                <section class="Info">
                    <div class ="Information1">
                        <div class="Info1">
                            <div class="email">
                            <h3>Email</h3>
                            <p><?= $results[0]['email']?></p>
                            </div>
                        
                            <div class="Telephone">
                            <h3>Telephone</h3>
                            <p><?= $results[0]['telephone']?></p>
                            </div>
                        </div>
                        <br>
                        <div class = "Info2">
                        <div class = "Company">
                            <h3>Company</h3>
                            <p><?= $results[0]['company']?></p>
                            </div>
                        
                            <div class="Assigned">
                            <h3>Assigned to</h3>
                                <p><?= $atqResult[0]['firstname']." ".$atqResult[0]['lastname']?></p>
                            </div>
                        </div>
                    </div>
            </section>
            <section class="Notes">
                <div class = "NoteSec"> 
                    <div class ="heading">
                        <div class= "headingNotes" >
                            <img src ="notes.png" id ="notes"> 
                            <h3>Notes</h3>
                        </div>
                    </div>
                    <div class="noteInfo">
                    <?php if (sizeof($join)>0): ?>
                        <?php foreach ($join as $r): ?>
                            <h3><?= $r['firstname']." ".$r['lastname']?></h3>
                            <p><?= $r['comment']?></p>
                            <p><?= $r['created_at']?></p>
                            <br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div  class = "AddCom">
                        <form action="" method="post">
                            <div class ="label">
                            <label>Add a note about <?= $results[0]['firstname']?></label>
                            </div>
                        <br>
                            <div class="Comment">
                                <input type="note" name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;" placeholder="Enter details here"></input>
                            </div>
                        <br>
                            <button id="Addhere" type="submit" >Add Here</button>
                        </form>
                    </div>
                </div> 
            </section>
                </div>
            </div>
        </div>
    </body>
</html>