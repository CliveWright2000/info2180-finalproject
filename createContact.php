<?php
    session_start();
    $host = 'localhost';
    $username = 'admin@project2.com';
    $password = 'password123';
    $dbname = 'dolphin_crm';

    $conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT firstname, lastname FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intitial-scale=1.0">
        <link rel="stylesheet" href="dashboardStyle.css">
        <link rel="stylesheet" href="ccStyle.css">
        <script type="text/javascript" src="createContactJs.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include 'page-header-sidebar.php'; ?>
            <div class="content">
                <div class="newContact">
                    <h1>New Contact</h1> 
                    <div id='result'></div>
                </div>
                <div class="CCFields">
                    <form method="post" id="form">
                        <div action="cc-action-page.php" class="form-group">
                            <label for="title" class="CCLabels">Title</label>
                            <select name="title" id="title">
                                <option value="Mr" class="ddtext">Mr</option>
                                <option value="Mrs" class="ddtext">Mrs</option>
                                <option value="Ms" class="ddtext">Ms</option>
                                <option value="Dr" class="ddtext">Dr</option>
                                <option value="Prof" class="ddtext">Prof</option>
                            </select>
                        </div>
                        <div class="form-group" class="adjacentField">
                            <div class="left">
                                <label for="first-name" class="CCLabels">First Name</label>
                                <input type="text" name="first-name" id="first-name" class="form-field" placeholder="Jane"/>
                                <div class="error"></div>
                            </div>  
                            <div class="right">
                                <label for="last-name" class="CCLabels">Last Name</label>
                                <input type="text" name="last-name" id="last-name" class="form-field" placeholder="Doe"/>
                                <div class="error"></div>
                            </div>   
                        </div>
                        <div class="form-group" class="adjacentField">
                            <div class="left">
                                <label for="email" class="CCLabels">Email</label>
                                <input type="text" name="email" id="email" class="form-field" placeholder="something@example.com"/>
                                <div class="error"></div>
                            </div>
                            <div class="right">    
                                <label for="telephone" class="CCLabels">Telephone</label>
                                <input type="text" name="telephone" id="telephone" class="form-field"/>
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="form-group" class="adjacentField">
                            <div class="left">
                                <label for="Company" class="CCLabels">Company</label>
                                <input type="text" name="company" id="company" class="form-field"/>
                                <div class="error"></div>
                            </div>
                            <div class="right">    
                                <label for="type" class="CCLabels">Type</label>
                                <select name="type" class="CCDropDown" id="type">
                                    <option value="Sales Lead" class="ddtext">Sales Lead</option>
                                    <option value="Support" class="ddtext">Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="floatLeft">
                                <label for="assigned-to" class="CCLabels">Assigned To</label>
                                <select name="assigned-to" class="CCDropDown" id="assigned-to">
                                    <?php if (isset($results)): ?>
                                        <?php foreach ($results as $r): ?>
                                            <?= "<option value = ".$r['firstname']." ".$r['lastname']." class='ddtext'>".$r['firstname']." ".$r['lastname']."</option>" ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value=""></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="submitBtn" id="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>