<?php
    class Account {
 
        private $con;
        private $errorArray;
        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }
 
        private function insertUserDetails($un, $fn, $ln, $cn, $em, $pw) {
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/head_emerald.png";
            $date = date("Y-m-d");
 
            // $result = mysqli_query($this->con, "INSERT INTO users VALUES ('$un', '', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic', '0')");
            // insering user details
            $userdetails = "INSERT INTO users VALUES ('', '$un','$fn', '$ln','$cn','$em','$encryptedPw','$date','$profilePic','0',NULL)";
            $this->con->exec($userdetails);
            session_start();
            $_SESSION['userLoggedIn'] = $un;
            $_SESSION['userpreferance'] = true;
 
            ?>
                <script>location.assign('userpreference.php')</script>
            <?php
            return;
        }
        public function register($un, $fn, $ln, $cn, $em, $em2, $pw, $pw2) {
            $this->validateUsername($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);
            if(empty($this->errorArray) == true) {
                //Insert into db
                return $this->insertUserDetails($un, $fn, $ln, $cn, $em, $pw);
            }
            else {
                return false;
            }
 
        }
 
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage' style='color:red;font-size:12px;font-weight:bold;text-shadow:0px 1px black'>$error</span>";
        }
 
        private function validateUsername($un) {
 
            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            /*
                This is the previous code we have done previouly
                $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
                if(mysqli_num_rows($checkUsernameQuery) != 0) {
                    array_push($this->errorArray, Constants::$usernameTaken);
                    return;
                }
            */
 
            $checkusername = "SELECT * FROM users WHERE '$un' = username";
            $table = $this->con->query($checkusername);
            if($table->rowCount() !=0 ){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
 
 
        }
 
        private function validateFirstName($fn) {
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }
 
        private function validateLastName($ln) {
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
 
        private function validateEmails($em, $em2) {
            if($em != $em2) {
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
 
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
            /*
                This is the previous code we have done with mysqli_query
                $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
                if(mysqli_num_rows($checkEmailQuery) != 0) {
                    array_push($this->errorArray, Constants::$emailTaken);
                    return;
                }
            */
            $checkemail = "SELECT * FROM users WHERE '$em' = email";
            $table = $this->con->query($checkemail);
            if($table->rowCount() !=0 ){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
 
        }
 
        private function validatePasswords($pw, $pw2) {
           
            if($pw != $pw2) {
                array_push($this->errorArray, Constants::$passwordsDoNoMatch);
                return;
            }
 
            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }
 
            if(strlen($pw) > 20 || strlen($pw) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
 
        }
 
 
    }
?>

