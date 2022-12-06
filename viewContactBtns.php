<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$button = $_COOKIE['button'];
$contactId = $_SESSION['thisContactId'];
$type = $_SESSION['thisType'];
$id = $_SESSION['id'];

if ($button == "switch") {
    if($type=='Sales Lead') {
        $action = $conn->query("UPDATE Contacts SET `type` = 'Support', updated_at=NOW() WHERE id='$contactId'");
        $_SESSION['thisType'] = 'Support';
        echo "Switch to Sales Lead";
    } else {
        $action = $conn->query("UPDATE Contacts SET `type` = 'Sales Lead', updated_at=NOW() WHERE id='$contactId'"); 
        $_SESSION['thisType'] = 'Sales Lead';
        echo "Switch to Support";
    }
}

if ($button == "assign") {
    $action = $conn->query("UPDATE Contacts SET assigned_to='$id', updated_at=NOW() WHERE id = '$contactId'");
    $newAssignQ = $conn->query("SELECT firstname, lastname FROM users WHERE id='$id'");
    $newAssignResult = $newAssignQ->fetchAll(PDO::FETCH_ASSOC);
    echo $newAssignResult[0]['firstname']." ".$newAssignResult[0]['lastname'];
}

if ($button == "add") {
    $comment = filter_input (INPUT_GET, 'comment', FILTER_SANITIZE_STRING);
    $action = $conn->query("INSERT INTO Notes (created_by, comment, created_at, contact_id) VALUES ('$id', '$comment', NOW(), '$contactId')");
    $getNotesQ = $conn->query("SELECT created_by, comment, created_at FROM Notes WHERE contact_id='$contactId'");
    $getNotes = $getNotesQ->fetchAll(PDO::FETCH_ASSOC);
    $getNameQ = $conn->query("SELECT firstname, lastname FROM users WHERE id = '$id'");
    $getName = $getNameQ->fetch(PDO::FETCH_ASSOC);
    echo "<h2>".$getName['firstname']." ".$getName['lastname']."</h2><br>
    <p>".$comment."</p><br><p>".$getNotes[0]['created_at']."</p>";
}

?>