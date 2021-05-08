<?php
require_once '../../BusinessServiceLayer/model/petModel.php';

class petgroomController{
    
    function add(){
        $petgroom = new petModel();
        // $petgroom->petgroom_id = $_POST['petgroom_id'];
        $petgroom->name = $_POST['name'];
        $petgroom->details = $_POST['details'];
        $petgroom->quantity = $_POST['quantity'];
        $petgroom->price = $_POST['price'];
        $petgroom->image = $_POST['image'];
        if($petgroom->addpetgroom() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/petgroom.php';</script>";
        }
    }
    
    function viewAll(){
        $petgroom = new petModel();
        return $petgroom->viewallpetgroom();
    }
    
    function viewpetgroom($petgroom_id){
        $petgroom = new petModel();
        $petgroom->petgroom_id = $petgroom_id;
        return $petgroom->viewpetgroom();
    }
    
    function editpetgroom(){
        $petgroom = new petModel();
        $petgroom->petgroom_id = $_POST['petgroom_id'];
        $petgroom->name = $_POST['name'];
        $petgroom->details = $_POST['details'];
        $petgroom->quantity = $_POST['quantity'];
        $petgroom->price = $_POST['price'];
        $petgroom->image = $_POST['image'];
        if($petgroom->modifypetgroom()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/viewpetgroom.php'?petgroom_id=".$_POST['petgroom_id']."';</script>";
        }
    }
    
    function delete(){
        $petgroom = new petModel();
        $petgroom->petgroom_id = $_POST['petgroom_id'];
        if($petgroom->deletepetgroom()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/petgroom.php';</script>";
        }
    }
}
class pethotelController{
    
    function add(){
        $pethotel = new pethotelModel();
        // $pethotel->pethotel_id = $_POST['pethotel_id'];
        $pethotel->name = $_POST['name'];
        $pethotel->details = $_POST['details'];
        $pethotel->quantity = $_POST['quantity'];
        $pethotel->price = $_POST['price'];
        $pethotel->image = $_POST['image'];
        if($pethotel->addpethotel() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/pethotel.php';</script>";
        }
    }
    
    function viewAll(){
        $pethotel = new pethotelModel();
        return $pethotel->viewallpethotel();
    }
    
    function viewpethotel($pethotel_id){
        $pethotel = new pethotelModel();
        $pethotel->pethotel_id = $pethotel_id;
        return $pethotel->viewpethotel();
    }
    
    function editpethotel(){
        $pethotel = new pethotelModel();
        $pethotel->pethotel_id = $_POST['pethotel_id'];
        $pethotel->name = $_POST['name'];
        $pethotel->details = $_POST['details'];
        $pethotel->quantity = $_POST['quantity'];
        $pethotel->price = $_POST['price'];
        $pethotel->image = $_POST['image'];
        if($pethotel->modifypethotel()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/pethotel.php'?pethotel_id=".$_POST['pethotel_id']."';</script>";
        }
    }
    
    function delete(){
        $pethotel = new pethotelModel();
        $pethotel->pethotel_id = $_POST['pethotel_id'];
        if($pethotel->deletepethotel()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/pethotel.php';</script>";
        }
    }
}
class petvetController{
    
    function add(){
        $petvet = new petvetModel();
        // $petvet->petvet_id = $_POST['petvet_id'];
        $petvet->name = $_POST['name'];
        $petvet->details = $_POST['details'];
        $petvet->quantity = $_POST['quantity'];
        $petvet->price = $_POST['price'];
        $petvet->image = $_POST['image'];
        if($petvet->addpetvet() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/petvet.php';</script>";
        }
    }
    
    function viewAll(){
        $petvet = new petvetModel();
        return $petvet->viewallpetvet();
    }
    
    function viewpetvet($petvet_id){
        $petvet = new petvetModel();
        $petvet->petvet_id = $petvet_id;
        return $petvet->viewpetvet();
    }
    
    function editpetvet(){
        $petvet = new petvetModel();
        $petvet->petvet_id = $_POST['petvet_id'];
        $petvet->name = $_POST['name'];
        $petvet->details = $_POST['details'];
        $petvet->quantity = $_POST['quantity'];
        $petvet->price = $_POST['price'];
        $petvet->image = $_POST['image'];
        if($petvet->modifypetvet()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/petvet.php'?petvet_id=".$_POST['petvet_id']."';</script>";
        }
    }
    
    function delete(){
        $petvet = new petvetModel();
        $petvet->petvet_id = $_POST['petvet_id'];
        if($petvet->deletepetvet()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePetAssistInterface/petvet.php';</script>";
        }
    }
}
?>
