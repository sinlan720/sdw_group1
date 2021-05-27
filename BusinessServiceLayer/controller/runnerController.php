<?php
require_once '../../BusinessServiceLayer/model/runnerModel.php';

class runnerController{
      //The controller that is responsible to handle the login, update profile and registration inputs of the runner.
    
    function add(){
         // register as new runner 
        $runner = new runnerModel();
         // set the attributes of runner
        $runner->name = $_POST['name'];
        $runner->email = $_POST['email'];
        $runner->phone = $_POST['phone'];
        $runner->address = $_POST['address'];
        $runner->address2 = $_POST['address2'];
        $runner->city = $_POST['city'];
        $runner->state = $_POST['state'];
        $runner->zipcode = $_POST['zipcode'];
        $runner->username = $_POST['username'];
        $runner->password = $_POST['password'];
        $runner->usergroup = $_POST['usergroup'];
        if($runner->addRunner() > 0){
            $message = "Runner Successfully Registered!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
         // send to runnerModel
        }
    }
    
    function viewAll(){
         // view all runner
        $runner = new runnerModel();
        return $runner->viewallRunner();

    }
    
    function viewRunner($runner_id){
          // get data associate with $id
        $runner = new runnerModel();
        $runner->runner_id = $runner_id;
        return $runner->viewRunner();
        //retrieve data from runnerModel
    }
        
    function editRunner(){
         // modify runner data
        $runner = new runnerModel();
        // get data associate with $id
        $runner->runner_id = $_POST['runner_id'];
        $runner->name = $_POST['name'];
        $runner->email = $_POST['email'];
        $runner->phone = $_POST['phone'];
        $runner->address = $_POST['address'];
        $runner->address2 = $_POST['address2'];
        $runner->city = $_POST['city'];
        $runner->state = $_POST['state'];
        $runner->zipcode = $_POST['zipcode'];
        $runner->username = $_POST['username'];
        $runner->password = $_POST['password'];
        if($runner->modifyRunner()){
            $message = "Success Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLoginInterface/profile.php?runner_id=".$_POST['runner_id']."';</script>";
        }
    }
    

    function reset(){
        $runner = new runnerModel();
        $runner->email = $_POST['email'];

        if($runner->check() > 0){
            $token = "0123456789";
            $token = str_shuffle($token);
            $runner->token = substr($token, 0, 10);

           if($runner->addToken() > 0){

              $to      = $_POST['email']; // Send email to our user
              $subject = 'Reset Password'; // Give the email a subject 
              $msg = '
  
              Thanks for signing up!
              Your account has been created, you can login with the following emails after you have activated your account by pressing the url below.
  
              ------------------------
              Email: '.$_POST["email"].'
              ------------------------
    
              Please click this link to reset your account:
              http://localhost/sdw/sdw_group1/ApplicationLayer/ManageLoginInterface/setNewPassword.php?email='.$_POST['email'].'&token='.$runner->token.'&user_type='.$_POST['user_type'].'
    
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
              // send to runnerMode
              }
           }
           else{
            $message = "Error! Email does not exist.";
              echo "<script type='text/javascript'>alert('$message');
              window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
            }
        

          }
      


      function setPw($email, $token){
        $runnerModel = new runnerModel();
        $runnerModel->email = $email;
        $runnerModel->token = $token;
        $runnerModel->password = $_POST['password'];

        if($runnerModel->set_newPW() > 0){
            $message = 'Your new password is reset. Please change the password after login.';
            echo "<script type = 'text/javascript'>alert('$message');
            window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        }
      }
    
  //   function delete(){
  //       $runner = new runnerModel();
  //       $runner->stud_ic = $_POST['studID'];
  //       if($runner->deleteStud()){
  //           $message = "Success Delete!";
		// echo "<script type='text/javascript'>alert('$message');
		// window.location = '../view';</script>";
  //       }
  //   }
}
?>
