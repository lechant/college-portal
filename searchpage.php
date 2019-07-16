<html>
  <head>
     <link rel="stylesheet" href="search.css">
      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
      <title>Search page</title>
      <style>
          a{text-decoration: none}
      </style>
   </head>
   <body>

	<header>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php
      require("scripts/databaseConfig.php");
      require("scripts/loginCheck.php");
      require("scripts/searchSort.php");
      require("scripts/profilePageModule.php");
      session_start();
  ?>
<ul>
  <li><a href="index.php"><i class="fa fa-fw fa-home"></i></a></li>
  <?php
    //signup
    if($_SESSION['loginID']){
    //check user login status
        if(getLoginById($_SESSION['loginID']) == 1){
            echo "<li><a href= './scripts/loginSet.php?id=" . $_SESSION['loginID'] ."'><i class='fa fa-fw fa-user'></i>logout</a></li>";
        }else{
            echo "<li><a href='signUp.php'><i class='fa fa-fw fa-user'></i>Sign up</a></li>";
        }
    }
  ?> 
  <?php
    //login
    if($_SESSION['loginID']){
    //check user login status
        if(getLoginById($_SESSION['loginID']) == 1){
            echo "<li><a href='#'><i class='fa fa-fw fa-user'></i>" . getUsernameById($_SESSION['loginID']) . "</a></li>";
        }else{
            echo "<li><a href='login.php'><i class='fa fa-fw fa-user'></i>Login</a></li>";
        }
    }
  ?>
  <li>
    <select id="sort-select">
      <option value="none" selected>none</option>
      <option value="rating">rating</option>
      <option value="name">name</option>
      <option value="location">location</option>
    </select>
  </li>
</ul>


	</header>
  
	     <form method="post" action="#" style="">
       <div class="search-box">
        
       <?php
          if(isset($_GET["query"])){
            echo "<input id=\"search\" type=\"text\" name=\"search\" class=\"search-txt\" placeholder=\"Type to search\" value=\"" . $_GET["query"] ."\"/>";
          }else{
            echo "<input id=\"search\" type=\"text\" name=\"search\" class=\"search-txt\" placeholder=\"Type to search\"/>";
          }
       ?>
        
       <a id="search-btn" class="search-btn" href="#">
       <i class="fas fa-search"></i>
       </a>
     </div>
     </form>
	 
	 <div class="block-test">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
if(isset($_GET["query"]) And !isset($_GET["sort"])){
  searchSort("none",$_GET["query"]);
}else if(isset($_GET["query"]) And isset($_GET["sort"])){
  searchSort($_GET["sort"],$_GET["query"]);
}
?>


<!-- <div>
<p>
<img src=\"\"  width=\"300\" height=\"250\" style=\"float: left\" />
Name: <br>
Location: <br>
Rating:
<span class=\"fa fa-star checked\"></span>
<span class=\"fa fa-star checked\"></span>
<span class=\"fa fa-star checked\"></span>
<span class=\"fa fa-star\"></span>
<span class=\"fa fa-star\"></span>
</p>
</div> -->



</div>   
<script>
    var query ="query=";
    var sort  ="sort=";
    document.getElementById("search").addEventListener("change",function(){
      /*document.getElementById("search-btn").href = "?query="+ document.getElementById("search").value;*/
      query += document.getElementById("search").value;
      sort = "sort="+ document.getElementById("sort-select").options[document.getElementById("sort-select").selectedIndex].value;
    });
    document.getElementById("sort-select").addEventListener("change",function(){
      /*document.getElementById("search-btn").href += ("&sort="+ document.getElementById("sort-select").options[document.getElementById("sort-select").selectedIndex].value);*/
      sort +=  document.getElementById("sort-select").options[document.getElementById("sort-select").selectedIndex].value;
      query = "query=" + document.getElementById("search").value;
    });
    document.getElementById("search-btn").addEventListener("click",function(){
      document.getElementById("search-btn").href = "?" + query + "&" + sort;
    });
    var url = window.location.href;
    var getArr = url.split("&");
    var getArrVal = getArr[1].split("=");
    var val = getArrVal[1];
    var opts = document.getElementById("sort-select").options;
    for (var opt, j = 0; opt = opts[j]; j++) {
      if (opt.value == val) {
        document.getElementById("sort-select").selectedIndex = j;
        break;
      }
    }
</script>
   </body>
</html>