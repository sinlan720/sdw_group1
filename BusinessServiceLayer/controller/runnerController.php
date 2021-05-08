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
