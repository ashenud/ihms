<?php 
session_start();
include('../php/basic/connection.php');
if(!isset($_SESSION['doctor_id'])) {	
	header('location:/?noPermission=1');
}
?>

<?php

    $mid= $_SESSION["doctor_id"];
    extract($_POST);
    $sql="INSERT INTO doctor_reminder(doctor_id,doctor_reminder,date_time) VALUES('$mid','$reminder','$dateTime')";

    if(mysqli_query($conn,$sql)){

        $jsonData='{
            "status":"success",
            "data":{   
                "alert": "සිහිකැඳවිම එක්කිරීම සාර්ථකයි"
            }
        }';
    
    
        echo($jsonData);
    
    }
    
    else{
    
        $jsonData='{
            "status":"fail",
            "data":{   
                "alert": "සිහිකැඳවිම එක්කිරීම අසාර්ථකයි"
            }
        }';
    
        echo($jsonData);
    }

    

    //print_r($vac_value);
    //echo $vac_id;

?>