<?php
require_once '../../BusinessServiceLayer/model/providerModel.php';

class providerController{
   //This class is responsible to control the login, update password and registration inputs of service provider between boundary and entity class.
    
    function add(){
      // register as new provider
        $provider = new providerModel();
        $provider->name = $_POST['name'];
        $provider->email = $_POST['email'];
        $provider->phone = $_POST['phone'];
        $provider->address = $_POST['address'];
        $provider->address2 = $_POST['address2'];
        $provider->city = $_POST['city'];
        $provider->state = $_POST['state'];
        $provider->zipcode = $_POST['zipcode'];
        $provider->username = $_POST['username'];
        $provider->password = $_POST['password'];
        $provider->usergroup = $_POST['usergroup'];
        if($provider->addProvider() > 0){
            // set the attributes of provider
             $message = "Provider Successfully Registered!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        }
    }
    
    function viewAll(){
       // view all provider
        $provider = new providerModel();
        return $provider->viewallProvider();
    }
    
     function viewProvider($provider_id){
       // get data associate with $id
        $provider = new providerModel();
        $provider->provider_id = $provider_id;
        return $provider->viewProvider();
    }
        
    function editProvider(){
          // modify provider data
        $provider = new providerModel();
        $provider->provider_id = $_POST['provider_id'];
        $provider->name = $_POST['name'];
        $provider->email = $_POST['email'];
        $provider->phone = $_POST['phone'];
        $provider->address = $_POST['address'];
        $provider->address2 = $_POST['address2'];
        $provider->city = $_POST['city'];
        $provider->state = $_POST['state'];
        $provider->zipcode = $_POST['zipcode'];
        $provider->username = $_POST['username'];
        $provider->password = $_POST['password'];
        if($provider->modifyProvider()){
            //update provider data to providerModel
            $message = "Success Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLoginInterface/profile.php?provider_id=".$_POST['provider_id']."';</script>";
        }
    }
    

    function reset(){
        $provider = new providerModel();
        $provider->email = $_POST['email'];

        if($provider->check() > 0){
            $token = "0123456789";
            $token = str_shuffle($token);
            $provider->token = substr($token, 0, 10);

           if($provider->addToken() > 0){

              $to      = $_POST['email']; // Send email to our user
              $subject = 'Reset Password'; // Give the email a subject 
              $msg = '
  
              Thanks for signing up!
              Your account has been created, you can login with the following emails after you have activated your account by pressing the url below.
  
              ------------------------
              Email: '.$_POST["email"].'
              ------------------------
    
              Please click this link to reset your account:
              http://localhost/sdw/sdw_group1/ApplicationLayer/ManageLoginInterface/setNewPassword.php?email='.$_POST['email'].'&token='.$provider->token.'&user_type='.$_POST['user_type'].'
    
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
              // send to providerMode
              }
           }
           else{
            $message = "Error! Email does not exist.";
              echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
            }
        

          }
      


      function setPw($email, $token){
        $providerModel = new providerModel();
        $providerModel->email = $email;
        $providerModel->token = $token;
        $providerModel->password = $_POST['password'];

        if($providerModel->set_newPW() > 0){
            $message = 'Your new password is reset. Please change the password after login.';
            echo "<script type = 'text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        }
      }
    
  //   function delete(){
  //       $provider = new providerModel();
  //       $provider->stud_ic = $_POST['studID'];
  //       if($provider->deleteStud()){
  //           $message = "Success Delete!";
		// echo "<script type='text/javascript'>alert('$message');
		// window.location = '../view';</script>";
  //       }
  //   }
}
?>
