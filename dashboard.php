<?php
    session_start();
    if ($_SESSION['loggedIn']!=1) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intitial-scale=1.0">
        <link rel="stylesheet" href="dashboardStyle.css">
        <script type="text/javascript" src="dashboardJs.js"></script>
    </head>
        <body>
        <div class="container">
            <?php include 'page-header-sidebar.php'; ?>
            <div class="content">
                <div class="dashboardHeader">
                    <h1>Dashboard</h1> 
                    <button onclick="location.href='createContact.php';" id="addContact"><img src="plus.png" id="plus">Add Contact</button>
                </div>
                <div class="dbContent">
                    <div class="contacts">
                        <div class="filter">
                            <img src="filter.png" id="filter">
                            <h3>Filter by:</h3>
                        </div>
                        <div class="navBar">
                            <nav>
                                <ul>
                                    <li><button id="allBtn">All</button></li>
                                    <li><button id="salesLeadBtn">Sales Leads</button></li>
                                    <li><button id="supportBtn">Support</button></li>
                                    <li><button id="assignedToMeBtn">Assigned to me</button></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </body>
</html>