<?php
/*
    Here we are santize the user input like if user gives an extra space on username we romove that.
    we don't consider any space in Username.
*/
 
function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    return $inputText;
}
 
function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}
 
function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}
 
 
if(isset($_POST['submitbutton'])) {
    //Register button was pressed
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstname']);
    $lastName = sanitizeFormString($_POST['lastname']);
    $country = $_POST['country'];
    $email = $_POST['email'];
    $email2 = $_POST['confirmemail'];
    $password = sanitizeFormPassword($_POST['regpassword']);
    $password2 = sanitizeFormPassword($_POST['confirmpassword']);
 
    $account->register($username, $firstName, $lastName,$country, $email, $email2, $password, $password2);
 
    // if($wasSuccessful == true) {
    //  header("Location: home.php");
    // }
 
}
 
 
?>

