<?php 
session_start();
include('../php/basic/connection.php');
if(!isset($_SESSION['sister_id'])) {	
	header('location:/?noPermission=1');
}
?>

<?php

    //extract($_POST);
    //$faculty=$_POST['faculty'];

    $month_lable = array();
    $vac_value = array();

    for ($i = 0; $i <= 5; $i++) {

        //for ($i = $length; $i >= 0; $i--) {
        //    $timeline_date = $timeline_date.'"'.substr($json_array2['data']['timeline'][$i]['date'],-5).'",' ;
        // $new_confirmed = $new_confirmed.$json_array2['data']['timeline'][$i]['new_confirmed'].',' ;
        //} 

        //$new_confirmed = trim($new_confirmed,",");
        //$timeline_date = trim($timeline_date,",");

        $month = date("m", strtotime( date( 'Y-m' )." -$i months"));
        $year = date("Y", strtotime( date( 'Y-m' )." -$i months"));

        //to change month to sinhala
        if($month==1) {
            $month_si="ජනවාරි";
        }
        else if($month==2) {
            $month_si="පෙබරවාරි";
        }
        else if($month==3) {
            $month_si="මාර්තු";
        }
        else if($month==4) {
            $month_si="අප්‍රේල්";
        }
        else if($month==5) {
            $month_si="මැයි";
        }
        else if($month==6) {
            $month_si="ජූනි";
        }
        else if($month==7) {
            $month_si="ජූලි";
        }
        else if($month==8) {
            $month_si="අගෝස්තු";
        }
        else if($month==9) {
            $month_si="සැප්තැම්බර්";
        }
        else if($month==10) {
            $month_si="ඔක්තෝබර්";
        }
        else if($month==11) {
            $month_si="නොවැම්බර්";
        }
        else {
            $month_si="දෙසැම්බර්";
        }


        if (isset($_POST['vac-select'])) {
        
            $vac_id=$_POST['vac-select'];
            
            if($vac_id==1) {
                $vac_group='vac_birth';
                $vac_name='B.C.G.';
            }
            
            if($vac_id==2) {
                $vac_group='vac_birth';
                $vac_name='B.C.G. 2nd dose';
            }
            
            if($vac_id==3) {
                $vac_group='vac_2months';
                $vac_name='Pentavalent 1';
            }
            
            if($vac_id==4) {
                $vac_group='vac_2months';
                $vac_name='OPV 1';
            }
            
            if($vac_id==5) {
                $vac_group='vac_2months';
                $vac_name='fIPV 1';
            }
            
            if($vac_id==6) {
                $vac_group='vac_4months';
                $vac_name='Pentavalent 2';
            }
            
            if($vac_id==7) {
                $vac_group='vac_4months';
                $vac_name='OPV 2';
            }
            
            if($vac_id==8) {
                $vac_group='vac_4months';
                $vac_name='fIPV 2';
            }
            
            if($vac_id==9) {
                $vac_group='vac_6months';
                $vac_name='Pentavalent 3';
            }
            
            if($vac_id==10) {
                $vac_group='vac_6months';
                $vac_name='OPV 3';
            }
            
            if($vac_id==11) {
                $vac_group='vac_9months';
                $vac_name='MMR 1';
            }
            
            if($vac_id==12) {
                $vac_group='vac_12months';
                $vac_name='Live JE';
            }
            
            if($vac_id==13) {
                $vac_group='vac_18months';
                $vac_name='DPT';
            }
            
            if($vac_id==14) {
                $vac_group='vac_18months';
                $vac_name='OPV 4';
            }
            
            if($vac_id==15) {
                $vac_group='vac_3years';
                $vac_name='MMR 2';
            }
            
            if($vac_id==16) {
                $vac_group='vac_5years';
                $vac_name='D.T';
            }
            
            if($vac_id==17) {
                $vac_group='vac_5years';
                $vac_name='OPV 5';
            }
            
            if($vac_id==18) {
                $vac_group='vac_10years';
                $vac_name='HPV Vaccine 1';
            }
            
            if($vac_id==19) {
                $vac_group='vac_10years';
                $vac_name='HPV Vaccine 2';
            }
            
            if($vac_id==20) {
                $vac_group='vac_11years';
                $vac_name='aTd';
            }
            
            $query01="SELECT * FROM $vac_group
                    WHERE vac_id=$vac_id AND MONTH(date_given)=$month AND YEAR(date_given)=$year";
            $result01=mysqli_query($conn,$query01);
            
            $count = mysqli_num_rows($result01);
            array_push($vac_value,$count);
            
            array_push($month_lable,$month_si);
            //$month_lable = trim($month_lable,",");
            //$vac_value = trim($vac_value,",");
            
        }

    }

    $jsonData='  {
        "status":"success",
        "data":{   
            "months": ["'.$month_lable[0].'","'.$month_lable[1].'","'.$month_lable[2].'","'.$month_lable[3].'","'.$month_lable[4].'","'.$month_lable[5].'"],
            "count": ['.$vac_value[0].','.$vac_value[1].','.$vac_value[2].','.$vac_value[3].','.$vac_value[4].','.$vac_value[5].'],
            "type": ["'.$vac_name.' එන්නත් ප්‍රමාණය"]
        }
    }';

    echo($jsonData);

    //print_r($vac_value);
    //echo $vac_id;

?>