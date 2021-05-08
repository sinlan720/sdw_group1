<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class trackingModel{
    //To store and retrieve tracking information.
    public $tracking_ID, $cust_id, $runner_status, $shipping_status, $shipping_address;
    
    function addTrack(){
        //To get all new tracking information from trackingController class and save in tracking table.
        $sql = "insert into tracking(cust_id, runner_status, shipping_status, shipping_address) values(:cust_id, :runner_status, :shipping_status, :shipping_address)";
        $args = [':cust_id'=>$this->cust_id, ':runner_status'=>$this->runner_status, ':shipping_status'=>$this->shipping_status, ':shipping_address'=>$this->shipping_address];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    function addStatus(){
        //To get all new tracking information from trackingController class and save in tracking table.
        $sql = "insert into status(tracking_ID) values(:cust_id, :runner_status, :shipping_status, :shipping_address)";
        $args = [':cust_id'=>$this->cust_id, ':runner_status'=>$this->runner_status, ':shipping_status'=>$this->shipping_status, ':shipping_address'=>$this->shipping_address];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewUnacceptedTask()
    {
        $sql = "select * from tracking join customer on tracking.cust_id = customer.cust_id where runner_status='Unaccepted'";
        return DB::run($sql);
    }

    function viewAcceptedTask()
    {
        $sql = "select * from tracking join customer on tracking.cust_id = customer.cust_id where runner_status='Accepted' and runner_id = :runner_id and shipping_status not like 'Completed'";
        $args = [':runner_id' => $this->runner_id];
        return DB::run($sql, $args);
    }

    function acceptTask()
    {
        $sql = "update tracking set runner_status = :runner_status, runner_id = :runner_id where tracking_ID = :tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID, ':runner_status' => 'Accepted', ':runner_id' => $this->runner_id];
        return DB::run($sql, $args);
    }

    function rejectTask()
    {
        $sql = "update tracking set runner_status = :runner_status, runner_id = :runner_id where tracking_ID = :tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID, ':runner_status' => 'Unaccepted', ':runner_id' => $this->runner_id];
        return DB::run($sql, $args);
    }

    function viewStatus()
    {
        $sql = "select * from status where tracking_ID = :tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID];
        return DB::run($sql, $args);
    }

    function updateProgress()
    {
        $sql = "insert into status(tracking_ID, tracking_date, tracking_time, tracking_progress) values(:tracking_ID, :tracking_date, :tracking_time, :tracking_progress)";
        $args = [':tracking_ID' => $this->tracking_ID, ':tracking_date' => $this->tracking_date, ':tracking_time' => $this->tracking_time, ':tracking_progress' => $this->tracking_progress,];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function updateProgress2()
    {
        $sql = "update status set tracking_date=:tracking_date, tracking_time=:tracking_time, tracking_progress=:tracking_progress where tracking_ID=:tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID, ':tracking_date' => $this->tracking_date, ':tracking_time' => $this->tracking_time, ':tracking_progress' => $this->tracking_progress,];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    function viewProgress()
    {
        $sql = "select * from status where tracking_ID = :tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID];
        return DB::run($sql, $args);
    }

    function viewTrackingList()
    {
        $sql = "select * from tracking where cust_id=:cust_id and runner_status like 'Accepted'";
        $args = [':cust_id' => $this->cust_id];
        return DB::run($sql, $args);
    }

    function viewCustomerInfo()
    {
        $sql = "select * from customer join tracking on customer.cust_id = tracking_ID.cust_id where customer.cust_id=:tracking.cust_id";
        $args = [':cust_id' => $this->cust_id];
        return DB::run($sql, $args);
    }

    function updateDeliveryStatus()
    {
        $sql = "update tracking set shipping_status = 'Delivered' where tracking_ID = :tracking_ID";
        $args = [':tracking_ID' => $this->tracking_ID];
        return DB::run($sql, $args);
    }


}
?>
