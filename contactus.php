<?php

function contactForm ($Name, $Email, $Message){

$sql = "INSERT INTO contactUs (Name, Email, Message)
values('$Name', '$Email', '$Message')";

if (mysqli_query($conn, $sql)) {
#    echo "New record created successfully";
} else {
#    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

}

function inputCheck (){

$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed";
}

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}

}


?>