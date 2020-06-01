<?php
    include 'header.php';
    require_once 'Dao.php';
    
    $errorName = "";
    $errorPhone = "";
    $errorEmail = "";
    $errorRef = "";

    $name = "";
    $phone = "";
    $email = "";
    $referrer = "";
    $noError = true;

    $conn = new Dao();



    // VALIDATION WHEN SUBMIT 
    if(isset($_POST['btnSubmit'])){

        // CHECK NAME
        if(isset($_POST['customerName']) && !empty($_POST['customerName'])){
            $name = $_POST['customerName'];
        }else {
            $errorName = "Customer name can not be blank. ";
            $noError = false;
        }

        // CHECK PHONE
        if(isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])) {
            $phone = $_POST['phoneNumber']; 
        } else {
            $errorPhone =  "Phone number can not be blank. <br>";
            $noError = false;
        }
        if (isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber']) && !preg_match("/^\d{3}-\d{3}-\d{4}/", trim($phone))){
            $errorPhone = "Please re-enter correct format as 613-111-2222. ";
            $noError = false;
        }
         

        // CHECK EMAIL
        if(isset($_POST['emailAddress']) && !empty($_POST['emailAddress'])){
            $email = $_POST['emailAddress'];
        } else {
            $errorEmail = "Email address can not be blank. <br>"; 
            $noError = false;
        }

        if (isset($_POST['emailAddress'])) {
            
            // invalid characters
            if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", trim($email))) {
                $errorEmail="Invalid email address. Please re-enter. ";
                $noError = false;
            }

            // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //     $errorEmail="Please re_enter valid email address with @ symbol. ";
            //     $noError = false;
            // }

            // duplicate email
            $sqlCheckEmail = "SELECT * FROM `mailinglist` WHERE `emailAddress` = '".$_POST['emailAddress']."'";
            $result = $conn->getData($sqlCheckEmail);
            if(count($result) > 0){
                $errorEmail="This email already exists. ";
                $noError = false;
            }
        }
        
        // CHECK REFERRAL
        if(isset($_POST['referral']) && !empty($_POST['referral'])){

            $referrer = $_POST['referral'];
        } else {
            $errorRef = "Please choose one. <br>";
            $noError = false;
        }

        // SQL TO ADD DATA TO THE DATABASE SERVER
        if($noError){
            $sql = "INSERT INTO mailingList (customerName, phoneNumber, emailAddress, deletedCustomerNames, referrer) VALUES ('".$_POST['customerName']."', '".$_POST['phoneNumber']."', '".$_POST['emailAddress']."', 'No', '".$_POST['referral']."')";
            if($conn->runSql($sql)){
                $name = "";
                $phone = "";
                $email = "";
                $referrer = "";
                
                header('Location: mailing_list.php');
                exit;
            }
        }
    
    }
?>


            
    <div id="content" class="clearfix">
        <aside>
                <h2>Mailing Address</h2>
                <h3>1385 Woodroffe Ave<br>
                    Ottawa, ON K4C1A4</h3>
                <h2>Phone Number</h2>
                <h3>(613)727-4723</h3>
                <h2>Fax Number</h2>
                <h3>(613)555-1212</h3>
                <h2>Email Address</h2>
                <h3>info@wpeatery.com</h3>
        </aside>
        <div class="main">
            <h1>Sign up for our newsletter</h1>
            <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
            <form name="frmNewsletter" id="frmNewsletter" method="post" action="">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="customerName" id="customerName" size='40' value="<?php echo $name; ?>"></td>
                        <td style="color: red"> <?php echo $errorName; ?> </td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" name="phoneNumber" id="phoneNumber" size='40' value="<?php echo $phone; ?>"></td>
                        <td style="color: red"> <?php echo $errorPhone; ?> </td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type="text" name="emailAddress" id="emailAddress" size='40' value="<?php echo $email; ?>">
                        <td style="color: red"> <?php echo $errorEmail; ?> </td>
                    </tr>
                    <tr>
                        <td>How did you hear<br> about us?</td>
                        <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper"  <?php if($referrer == "newspaper" || $referrer == ""){ echo "checked";} ?>>
                            Radio<input type="radio" name='referral' id='referralRadio' value='radio'  <?php if($referrer == "radio"){ echo "checked";} ?>>
                            TV<input type='radio' name='referral' id='referralTV' value='TV'   <?php if($referrer == "TV"){ echo "checked";} ?>>
                            Other<input type='radio' name='referral' id='referralOther' value='other'   <?php if($referrer == "other"){ echo "checked";} ?>>
                        <td style="color: red"> <?php echo $errorRef; ?> </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>
                            <input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- End Main -->
    
<?php include "footer.php";?>