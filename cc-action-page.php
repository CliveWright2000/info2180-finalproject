<?php
    session_start();
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dolphin_crm';

    if ($_SESSION['loggedIn']!=1) {
        Header('Location: index.php');
    }

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $title = filter_input (INPUT_GET, 'title', FILTER_SANITIZE_STRING);
    $firstname = filter_input (INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input (INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_GET, 'email', FILTER_SANITIZE_STRING);
    $telephone = filter_input (INPUT_GET, 'telephone', FILTER_SANITIZE_STRING);
    $company = filter_input (INPUT_GET, 'company', FILTER_SANITIZE_STRING);
    $type = filter_input (INPUT_GET, 'type', FILTER_SANITIZE_STRING);
    $assignedTo = filter_input (INPUT_GET, 'assignedTo', FILTER_SANITIZE_STRING);
    $createdBy = $_SESSION['id'];
    
    //to get id for user this contact is assigned to
    $getId = $conn->query("SELECT id FROM users WHERE CONCAT(firstname,' ',lastname)='$assignedTo'");
    $idResult = $getId->fetch(PDO::FETCH_ASSOC);
    if (isset($idResult)) {
        $assignedId = $idResult['id'];
    }

    $insert = $conn->prepare('INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, `type`, assigned_to, created_by, created_at, updated_at) 
    VALUES (:title, :firstname, :lastname, :email, :telephone, :company, :jobType, :assigned_to, :created_by, NOW(), NOW());');
    $insert->bindParam(":title",$title);
    $insert->bindParam(":firstname",$firstname);
    $insert->bindParam(":lastname",$lastname);
    $insert->bindParam(":email",$email);
    $insert->bindParam(":telephone",$telephone);
    $insert->bindParam(":company",$company);
    $insert->bindParam(":jobType",$type);
    $insert->bindParam(":assigned_to",$assignedId);
    $insert->bindParam(":created_by",$createdBy);

    $insert->execute();
    $fullname = $firstname." ".$lastname;
    $checker = $conn->query("SELECT id FROM Contacts WHERE CONCAT(firstname,' ',lastname)='$fullname'");
    $checkResult = $checker->fetch(PDO::FETCH_ASSOC);
    //echo "Contact successfully created! <a href='dashboard.php'>View Contacts</a>"
?>

<?php if(isset($checkResult)): ?>
    <?= "Contact successfully created! <a href='dashboard.php'>View Contacts</a>";?>
<?php else: ?>
    <?= "Contact could not be created. <a href='createContact.php' id='ccError'>Try agin</a>";?>
<?php endif; ?>
