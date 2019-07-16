<html>	
<head>
	<style>
		form{
			width: 12vw;
			height:20vw;
			font-size:1.2vw;
		}
		input{
			margin-bottom:0.5vw;
			width:10vw;
			height:1.5vw;
		}
		p{
			margin-bottom:0.5vw;
			padding:0;
			width:10vw;
			display:block;
		}
	</style>
</head>
<body>
	<?php
		require("scripts/databaseConfig.php");
		require("scripts/loginCheck.php");
		require("scripts/loginSet.php");
		require("scripts/collegeSet.php");
		session_start();
		//validate if user is an admin
		if(!getAdminById($_SESSION['loginID']) Or !getLoginById($_SESSION['loginID'])){
			header("location: index.php");
		}
		
		if(isset($_POST["submit"])){
			if(!empty($_POST["Ename"]) And !empty($_POST["Edescription"]) And !empty($_POST["Esubjects"]) And !empty($_POST["Eimages"]) And !empty($_POST["Emap"]) And !empty($_POST["Erating"]) And !empty($_POST["Ephone"]) And !empty($_POST["Eemail"]) And !empty($_POST["Elocation"])){
				collegeAdd($_POST["Ename"],$_POST["Edescription"],$_POST["Esubjects"],$_POST["Eimages"],$_POST["Emap"],$_POST["Erating"],$_POST["Ephone"],$_POST["Eemail"],$_POST["Elocation"]);
			}
			if(!empty($_POST["Uname"]) And !empty($_POST["Udescription"]) And !empty($_POST["Usubjects"]) And !empty($_POST["Uimages"]) And !empty($_POST["Umap"]) And !empty($_POST["Urating"]) And !empty($_POST["Uphone"]) And !empty($_POST["Uemail"]) And !empty($_POST["Ulocation"])){
				collegeUpdate($_POST["Uname"],$_POST["Udescription"],$_POST["Usubjects"],$_POST["Uimages"],$_POST["Umap"],$_POST["Urating"],$_POST["Uphone"],$_POST["Uemail"],$_POST["Ulocation"]);
			}
			if(!empty($_POST['Dname'])){
				collegeRemove($_POST['Dname']);
			}
		}
	?>
	<form method = 'post' action="#">
		<!-- use prefix 'E' here -->
		<h3>Add college info</h3>
		Name: <input type="text" name="Ename"><br>
		Description: <input type="text" name="Edescription"><br>
		Subjects: <input type="text" name="Esubjects"><br>
		Images: <input type="text" name="Eimages"><br>
		Map: <input type="text" name="Emap"><br>
		Rating: <input type="text" name="Erating"><br>
		Phone: <input type="text" name="Ephone"><br>
		Email: <input type="text" name="Eemail"><br>
		Location: <input type="text" name="Elocation"><br>
		<!-- use prefix 'u' here -->
		<h3>Update college info</h3>
		Name: <input type="text" name="Uname"><br>
		Description: <input type="text" name="Udescription"><br>
		Subjects: <input type="text" name="Usubjects"><br>
		Images: <input type="text" name="Uimages"><br>
		Map: <input type="text" name="Umap"><br>
		Rating: <input type="text" name="Urating"><br>
		Phone: <input type="text" name="Uphone"><br>
		Email: <input type="text" name="Uemail"><br>
		Location: <input type="text" name="Ulocation"><br>
		<!-- use prefix 'D' -->
		<h3>Delete college info</h3>
		Name: <input type="text" name="Dname"><br>

		<input type="submit" value="update" name="submit">
	</form>
<script>

</script>
</body>
</html> 