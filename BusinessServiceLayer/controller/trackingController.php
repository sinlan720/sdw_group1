<?php
require_once '../../BusinessServiceLayer/model/trackingModel.php';

class trackingController{
    // The controller that is responsible to handle the login, update profile and registration inputs of the tracking.
    
   function add(){
    // create new oject 
        $tracking = new trackingModel();
         // set the attributes of tracking
        $tracking->cust_id = $_SESSION['userid'];
        $tracking->runner_status = "Unaccepted";
        $tracking->shipping_status = "On Delivery";
        $tracking->shipping_address = $_POST['customerFullAddress'];
        if($tracking->addTrack() > 0){
            $message = "fucking finally";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // send to trackingModel
        }
    }


    function viewUnacceptedTask()
    {
        $tracking = new trackingModel();
        return $tracking->viewUnacceptedTask();
    }

    function viewAcceptedTask()
    {
        $tracking = new trackingModel();
        $tracking->runner_id = $_SESSION['userid'];
        return $tracking->viewAcceptedTask();
    }

  function acceptTask()
    {
        $tracking = new trackingModel();
        $tracking->runner_id = $_SESSION['userid'];
        $tracking->tracking_ID = $_POST['tracking_ID'];
        if ($tracking->acceptTask()) {
            $message = "You are accept the task!";
            echo "<script type='text/javascript'>alert('$message');
        window.location = 'orderlist.php?runner_id=".$_SESSION['userid']."';</script>";
        }
    }

    function rejectTask()
    {
        $tracking = new trackingModel();
        $tracking->runner_id = NULL;
        $tracking->tracking_ID = $_POST['tracking_ID'];
        if ($tracking->rejectTask()) {
            $message = "You are reject the task!";
            echo "<script type='text/javascript'>alert('$message');
        window.location = 'orderlist.php?runner_id=".$_SESSION['userid']."';</script>";
        }
    }

    function custDetails($tracking_ID){
        $tracking = new trackingModel();
        $tracking->tracking_ID = $tracking_ID;
        return $tracking->custDetails();
    }

    function viewStatus($tracking_ID)
    {
        $tracking = new trackingModel();
        $tracking->tracking_ID = $tracking_ID;
        return $tracking->viewStatus();
    }

    function updateProgress($tracking_ID)
    {
        $status = new trackingModel();
        $status->tracking_ID = $_POST['tracking_ID'];
        // $status->status_ID = $_POST['status_ID'];
        $status->tracking_date = $_POST['tracking_date'];
        $status->tracking_time = $_POST['tracking_time'];
        $status->tracking_progress = $_POST['tracking_progress'];
        if ($status->updateProgress()) {
            $message = "Progress Update!";
            echo "<script type='text/javascript'>alert('$message');
        window.location = 'updateorderlist.php?tracking_ID=".$_POST['tracking_ID']."';</script>";
        }
    }

    function viewProgress($tracking_ID)
    {
        $status = new trackingModel();
        $status->tracking_ID = $tracking_ID;
        return $status->viewProgress();
    }

    function viewProgress2($tracking_ID)
    {
        $status = new trackingModel();
        $status->tracking_ID = $tracking_ID;
        return $status->viewProgress2();
    }

    function viewTrackingList()
    {
        $tracking = new trackingModel();
        $tracking->cust_id = $_SESSION['userid'];
        return $tracking->viewTrackingList();
    }

    function viewCustomerInfo()
    {
        $tracking = new trackingModel();
        $tracking->cust_id = $_SESSION['userid'];
        return $tracking->viewCustomerInfo();
    }

    function updateDeliveryStatus()
    {
        $tracking = new trackingModel();
        $tracking->tracking_ID = $_GET['tracking_ID'];
        $tracking->updateDeliveryStatus();
        echo "<script type='text/javascript'>alert('Thanks for using ECRS System');
        window.location = 'cust_track.php?cust_id=".$_SESSION['userid']."';</script>";
    }


    
  
}
?>
