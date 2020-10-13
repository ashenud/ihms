<?php 
session_start();
include('../php/basic/connection.php');
if(!isset($_SESSION['doctor_id'])) {	
	header('location:/?noPermission=1');
}
?>

<?php

    extract($_POST);
    $query1="DELETE FROM doctor_reminder WHERE id='$reminder_id'";
    $result1=mysqli_query($conn,$query1);

    if($result1){

        $jsonData='{
            "status":"success",
            "data":{   
                "alert": "සිහිකැඳවිම මැකීම සාර්ථකයි"
            }
        }';
    
    
        echo($jsonData);
    
    }
    
    else{
    
        $jsonData='{
            "status":"fail",
            "data":{   
                "alert": "සිහිකැඳවිම මැකීම අසාර්ථකයි"
            }
        }';
    
        echo($jsonData);
    }

    

    //print_r($vac_value);
    //echo $vac_id;

?>