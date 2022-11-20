

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="dashboardStyle.css">
        <script type="text/javascript" src="dashboardJs.js"></script>
    </head>
        <body>
        <div class="container">
            <header>
                <img src="dolphin.png">
                <h1> Dolphin CRM</h1> 
            </header>
            <div class="sidePanel">
                <ul>
                    <div class="home">
                        <img src="home.png">
                        <a href="dashboard.php" id="homeLink">Home</a>
                    </div>

                    <div class="newContact">
                        <img src="contact.png">
                        <a href="newContact.php" id="contactsLink">New Contact</a>
                    </div>

                    <div class="users">
                        <img src="user.png">
                        <a href="viewUsers.php" id="usersLink">Users</a>
                    </div>
                    <hr>
                    <div class="logout">
                        <img src="logout.png">
                        <a href="logout.php">Logout</a>
                    </div>
                </ul>
            </div>
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