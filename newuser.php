<?php 
    session_start();
    if ($_SESSION['loggedIn']!=1) {
        header('Location: index.php');
    }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>New User</title>
	    <link rel="stylesheet" href="dashboardStyle.css">
	    <link rel="stylesheet" href="users.css">
		<script type="text/javascript" src="adduser.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		</head>
	<body>
		<div class="container">
        <?php include 'page-header-sidebar.php';?>
			<div class="content">
				<div class="records">
                <h1>New User</h1>
                <div id="loadnote"></div>
                <div class="record2">
                    <form method="post" id="form" action=""> 
                        <div class="user-details">
                        <div class="usertable">
                            <div class="cell">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" required/>
                            </div>
                            <div class="cell">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" required/>
                            </div>
                        </div>
                        <div class="table">
                            <div class="cell">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required/>
                            </div>
                            <div class="cell">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                title="Must be at least 8 characters and contain at least one number and one uppercase and lowercase letter"
                                required/>
                            </div>
                        </div>
                        <div class="table">
                            <div class="cell" class="role">
                                <label for="role">Role</label>
                                <select id="role" name="role">
                                    <option value="Member">Member</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div><br>
                            <div class="cell"></div>
                        </div><br>
                        <div class="save-button">
                            <button type="submit" id="save">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	</body>
</html>
<?php
