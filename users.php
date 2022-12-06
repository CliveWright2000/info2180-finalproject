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
		<title>Project 2</title>
	    <link rel="stylesheet" href="users.css">
		<link rel="stylesheet" href="dashboardStyle.css">
		</head>
	<body>
		<div class="container">	
		<?php include 'page-header-sidebar.php';?>
			<div class="content">
				<div class="dashboardHeader">
						<h1>Users</h1>
						<button onclick="location.href='newuser.php';" id="addContact"><img src="plus.png" id="plus">Add User</button>
					<div class="db">		
						<div class="record2">
							<div class="tables">
								<div class="us">
									<?php include 'loadusers.php';?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
