<?php
require_once '../../BusinessServiceLayer/model/customerModel.php';

class customerController{
    // The controller that is responsible to handle the login, update profile and registration inputs of the customer.
    
   function add(){
    // create new oject 
        $customer = new customerModel();
         // set the attributes of customer
        $customer->name = $_POST['name'];
        $customer->email = $_POST['email'];
        $customer->phone = $_POST['phone'];
        $customer->address = $_POST['address'];
        $customer->address2 = $_POST['address2'];
        $customer->city = $_POST['city'];
        $customer->state = $_POST['state'];
        $customer->zipcode = $_POST['zipcode'];
        $customer->username = $_POST['username'];
        $customer->password = $_POST['password'];
        $customer->usergroup = $_POST['usergroup'];
        $customer->verified = 0;
        $customer->token = bin2hex(random_bytes(50)); // generate unique token
        if($customer->addCust() > 0){

            $to      = $_POST['email']; // Send email to our user
            $subject = 'Verification'; // Give the email a subject 
            $msg = '
  
            Thanks for signing up!
            Your account has been created, you can login with the following emails after you have activated your account by pressing the url below.
  
            ------------------------
            Email: '.$_POST["email"].'
            ------------------------
  
            Please click this link to activate your account:
            http://localhost/sdw/sdw_group1/ApplicationLayer/ManageLoginInterface/verify.php?email='.$_POST['email'].'&token='.$customer->token.'
  
            '; // Our message above including the link
                      
            $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            
            if(mail($to, $subject, $msg, $headers)){
                $message = "Successfully Registered! Please check your email for authorize your account.";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
            } // Send our email
            else
            {
                $message = "Failed while sending email";
                echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/ManageLoginInterface/CustomerSignup.php';</script>";
            }

            $message = "Customer Successfully Registered";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        // send to customerModel
        }
    }
    
    function viewAll(){
         // view all customer
        $customer = new customerModel();
        return $customer->viewallCust();
    }
    
  function viewCustomer(){
     // get data associate with $id
        $customer = new customerModel();
        $customer->cust_id = $_SESSION['userid'];
        return $customer->viewCustomer();
         //retrieve data from customerModel
    }

  function viewCustomerFullAddress(){
     // get data associate with $id
        $customer = new customerModel();
        $customer->cust_id = $_SESSION['userid'];
        return $customer->viewCustomerFullAddress();
         //retrieve data from customerModel
    }

     function editCustomer(){
        // modify customer data
        $customer = new customerModel();
        $customer->cust_id = $_POST['cust_id'];
        $customer->name = $_POST['name'];
        $customer->email = $_POST['email'];
        $customer->phone = $_POST['phone'];
        $customer->address = $_POST['address'];
        $customer->address2 = $_POST['address2'];
        $customer->city = $_POST['city'];
        $customer->state = $_POST['state'];
        $customer->zipcode = $_POST['zipcode'];
        $customer->username = $_POST['username'];
        $customer->password = $_POST['password'];
        if($customer->modifyCustomer()){
             //update customer data to customerModel
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLoginInterface/profile.php?cust_id=".$_POST['cust_id']."';</script>";
        }
    }

    function reset(){
        $customer = new customerModel();
        $customer->email = $_POST['email'];

        if($customer->check() > 0){
            $token = "0123456789";
            $token = str_shuffle($token);
            $customer->token = substr($token, 0, 10);

           if($customer->addToken() > 0){

              $to      = $_POST['email']; // Send email to our user
              $subject = 'Reset Password'; // Give the email a subject 
              $msg = '
  
              Thanks for signing up!
              Your account has been created, you can login with the following emails after you have activated your account by pressing the url below.
  
              ------------------------
              Email: '.$_POST["email"].'
              ------------------------
    
              Please click this link to reset your account:
              http://localhost/sdw/sdw_group1/ApplicationLayer/ManageLoginInterface/setNewPassword.php?email='.$_POST['email'].'&token='.$customer->token.'&user_type='.$_POST['user_type'].'
    
              '; // Our message above including the link
                        
              $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
              
              if(mail($to, $subject, $msg, $headers)){
                  $message = "Please check your email inbox.";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
              } // Send our email
              else
              {
                  $message = "Failed while sending email";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location = '../../ApplicationLayer/ManageLoginInterface/forgotPassword.php';</script>";
              }

            }
              else{
              $message = "Error! Please try again.";
              echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/ManageLoginInterface/forgotPassword.php';</script>";
              // send to customerMode
              }
           }
           else{
            $message = "Error! Email does not exist.";
              echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
            }
        

          }
      


      function setPw($email, $token){
        $customerModel = new customerModel();
        $customerModel->email = $email;
        $customerModel->token = $token;
        $customerModel->password = $_POST['password'];

        if($customerModel->set_newPW() > 0){
            $message = 'Your new password is reset. Please change the password after login.';
            echo "<script type = 'text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        }
      }


    
  //   function delete(){
  //       $customer = new customerModel();
  //       $customer->stud_ic = $_POST['studID'];
  //       if($customer->deleteStud()){
  //           $message = "Success Delete!";
		// echo "<script type='text/javascript'>alert('$message');
		// window.location = '../view';</script>";
  //       }
  //   }
}
?>
