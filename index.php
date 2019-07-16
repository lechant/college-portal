<!DOCTYPE html>
<html>
<head>
  <title>Welcome to </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
      require("scripts/databaseConfig.php");
      require("scripts/loginCheck.php");
      require("scripts/contactus.php");
      session_start();
  ?>
	
	<header>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
   <?php
    //signup
    if($_SESSION['loginID']){
    //check user login status
        if(getAdminById($_SESSION['loginID']) And getLoginById($_SESSION['loginID'])){
            echo "<a href= 'adminControl.php'>control</a>";
        }
    }
  ?> 
  <?php
    //signup
    if($_SESSION['loginID']){
    //check user login status
        if(getLoginById($_SESSION['loginID']) == 1){
            echo "<a href= './scripts/loginSet.php?id=" . $_SESSION['loginID'] ."'><i class='fa fa-fw fa-user'></i>logout</a>";
        }else{
            echo "<a href='signUp.php'><i class='fa fa-fw fa-user'></i>Sign up</a>";
        }
    }
  ?> 
  <?php
    //login
    if($_SESSION['loginID']){
    //check user login status
        if(getLoginById($_SESSION['loginID']) == 1){
            echo "<a href='#'><i class='fa fa-fw fa-user'></i>" . getUsernameById($_SESSION['loginID']) . "</a>";
        }else{
            echo "<a href='login.php'><i class='fa fa-fw fa-user'></i>Login</a>";
        }
    }
  ?>

  <a href="#"><i class="fa fa-fw fa-question"></i>Why use our service</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i>Contact us</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> About us</a>
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
</div>
	</header>
	
  <div class="parallax1">
    <div class="heading">
	Find The College You Interested	
	<br> <br>
	  <div class="inner-form">	  
				<input type="text" id="search-input" class="search-field college" placeholder="What are you looking for?" />	
				<button id="search-btn" class="btn-search" type="button">Search</button>
		</div>
    </div>
	
  </div>

  <section>
    <h1><bold>ABOUT US</bold></h1>
    <h3><bold>Join our mission to make study choice transparent, globally.</bold></h3>
    <div class="two-col">
      <p>Every year, we change the lives of millions of students. We enable them to 
	  explore all their study options in one place and to find the right study programme
	  that matches their needs, goals, and preferences. In order to succeed in this mission, 
	  we work with many universities, business schools, law schools, and pathway providers 
		who are eager to diversify their campuses and attract the right students from all over the world.</p>
    </div>
    <div class="two-col">
      <p>Education choice continues to reach a broad, global scale; and more students are keen to study 
	  abroad than ever before. Bring your institution to where over 36 million prospective students are 
	  searching for their next study abroad opportunity. Ensure that your institution shines in a place where 
	  students can discover the amazing programmes you’re offering, and choose for the right one for themselves.</p>
    </div>
  </section>

  <div class="parallax2">
    <div class="heading-sm">
	  -WORK HARD IN SILENCE LET SUCCESS MAKE THE NOISE-
    </div>
  </div>

  <section class="dark">
    <h2>WHY USE OUR SERVICES?</h2>
	
	
	<div class="flip3D">
  <div class="back"> <br>
  A modern Student Portal can provide centralized, secure access to student 
  and facility information by connecting to these systems and pulling key 
  information into the portal.
  </div>
  <div class="front"><br>
  <img src="img/box1.png" alt="Avatar" style="width:190px;height:190px;">
  </div>
</div>


<div class="flip3D">
  <div class="back"> <br><br>
  Provide students with tools that help them easily 
  find the information they need. That's why you need a Digital Experience Portal</div>
  <div class="front"><br>
  <img src="img/box2.png" alt="Avatar" style="width:190px;height:190px;">
  </div>
</div>


<div class="flip3D">
  <div class="back"> <br><br>
  A student portal provides an engaging student experience with a single point of access and 
  hub to all applications, information, and content.
  </div>
  <div class="front"> <br>
  <img src="img/box3.png" alt="Avatar" style="width:180px;height:190px;">
  </div>
</div>
    
	
	<div class="flip3D">
  <div class="back"> <br>
  Any student, new or returning, has a long “To Do List” 
  prior to beginning the school year. Students need to select 
  courses, get familiar with the institution grounds, find out 
  where classes take place and much more</div>
  <div class="front"> <br>
  <img src="img/box4.png" alt="Avatar" style="width:180px;height:180px;">
  </div>
</div>


<div class="flip3D">
  <div class="back"> <br>
  New portal strategies provide better "brand forward" online experiences, 
  a more agile and web-friendly integration 
  approach with back office and legacy applications and web experience  
  </div>
  <div class="front"> <br>
  <img src="img/box5.png" alt="Avatar" style="width:180px;height:180px;">
  </div>
</div>


<div class="flip3D">
  <div class="back"> <br>
  The Mordern Student Portal empowers colleges and universities to create a 
  brand forward experience that demonstrates the uniqueness of the school 
  and the students who attend.
  </div>
  <div class="front"> <br>
  <img src="img/box6.png" alt="Avatar" style="width:180px;height:180px;">
  </div>
</div>


  </section>
  
  

  <div class="parallax3">
  </div>
  <?php
      if(!empty($_POST['fname']) And !empty($_POST['email']) And !empty($_POST['comment'])){
        contactForm ($_POST['fname'],$_POST['email'], empty($_POST['comment']));
      }
  ?>
  <div class="dark">
    <h3>CONTACT US</h3>
    <form action="#" method="post">
    <div class="two-col">
       <div class="inner-form">	  
		<label for="fname">Name</label>
			<input type="text" id="fname" name="fname" placeholder="Please enter your name..">
        <label for="email">Email</label>
			<input type="text" id="email" name="email" placeholder="Please enter your email..">
		<label for="comment">Comment</label>
			<textarea id="comment" name="comment" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
        			
		</div>
    </div>
	</form>
	<div class="two-col">
	<h1> Get in Touch </h1>
	<h4><p> You may contact us by filling in this form any time you need professional support or have any questions.
	You can also fill in the form to leave your comments or feedback.</p></h4>
	<br>
	<h3> Location: 2200 Western Ave Suite 200, Seattle, WA 98121 </h3>
	<h3> Email support: support@gmail.com</h3>
	<br>
	<h3> Explore life with us</h3>
	<h4><p>You're not going to hit a ridiculously long phone menu when you call us. Your email isn't going to the 
			inbox abyss, never to be seen or heard from again.we provide the exceptional service we'd want to experience 
			ourselves!</p></h4>
	</div>
  </div>

  <div class="parallax4">
  </div>
  
  <footer>
  <p>Created by: IBM2104 Project Group 16</p>
  <p>Contact information: support@gmail.com</p>
</footer>

<?php
  function cT(){
    echo "<script>
    document.getElementsByTagName('footer')[0].style.background = 'blue';
</script>";
  }
?>

<script>
    document.getElementById("search-btn").addEventListener("click",function(){
        window.location.assign("searchPage.php?query="+document.getElementById("search-input").value);
    });
</script>

</body>
</html>

















