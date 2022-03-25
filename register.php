<!-- This is signup page design  -->
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/signup.css">
 
    <title>Signup Musicity</title>
  </head>
  <body>
    <div class="container-fluid background">
        <div class="form-container">
            <h2>Create an account</h2>
            <form action="signup.php" method="POST" class="signupform">
                <p>
                    <label for="username"><i class="fas fa-user-circle"></i> Username</label><br>
                    <input type="text" name="username" id="username" value="<?php getInputValue('username'); ?>"required>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                </p>
                <p>
                    <label for="firstname"><i class="fas fa-file-signature"></i> First name</label><br>
                    <input type="text" name="firstname" id="firstname" value="<?php getInputValue('firstname'); ?>" required>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                </p>
                <p>
                    <label for="lastname"><i class="fas fa-signature"></i> Last name</label><br>
                    <input type="text" name="lastname" id="lastname" value="<?php getInputValue('lastname'); ?>" required>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                </p>
                <p>
                    <label for="country"><i class="fas fa-globe"></i> Country</label><br>
                    <select style="background:transparent;border:0;outline:none;border-bottom:2px solid orangered;color:white;font-weight:400;" id="country" name="country" class="form-control" required>
                        <option style="color:black;" value="Afghanistan">Afghanistan</option>
                        <option style="color:black;" value="Åland Islands">Åland Islands</option>
                        <option style="color:black;" value="Albania">Albania</option>
                        <option style="color:black;" value="Algeria">Algeria</option>
                        <option style="color:black;" value="American Samoa">American Samoa</option>
                        <option style="color:black;" value="Andorra">Andorra</option>
                        <option style="color:black;" value="Angola">Angola</option>
                        <option style="color:black;" value="Anguilla">Anguilla</option>
                        <option style="color:black;" value="Antarctica">Antarctica</option>
                        <option style="color:black;" value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option style="color:black;" value="Argentina">Argentina</option>
                        <option style="color:black;" value="Armenia">Armenia</option>
                        <option style="color:black;" value="Aruba">Aruba</option>
                        <option style="color:black;" value="Australia">Australia</option>
                        <option style="color:black;" value="Austria">Austria</option>
                        <option style="color:black;" value="Azerbaijan">Azerbaijan</option>
                        <option style="color:black;" value="Bahamas">Bahamas</option>
                        <option style="color:black;" value="Bahrain">Bahrain</option>
                        <option style="color:black;" value="Bangladesh">Bangladesh</option>
                        <option style="color:black;" value="Barbados">Barbados</option>
                        <option style="color:black;" value="Belarus">Belarus</option>
                        <option style="color:black;" value="Belgium">Belgium</option>
                        <option style="color:black;" value="Belize">Belize</option>
                        <option style="color:black;" value="Benin">Benin</option>
                        <option style="color:black;" value="Bermuda">Bermuda</option>
                        <option style="color:black;" value="Bhutan">Bhutan</option>
                        <option style="color:black;" value="Bolivia">Bolivia</option>
                        <option style="color:black;" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option style="color:black;" value="Botswana">Botswana</option>
                        <option style="color:black;" value="Bouvet Island">Bouvet Island</option>
                        <option style="color:black;" value="Brazil">Brazil</option>
                        <option style="color:black;" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option style="color:black;" value="Brunei Darussalam">Brunei Darussalam</option>
                        <option style="color:black;" value="Bulgaria">Bulgaria</option>
                        <option style="color:black;" value="Burkina Faso">Burkina Faso</option>
                        <option style="color:black;" value="Burundi">Burundi</option>
                        <option style="color:black;" value="Cambodia">Cambodia</option>
                        <option style="color:black;" value="Cameroon">Cameroon</option>
                        <option style="color:black;" value="Canada">Canada</option>
                        <option style="color:black;" value="Cape Verde">Cape Verde</option>
                        <option style="color:black;" value="Cayman Islands">Cayman Islands</option>
                        <option style="color:black;" value="Central African Republic">Central African Republic</option>
                        <option style="color:black;" value="Chad">Chad</option>
                        <option style="color:black;" value="Chile">Chile</option>
                        <option style="color:black;" value="China">China</option>
                        <option style="color:black;" value="Christmas Island">Christmas Island</option>
                        <option style="color:black;" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option style="color:black;" value="Colombia">Colombia</option>
                        <option style="color:black;" value="Comoros">Comoros</option>
                        <option style="color:black;" value="Congo">Congo</option>
                        <option style="color:black;" value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option style="color:black;" value="Cook Islands">Cook Islands</option>
                        <option style="color:black;" value="Costa Rica">Costa Rica</option>
                        <option style="color:black;" value="Cote D'ivoire">Cote D'ivoire</option>
                        <option style="color:black;" value="Croatia">Croatia</option>
                        <option style="color:black;" value="Cuba">Cuba</option>
                        <option style="color:black;" value="Cyprus">Cyprus</option>
                        <option style="color:black;" value="Czech Republic">Czech Republic</option>
                        <option style="color:black;" value="Denmark">Denmark</option>
                        <option style="color:black;" value="Djibouti">Djibouti</option>
                        <option style="color:black;" value="Dominica">Dominica</option>
                        <option style="color:black;" value="Dominican Republic">Dominican Republic</option>
                        <option style="color:black;" value="Ecuador">Ecuador</option>
                        <option style="color:black;" value="Egypt">Egypt</option>
                        <option style="color:black;" value="El Salvador">El Salvador</option>
                        <option style="color:black;" value="Equatorial Guinea">Equatorial Guinea</option>
                        <option style="color:black;" value="Eritrea">Eritrea</option>
                        <option style="color:black;" value="Estonia">Estonia</option>
                        <option style="color:black;" value="Ethiopia">Ethiopia</option>
                        <option style="color:black;" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option style="color:black;" value="Faroe Islands">Faroe Islands</option>
                        <option style="color:black;" value="Fiji">Fiji</option>
                        <option style="color:black;" value="Finland">Finland</option>
                        <option style="color:black;" value="France">France</option>
                        <option style="color:black;" value="French Guiana">French Guiana</option>
                        <option style="color:black;" value="French Polynesia">French Polynesia</option>
                        <option style="color:black;" value="French Southern Territories">French Southern Territories</option>
                        <option style="color:black;" value="Gabon">Gabon</option>
                        <option style="color:black;" value="Gambia">Gambia</option>
                        <option style="color:black;" value="Georgia">Georgia</option>
                        <option style="color:black;" value="Germany">Germany</option>
                        <option style="color:black;" value="Ghana">Ghana</option>
                        <option style="color:black;" value="Gibraltar">Gibraltar</option>
                        <option style="color:black;" value="Greece">Greece</option>
                        <option style="color:black;" value="Greenland">Greenland</option>
                        <option style="color:black;" value="Grenada">Grenada</option>
                        <option style="color:black;" value="Guadeloupe">Guadeloupe</option>
                        <option style="color:black;" value="Guam">Guam</option>
                        <option style="color:black;" value="Guatemala">Guatemala</option>
                        <option style="color:black;" value="Guernsey">Guernsey</option>
                        <option style="color:black;" value="Guinea">Guinea</option>
                        <option style="color:black;" value="Guinea-bissau">Guinea-bissau</option>
                        <option style="color:black;" value="Guyana">Guyana</option>
                        <option style="color:black;" value="Haiti">Haiti</option>
                        <option style="color:black;" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option style="color:black;" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option style="color:black;" value="Honduras">Honduras</option>
                        <option style="color:black;" value="Hong Kong">Hong Kong</option>
                        <option style="color:black;" value="Hungary">Hungary</option>
                        <option style="color:black;" value="Iceland">Iceland</option>
                        <option style="color:black;" value="India">India</option>
                        <option style="color:black;" value="Indonesia">Indonesia</option>
                        <option style="color:black;" value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option style="color:black;" value="Iraq">Iraq</option>
                        <option style="color:black;" value="Ireland">Ireland</option>
                        <option style="color:black;" value="Isle of Man">Isle of Man</option>
                        <option style="color:black;" value="Israel">Israel</option>
                        <option style="color:black;" value="Italy">Italy</option>
                        <option style="color:black;" value="Jamaica">Jamaica</option>
                        <option style="color:black;" value="Japan">Japan</option>
                        <option style="color:black;" value="Jersey">Jersey</option>
                        <option style="color:black;" value="Jordan">Jordan</option>
                        <option style="color:black;" value="Kazakhstan">Kazakhstan</option>
                        <option style="color:black;" value="Kenya">Kenya</option>
                        <option style="color:black;" value="Kiribati">Kiribati</option>
                        <option style="color:black;" value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option style="color:black;" value="Korea, Republic of">Korea, Republic of</option>
                        <option style="color:black;" value="Kuwait">Kuwait</option>
                        <option style="color:black;" value="Kyrgyzstan">Kyrgyzstan</option>
                        <option style="color:black;" value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option style="color:black;" value="Latvia">Latvia</option>
                        <option style="color:black;" value="Lebanon">Lebanon</option>
                        <option style="color:black;" value="Lesotho">Lesotho</option>
                        <option style="color:black;" value="Liberia">Liberia</option>
                        <option style="color:black;" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option style="color:black;" value="Liechtenstein">Liechtenstein</option>
                        <option style="color:black;" value="Lithuania">Lithuania</option>
                        <option style="color:black;" value="Luxembourg">Luxembourg</option>
                        <option style="color:black;" value="Macao">Macao</option>
                        <option style="color:black;" value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                        <option style="color:black;" value="Madagascar">Madagascar</option>
                        <option style="color:black;" value="Malawi">Malawi</option>
                        <option style="color:black;" value="Malaysia">Malaysia</option>
                        <option style="color:black;" value="Maldives">Maldives</option>
                        <option style="color:black;" value="Mali">Mali</option>
                        <option style="color:black;" value="Malta">Malta</option>
                        <option style="color:black;" value="Marshall Islands">Marshall Islands</option>
                        <option style="color:black;" value="Martinique">Martinique</option>
                        <option style="color:black;" value="Mauritania">Mauritania</option>
                        <option style="color:black;" value="Mauritius">Mauritius</option>
                        <option style="color:black;" value="Mayotte">Mayotte</option>
                        <option style="color:black;" value="Mexico">Mexico</option>
                        <option style="color:black;" value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option style="color:black;" value="Moldova, Republic of">Moldova, Republic of</option>
                        <option style="color:black;" value="Monaco">Monaco</option>
                        <option style="color:black;" value="Mongolia">Mongolia</option>
                        <option style="color:black;" value="Montenegro">Montenegro</option>
                        <option style="color:black;" value="Montserrat">Montserrat</option>
                        <option style="color:black;" value="Morocco">Morocco</option>
                        <option style="color:black;" value="Mozambique">Mozambique</option>
                        <option style="color:black;" value="Myanmar">Myanmar</option>
                        <option style="color:black;" value="Namibia">Namibia</option>
                        <option style="color:black;" value="Nauru">Nauru</option>
                        <option style="color:black;" value="Nepal">Nepal</option>
                        <option style="color:black;" value="Netherlands">Netherlands</option>
                        <option style="color:black;" value="Netherlands Antilles">Netherlands Antilles</option>
                        <option style="color:black;" value="New Caledonia">New Caledonia</option>
                        <option style="color:black;" value="New Zealand">New Zealand</option>
                        <option style="color:black;" value="Nicaragua">Nicaragua</option>
                        <option style="color:black;" value="Niger">Niger</option>
                        <option style="color:black;" value="Nigeria">Nigeria</option>
                        <option style="color:black;" value="Niue">Niue</option>
                        <option style="color:black;" value="Norfolk Island">Norfolk Island</option>
                        <option style="color:black;" value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option style="color:black;" value="Norway">Norway</option>
                        <option style="color:black;" value="Oman">Oman</option>
                        <option style="color:black;" value="Pakistan">Pakistan</option>
                        <option style="color:black;" value="Palau">Palau</option>
                        <option style="color:black;" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option style="color:black;" value="Panama">Panama</option>
                        <option style="color:black;" value="Papua New Guinea">Papua New Guinea</option>
                        <option style="color:black;" value="Paraguay">Paraguay</option>
                        <option style="color:black;" value="Peru">Peru</option>
                        <option style="color:black;" value="Philippines">Philippines</option>
                        <option style="color:black;" value="Pitcairn">Pitcairn</option>
                        <option style="color:black;" value="Poland">Poland</option>
                        <option style="color:black;" value="Portugal">Portugal</option>
                        <option style="color:black;" value="Puerto Rico">Puerto Rico</option>
                        <option style="color:black;" value="Qatar">Qatar</option>
                        <option style="color:black;" value="Reunion">Reunion</option>
                        <option style="color:black;" value="Romania">Romania</option>
                        <option style="color:black;" value="Russian Federation">Russian Federation</option>
                        <option style="color:black;" value="Rwanda">Rwanda</option>
                        <option style="color:black;" value="Saint Helena">Saint Helena</option>
                        <option style="color:black;" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option style="color:black;" value="Saint Lucia">Saint Lucia</option>
                        <option style="color:black;" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option style="color:black;" value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option style="color:black;" value="Samoa">Samoa</option>
                        <option style="color:black;" value="San Marino">San Marino</option>
                        <option style="color:black;" value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option style="color:black;" value="Saudi Arabia">Saudi Arabia</option>
                        <option style="color:black;" value="Senegal">Senegal</option>
                        <option style="color:black;" value="Serbia">Serbia</option>
                        <option style="color:black;" value="Seychelles">Seychelles</option>
                        <option style="color:black;" value="Sierra Leone">Sierra Leone</option>
                        <option style="color:black;" value="Singapore">Singapore</option>
                        <option style="color:black;" value="Slovakia">Slovakia</option>
                        <option style="color:black;" value="Slovenia">Slovenia</option>
                        <option style="color:black;" value="Solomon Islands">Solomon Islands</option>
                        <option style="color:black;" value="Somalia">Somalia</option>
                        <option style="color:black;" value="South Africa">South Africa</option>
                        <option style="color:black;" value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                        <option style="color:black;" value="Spain">Spain</option>
                        <option style="color:black;" value="Sri Lanka">Sri Lanka</option>
                        <option style="color:black;" value="Sudan">Sudan</option>
                        <option style="color:black;" value="Suriname">Suriname</option>
                        <option style="color:black;" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option style="color:black;" value="Swaziland">Swaziland</option>
                        <option style="color:black;" value="Sweden">Sweden</option>
                        <option style="color:black;" value="Switzerland">Switzerland</option>
                        <option style="color:black;" value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option style="color:black;" value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option style="color:black;" value="Tajikistan">Tajikistan</option>
                        <option style="color:black;" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option style="color:black;" value="Thailand">Thailand</option>
                        <option style="color:black;" value="Timor-leste">Timor-leste</option>
                        <option style="color:black;" value="Togo">Togo</option>
                        <option style="color:black;" value="Tokelau">Tokelau</option>
                        <option style="color:black;" value="Tonga">Tonga</option>
                        <option style="color:black;" value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option style="color:black;" value="Tunisia">Tunisia</option>
                        <option style="color:black;" value="Turkey">Turkey</option>
                        <option style="color:black;" value="Turkmenistan">Turkmenistan</option>
                        <option style="color:black;" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option style="color:black;" value="Tuvalu">Tuvalu</option>
                        <option style="color:black;" value="Uganda">Uganda</option>
                        <option style="color:black;" value="Ukraine">Ukraine</option>
                        <option style="color:black;" value="United Arab Emirates">United Arab Emirates</option>
                        <option style="color:black;" value="United Kingdom">United Kingdom</option>
                        <option style="color:black;" value="United States">United States</option>
                        <option style="color:black;" value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option style="color:black;" value="Uruguay">Uruguay</option>
                        <option style="color:black;" value="Uzbekistan">Uzbekistan</option>
                        <option style="color:black;" value="Vanuatu">Vanuatu</option>
                        <option style="color:black;" value="Venezuela">Venezuela</option>
                        <option style="color:black;" value="Viet Nam">Viet Nam</option>
                        <option style="color:black;" value="Virgin Islands, British">Virgin Islands, British</option>
                        <option style="color:black;" value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option style="color:black;" value="Wallis and Futuna">Wallis and Futuna</option>
                        <option style="color:black;" value="Western Sahara">Western Sahara</option>
                        <option style="color:black;" value="Yemen">Yemen</option>
                        <option style="color:black;" value="Zambia">Zambia</option>
                        <option style="color:black;" value="Zimbabwe">Zimbabwe</option>
                    </select>
                </p>
                <p>
                    <label for="email"><i class="fas fa-envelope"></i> Email</label><br>
                    <input type="email" name="email" id="email" placeholder="someone@gmail.com" value="<?php getInputValue('email'); ?>" required>
                    <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                </p>
                <p>
                    <label for="confirmemail"><i class="fas fa-envelope"></i> Confirm Email</label><br>
                    <input type="email" name="confirmemail" id="confirmemail" placeholder="someone@gmail.com" value="<?php getInputValue('confirmemail'); ?>" required>
                </p>
                <p>
                    <label for="password"><i class="fas fa-lock"></i> Password</label><br>
                    <input type="password" name="regpassword" id="regpassword" placeholder="" required>
                    <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>
                </p>
                <p>
                    <label for="password"><i class="fas fa-lock"></i> Confirm Password</label><br>
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="" required>
                </p>
                <button class="btn-outline-primary reg-button" name="submitbutton">Submit</button>
                <p class="checker">Already have an account? <a href="login.php">Log in</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </body>
</html>

