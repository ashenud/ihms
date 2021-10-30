<?php 
session_start();
include('../php/basic/connection.php');
if(!isset($_SESSION['midwife_id'])) {	
	header('location:/?noPermission=1');
}
?>

					
				<?php


                $weight_count=array();

                for ($i = 0; $i <= 5; $i++) {
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
                        
                                      
                    $query1 = "SELECT * FROM growth WHERE MONTH(date)=$month AND YEAR(date)=$year";
                    $result1= mysqli_query($conn,$query1);
                    $row=mysqli_fetch_assoc($result1);
                    
                
                    //male weight category
                    $a=0;
                    $b=0;
                    $c=0;
                    $d=0;
                    $e=0;
                    //female weight category
                    $aa=0;
                    $bb=0;
                    $cc=0;
                    $dd=0;
                    $ee=0;
                    //male height categpry
                    $ha=0;
                    $hb=0;
                    $hc=0;
                    //female weight category
                    $haa=0;
                    $hbb=0;
                    $hcc=0;
                    
                    
      


                    while ($row = mysqli_fetch_assoc($result1)) {
                        
                        $baby_id = $row["baby_id"];

                        $query2 = "SELECT * FROM baby_register WHERE baby_id='{$baby_id}'";
                        $result2= mysqli_query($conn,$query2);
                        $row2=mysqli_fetch_assoc($result2); 
                        $gender = $row2["baby_gender"];
                        
                      
                        
                        $firstname= $row2["baby_first_name"];
                        $lastname=$row2["baby_last_name"];
                        $age = $row["baby_age_in_months"];
                        
                   
                        
                        $weight = $row["weight"];
                        $height = $row["height"];
                        


                        //Weight

                        //0-month
                        if($row["baby_age_in_months"]==0) 
                        {

                            //male category
                            if($gender=='M') {

                                if($weight<=2.1)
                                {
                                    $a++;

                                }
                                else if($weight<=2.5)
                                {
                                    $b++;
                                }
                                else if($weight<=2.9) 
                                {
                                    $c++;
                                }
                                else if($weight<=4.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }  
                            }

                            //female category
                            else {
                                if($weight<=2.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=2.5)
                                {
                                    $bb++;
                                }
                                else if($weight<=2.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=4.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }

                            }
                        }
                            //1-month
                        else if($row["baby_age_in_months"]==1)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=2.9)
                                {
                                    $a++;

                                }
                                else if($weight<=3.4)
                                {
                                    $b++;
                                }
                                else if($weight<=3.9) 
                                {
                                    $c++;
                                }
                                else if($weight<=5.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }

                            }
                            //female
                            else
                            {
                                if($weight<=2.9)
                                {
                                        echo 'උග්‍ර අඩු බර';
                                        $aa++;

                                }
                                else if($weight<=3.4)
                                {
                                        echo 'අඩු බර';
                                        $bb++;
                                }
                                else if($weight<=3.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=5.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }


                            }
                        }

                        //2-month
                        else if($row["baby_age_in_months"]==2)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=3.7)
                            {
                                    $a++;

                            }
                            else if($weight<=4.2)
                            {
                                    $b++;
                            }
                            else if($weight<=4.9) 
                            {
                                echo 'මද බර අඩු';
                                $c++;
                            }
                            else if($weight<=7.0) 
                            {
                                echo 'නියමිත බර';
                                $d++;
                            }
                            else
                            {
                                echo 'අධිබර';
                                $e++;
                            }

                            }
                            //female
                            else
                            {
                                if($weight<=3.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=4.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=4.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=7.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }


                            }
                        }

                        //3-month
                        else if($row["baby_age_in_months"]==3)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=3.7)
                                {
                                    $a++;

                                }
                                else if($weight<=4.2)
                                {
                                    $b++;
                                }
                                else if($weight<=4.9) 
                                {
                                    $c++;
                                }
                                else if($weight<=7.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }

                            }
                            //female
                            else
                            {
                                if($weight<=3.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=4.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=4.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=7.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //4-month
                        else if($row["baby_age_in_months"]==4)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=4.4)
                                {
                                    $a++;

                                }
                                else if($weight<=5.0)
                                {
                                    $b++;
                                }
                                else if($weight<=5.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=9.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=4.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=5.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=5.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=9.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //5-month
                        else if($row["baby_age_in_months"]==5)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=5.3)
                                {
                                    $a++;

                                }
                                else if($weight<=6.0)
                                {
                                    $b++;
                                }
                                else if($weight<=6.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=9.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=5.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=6.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=6.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=9.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //6-month######
                        else if($row["baby_age_in_months"]==6)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=5.7)
                                {
                                    $a++;

                                }
                                else if($weight<=6.7)
                                {
                                    $b++;
                                }
                                else if($weight<=7.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=9.8) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=5.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=6.7)
                                {
                                    $bb++;
                                }
                                else if($weight<=7.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=9.8) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //7-month######
                        else if($row["baby_age_in_months"]==7)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.0)
                                {
                                    $a++;

                                }
                                else if($weight<=6.9)
                                {
                                    $b++;
                                }
                                else if($weight<=7.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=10.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=6.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=7.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=10.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //8-month######
                        else if($row["baby_age_in_months"]==8)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.2)
                                {
                                    $a++;

                                }
                                else if($weight<=7.1)
                                {
                                    $b++;
                                }
                                else if($weight<=7.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=10.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.2)
                                {
                                    $aa++;

                                }
                                else if($weight<=7.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=7.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=10.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //9-month######
                        else if($row["baby_age_in_months"]==9)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.4)
                                {
                                    $a++;

                                }
                                else if($weight<=7.4)
                                {
                                    $b++;
                                }
                                else if($weight<=8.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=11.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=7.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=8.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=11.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //10-month######
                        else if($row["baby_age_in_months"]==10)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.6)
                                {
                                    $a++;

                                }
                                else if($weight<=7.6)
                                {
                                    $b++;
                                }
                                else if($weight<=8.2) 
                                {
                                    $c++;
                                }
                                else if($weight<=11.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=7.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=8.2) 
                                {
                                    $cc++;
                                }
                                else if($weight<=11.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //11-month######
                        else if($row["baby_age_in_months"]==11)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=6.8)
                                {
                                    $a++;

                                }
                                else if($weight<=7.8)
                                {
                                    $b++;
                                }
                                else if($weight<=8.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=11.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=6.8)
                                {
                                    $aa++;

                                }
                                else if($weight<=7.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=8.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=11.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //12-month######
                        else if($row["baby_age_in_months"]==12)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.0)
                                {
                                    $a++;

                                }
                                else if($weight<=7.9)
                                {
                                    $b++;
                                }
                                else if($weight<=8.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=12.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=7.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=8.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=12.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //13-month######
                        else if($row["baby_age_in_months"]==13)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.15)
                                {
                                    $a++;

                                }
                                else if($weight<=8.1)
                                {
                                    $b++;
                                }
                                else if($weight<=8.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=12.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.15)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=8.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=12.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //14-month######
                        else if($row["baby_age_in_months"]==14)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.3)
                                {
                                    $a++;

                                }
                                else if($weight<=8.3)
                                {
                                    $b++;
                                }
                                else if($weight<=9.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=12.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.3)
                                {
                                    $bb++;
                                }
                                else if($weight<=9.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=12.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //15-month######
                        else if($row["baby_age_in_months"]==15)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.45)
                                {
                                    $a++;

                                }
                                else if($weight<=8.4)
                                {
                                    $b++;
                                }
                                else if($weight<=9.2) 
                                {
                                    $c++;
                                }
                                else if($weight<=12.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.45)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=9.2) 
                                {
                                    $cc++;
                                }
                                else if($weight<=12.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //16-month######
                        else if($row["baby_age_in_months"]==16)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.6)
                                {
                                    $a++;

                                }
                                else if($weight<=8.6)
                                {
                                    $b++;
                                }
                                else if($weight<=9.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=13.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=9.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=13.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //17-month######
                        else if($row["baby_age_in_months"]==17)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.7)
                                {
                                    $a++;

                                }
                                else if($weight<=8.8)
                                {
                                    $b++;
                                }
                                else if($weight<=9.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=13.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=9.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=13.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //18-month######
                        else if($row["baby_age_in_months"]==18)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=7.85)
                                {
                                    $a++;

                                }
                                else if($weight<=8.9)
                                {
                                    $b++;
                                }
                                else if($weight<=9.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=13.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=7.85)
                                {
                                    $aa++;

                                }
                                else if($weight<=8.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=9.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=13.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //19-month######
                        else if($row["baby_age_in_months"]==19)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.0)
                                {
                                    $a++;

                                }
                                else if($weight<=9.1)
                                {
                                    $b++;
                                }
                                else if($weight<=10.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=13.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=13.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //20-month######
                        else if($row["baby_age_in_months"]==20)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.1)
                                {
                                    $a++;

                                }
                                else if($weight<=9.2)
                                {
                                    $b++;
                                }
                                else if($weight<=10.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=14.2) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=14.2) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //21-month######
                        else if($row["baby_age_in_months"]==21)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.25)
                                {
                                    $a++;

                                }
                                else if($weight<=9.4)
                                {
                                    $b++;
                                }
                                else if($weight<=10.3) 
                                {
                                    $c++;
                                }
                                else if($weight<=14.5) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.25)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.3) 
                                {
                                    $cc++;
                                }
                                else if($weight<=14.5) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //22-month######
                        else if($row["baby_age_in_months"]==22)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.4)
                                {
                                    $a++;

                                }
                                else if($weight<=9.5)
                                {
                                    $b++;
                                }
                                else if($weight<=10.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=14.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.5)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=14.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //23-month######
                        else if($row["baby_age_in_months"]==23)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.5)
                                {
                                    $a++;

                                }
                                else if($weight<=9.6)
                                {
                                    $b++;
                                }
                                else if($weight<=10.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=15.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.5)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=15.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //24-month######
                        else if($row["baby_age_in_months"]==24)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.6)
                                {
                                    $a++;

                                }
                                else if($weight<=9.8)
                                {
                                    $b++;
                                }
                                else if($weight<=10.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=15.2) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=9.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=10.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=15.2) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //25-month######
                        else if($row["baby_age_in_months"]==25)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.8)
                                {
                                    $a++;

                                }
                                else if($weight<=10.0)
                                {
                                    $b++;
                                }
                                else if($weight<=11.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=15.5) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.8)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=15.5) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //26-month######
                        else if($row["baby_age_in_months"]==26)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=8.9)
                                {
                                    $a++;

                                }
                                else if($weight<=10.1)
                                {
                                    $b++;
                                }
                                else if($weight<=11.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=15.8) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=8.9)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=15.8) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //27-month######
                        else if($row["baby_age_in_months"]==27)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.0)
                                {
                                    $a++;

                                }
                                else if($weight<=10.2)
                                {
                                    $b++;
                                }
                                else if($weight<=11.3) 
                                {
                                    $c++;
                                }
                                else if($weight<=16.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.3) 
                                {
                                    $cc++;
                                }
                                else if($weight<=16.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //28-month######
                        else if($row["baby_age_in_months"]==28)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.1)
                                {
                                    $a++;

                                }
                                else if($weight<=10.4)
                                {
                                    $b++;
                                }
                                else if($weight<=11.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=16.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=16.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //29-month######
                        else if($row["baby_age_in_months"]==29)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.3)
                                {
                                    $a++;

                                }
                                else if($weight<=10.5)
                                {
                                    $b++;
                                }
                                else if($weight<=11.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=16.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.5)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=16.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //30-month######
                        else if($row["baby_age_in_months"]==30)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.4)
                                {
                                    $a++;

                                }
                                else if($weight<=10.6)
                                {
                                    $b++;
                                }
                                else if($weight<=11.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=16.8) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=11.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=16.8) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //31-month######
                        else if($row["baby_age_in_months"]==31)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.5)
                                {
                                    $a++;

                                }
                                else if($weight<=10.8)
                                {
                                    $b++;
                                }
                                else if($weight<=12.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=17.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.5)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=17.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //32-month######
                        else if($row["baby_age_in_months"]==32)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.6)
                                {
                                    $a++;

                                }
                                else if($weight<=10.9)
                                {
                                    $b++;
                                }
                                else if($weight<=12.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=17.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=10.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=17.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //33-month######
                        else if($row["baby_age_in_months"]==33)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.7)
                                {
                                    $a++;

                                }
                                else if($weight<=11.0)
                                {
                                    $b++;
                                }
                                else if($weight<=12.2) 
                                {
                                    $c++;
                                }
                                else if($weight<=17.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.2) 
                                {
                                    $cc++;
                                }
                                else if($weight<=17.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //34-month######
                        else if($row["baby_age_in_months"]==34)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.8)
                                {
                                    $a++;

                                }
                                else if($weight<=11.1)
                                {
                                    $b++;
                                }
                                else if($weight<=12.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=17.8) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.8)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=17.8) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //35-month######
                        else if($row["baby_age_in_months"]==35)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=9.9)
                                {
                                    $a++;

                                }
                                else if($weight<=11.2)
                                {
                                    $b++;
                                }
                                else if($weight<=12.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=18.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=9.9)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=18.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //36-month######
                        else if($row["baby_age_in_months"]==36)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.0)
                                {
                                    $a++;

                                }
                                else if($weight<=11.3)
                                {
                                    $b++;
                                }
                                else if($weight<=12.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=18.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.3)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=18.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //37-month######
                        else if($row["baby_age_in_months"]==37)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.1)
                                {
                                    $a++;

                                }
                                else if($weight<=11.4)
                                {
                                    $b++;
                                }
                                else if($weight<=12.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=18.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=12.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=18.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //38-month######
                        else if($row["baby_age_in_months"]==38)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.2)
                                {
                                    $a++;

                                }
                                else if($weight<=11.5)
                                {
                                    $b++;
                                }
                                else if($weight<=13.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=18.8) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.2)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.5)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=18.8) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //39-month######
                        else if($row["baby_age_in_months"]==39)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.3)
                                {
                                    $a++;

                                }
                                else if($weight<=11.6)
                                {
                                    $b++;
                                }
                                else if($weight<=13.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=19.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=19.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //40-month######
                        else if($row["baby_age_in_months"]==40)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.4)
                                {
                                    $a++;

                                }
                                else if($weight<=11.7)
                                {
                                    $b++;
                                }
                                else if($weight<=13.3) 
                                {
                                    $c++;
                                }
                                else if($weight<=19.3) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.7)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.3) 
                                {
                                    $cc++;
                                }
                                else if($weight<=19.3) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //41-month######
                        else if($row["baby_age_in_months"]==41)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.5)
                                {
                                    $a++;

                                }
                                else if($weight<=11.8)
                                {
                                    $b++;
                                }
                                else if($weight<=13.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=19.5) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.5)
                                {
                                    $aa++;

                                }
                                else if($weight<=11.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=19.5) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //42-month######
                        else if($row["baby_age_in_months"]==42)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.6)
                                {
                                    $a++;

                                }
                                else if($weight<=12.0)
                                {
                                    $b++;
                                }
                                else if($weight<=13.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=19.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=19.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //43-month######
                        else if($row["baby_age_in_months"]==43)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.7)
                                {
                                    $a++;

                                }
                                else if($weight<=12.1)
                                {
                                    $b++;
                                }
                                else if($weight<=13.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=20.0) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=20.0) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //44-month######
                        else if($row["baby_age_in_months"]==44)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.8)
                                {
                                    $a++;

                                }
                                else if($weight<=12.2)
                                {
                                    $b++;
                                }
                                else if($weight<=13.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=20.2) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.8)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=13.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=20.2) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //45-month######
                        else if($row["baby_age_in_months"]==45)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=10.9)
                                {
                                    $a++;

                                }
                                else if($weight<=12.3)
                                {
                                    $b++;
                                }
                                else if($weight<=14.0) 
                                {
                                    $c++;
                                }
                                else if($weight<=20.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=10.9)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.3)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.0) 
                                {
                                    $cc++;
                                }
                                else if($weight<=20.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //46-month######
                        else if($row["baby_age_in_months"]==46)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.0)
                                {
                                    $a++;

                                }
                                else if($weight<=12.4)
                                {
                                    $b++;
                                }
                                else if($weight<=14.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=20.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=20.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //47-month######
                        else if($row["baby_age_in_months"]==47)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.1)
                                {
                                    $a++;

                                }
                                else if($weight<=12.6)
                                {
                                    $b++;
                                }
                                else if($weight<=14.3) 
                                {
                                    $c++;
                                }
                                else if($weight<=20.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.3) 
                                {
                                    $cc++;
                                }
                                else if($weight<=20.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //48-month######
                        else if($row["baby_age_in_months"]==48)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.2)
                                {
                                    $a++;

                                }
                                else if($weight<=12.7)
                                {
                                    $b++;
                                }
                                else if($weight<=14.4) 
                                {
                                    $c++;
                                }
                                else if($weight<=21.2) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.2)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.7)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.4) 
                                {
                                    $cc++;
                                }
                                else if($weight<=21.2) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //49-month######
                        else if($row["baby_age_in_months"]==49)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.3)
                                {
                                    $a++;

                                }
                                else if($weight<=12.8)
                                {
                                    $b++;
                                }
                                else if($weight<=14.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=21.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=21.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //50-month######
                        else if($row["baby_age_in_months"]==50)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.4)
                                {
                                    $a++;

                                }
                                else if($weight<=12.9)
                                {
                                    $b++;
                                }
                                else if($weight<=14.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=21.7) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=12.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=21.7) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //51-month######
                        else if($row["baby_age_in_months"]==51)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.5)
                                {
                                    $a++;

                                }
                                else if($weight<=13.0)
                                {
                                    $b++;
                                }
                                else if($weight<=14.8) 
                                {
                                    $c++;
                                }
                                else if($weight<=21.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.5)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.8) 
                                {
                                    $cc++;
                                }
                                else if($weight<=21.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //52-month######
                        else if($row["baby_age_in_months"]==52)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.6)
                                {
                                    $a++;

                                }
                                else if($weight<=13.1)
                                {
                                    $b++;
                                }
                                else if($weight<=14.9) 
                                {
                                    $c++;
                                }
                                else if($weight<=22.2) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.6)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.1)
                                {
                                    $bb++;
                                }
                                else if($weight<=14.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=22.2) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //53-month######
                        else if($row["baby_age_in_months"]==53)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.7)
                                {
                                    $a++;

                                }
                                else if($weight<=13.2)
                                {
                                    $b++;
                                }
                                else if($weight<=15.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=22.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.7)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.2)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=22.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //54-month######
                        else if($row["baby_age_in_months"]==54)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.8)
                                {
                                    $a++;

                                }
                                else if($weight<=13.3)
                                {
                                    $b++;
                                }
                                else if($weight<=15.2) 
                                {
                                    $c++;
                                }
                                else if($weight<=22.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.8)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.3)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.2) 
                                {
                                    $cc++;
                                }
                                else if($weight<=22.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //55-month######
                        else if($row["baby_age_in_months"]==55)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=11.9)
                                {
                                    $a++;

                                }
                                else if($weight<=13.4)
                                {
                                    $b++;
                                }
                                else if($weight<=15.3) 
                                {
                                    $c++;
                                }
                                else if($weight<=22.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=11.9)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.4)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.3) 
                                {
                                    $cc++;
                                }
                                else if($weight<=22.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //56-month######
                        else if($row["baby_age_in_months"]==56)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.0)
                                {
                                    $a++;

                                }
                                else if($weight<=13.6)
                                {
                                    $b++;
                                }
                                else if($weight<=15.5) 
                                {
                                    $c++;
                                }
                                else if($weight<=23.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.0)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.6)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.5) 
                                {
                                    $cc++;
                                }
                                else if($weight<=23.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //57-month######
                        else if($row["baby_age_in_months"]==57)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.1)
                                {
                                    $a++;

                                }
                                else if($weight<=13.7)
                                {
                                    $b++;
                                }
                                else if($weight<=15.6) 
                                {
                                    $c++;
                                }
                                else if($weight<=23.4) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.1)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.7)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.6) 
                                {
                                    $cc++;
                                }
                                else if($weight<=23.4) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //58-month######
                        else if($row["baby_age_in_months"]==58)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.2)
                                {
                                    $a++;

                                }
                                else if($weight<=13.8)
                                {
                                    $b++;
                                }
                                else if($weight<=15.7) 
                                {
                                    $c++;
                                }
                                else if($weight<=23.6) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.2)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.8)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.7) 
                                {
                                    $cc++;
                                }
                                else if($weight<=23.6) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //59-month######
                        else if($row["baby_age_in_months"]==59)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.3)
                                {
                                    $a++;

                                }
                                else if($weight<=13.9)
                                {
                                    $b++;
                                }
                                else if($weight<=15.9) 
                                {
                                    $c++;
                                }
                                else if($weight<=23.9) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.3)
                                {
                                    $aa++;

                                }
                                else if($weight<=13.9)
                                {
                                    $bb++;
                                }
                                else if($weight<=15.9) 
                                {
                                    $cc++;
                                }
                                else if($weight<=23.9) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }
                        //60-month######
                        else if($row["baby_age_in_months"]==60)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($weight<=12.4)
                                {
                                    $a++;

                                }
                                else if($weight<=14.0)
                                {
                                    $b++;
                                }
                                else if($weight<=16.1) 
                                {
                                    $c++;
                                }
                                else if($weight<=24.1) 
                                {
                                    $d++;
                                }
                                else
                                {
                                    $e++;
                                }
                            }
                            //female
                            else
                            {
                                if($weight<=12.4)
                                {
                                    $aa++;

                                }
                                else if($weight<=14.0)
                                {
                                    $bb++;
                                }
                                else if($weight<=16.1) 
                                {
                                    $cc++;
                                }
                                else if($weight<=24.1) 
                                {
                                    $dd++;
                                }
                                else
                                {
                                    $ee++;
                                }
                            }
                        }

                        else
                        {
                            echo 'error';

                        }
                            

                        //height

                        //0-month
                        if($row["baby_age_in_months"]==0) 
                        {
                            //male category
                            if($gender=='M')
                            {

                                if($height<=46)
                                {
                                    $ha++;										
                                }
                                else if($height<=48.5)
                                {
                                    $hb++;
                                }
                                else
                                {
                                    $hc++;
                                }  
                            }

                            //female category
                            else
                                {
                                if($height<=46)
                                {
                                    $haa++;

                                }
                                else if($height<=48.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }

                            }
                        }

                        //1 month
                        else if($row["baby_age_in_months"]==1)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=50.5)
                                {
                                    $ha++;

                                }
                                else if($height<=53.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=50.5)
                                {
                                    $haa++;

                                }
                                else if($height<=53.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }

                        //2 month############
                        else if($row["baby_age_in_months"]==2)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=54.0)
                                {
                                    $ha++;

                                }
                                else if($height<=56.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=54.0)
                                {
                                    $haa++;

                                }
                                else if($height<=56.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //3 month############
                        else if($row["baby_age_in_months"]==3)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=57.0)
                                {
                                    $ha++;

                                }
                                else if($height<=59.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=57.0)
                                {
                                    $haa++;

                                }
                                else if($height<=59.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //4 month############
                        else if($row["baby_age_in_months"]==4)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=59.5)
                                {
                                    $ha++;

                                }
                                else if($height<=61.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=59.)
                                {
                                    $haa++;

                                }
                                else if($height<=61.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //5 month############
                        else if($row["baby_age_in_months"]==5)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=61.5)
                                {
                                    $ha++;

                                }
                                else if($height<=63.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=61.5)
                                {
                                    $haa++;

                                }
                                else if($height<=63.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //6 month############
                        else if($row["baby_age_in_months"]==6)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=63.0)
                                {
                                    $ha++;

                                }
                                else if($height<=65.3)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=63.0)
                                {
                                    $haa++;

                                }
                                else if($height<=65.3)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //7 month############
                        else if($row["baby_age_in_months"]==7)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=64.7)
                                {
                                    $ha++;

                                }
                                else if($height<=66.8)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=64.7)
                                {
                                    $haa++;

                                }
                                else if($height<=66.8)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //8 month############
                        else if($row["baby_age_in_months"]==8)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=66.0)
                                {
                                    $ha++;

                                }
                                else if($height<=68.2)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=66.0)
                                {
                                    $haa++;

                                }
                                else if($height<=68.2)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //9 month############
                        else if($row["baby_age_in_months"]==9)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=67.5)
                                {
                                    $ha++;

                                }
                                else if($height<=69.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=67.5)
                                {
                                    $haa++;

                                }
                                else if($height<=69.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //10 month############
                        else if($row["baby_age_in_months"]==10)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=68.5)
                                {
                                    $ha++;

                                }
                                else if($height<=71.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=68.5)
                                {
                                    $haa++;

                                }
                                else if($height<=71.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //11 month############
                        else if($row["baby_age_in_months"]==11)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=70.0)
                                {
                                    $ha++;

                                }
                                else if($height<=72.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=70.0)
                                {
                                    $haa++;

                                }
                                else if($height<=72.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //12 month############
                        else if($row["baby_age_in_months"]==12)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=71.0)
                                {
                                    $ha++;

                                }
                                else if($height<=73.4)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=71.0)
                                {
                                    $haa++;

                                }
                                else if($height<=73.4)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //13 month############
                        else if($row["baby_age_in_months"]==13)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=72.0)
                                {
                                    $ha++;

                                }
                                else if($height<=74.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=72.0)
                                {
                                    $haa++;

                                }
                                else if($height<=74.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //14 month############
                        else if($row["baby_age_in_months"]==14)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=73.0)
                                {
                                    $ha++;

                                }
                                else if($height<=75.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=73.0)
                                {
                                    $haa++;

                                }
                                else if($height<=75.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //15 month############
                        else if($row["baby_age_in_months"]==15)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=74.0)
                                {
                                    $ha++;

                                }
                                else if($height<=76.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=74.0)
                                {
                                    $haa++;

                                }
                                else if($height<=76.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //16 month############
                        else if($row["baby_age_in_months"]==16)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=75)
                                {
                                    $ha++;

                                }
                                else if($height<=77.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=75.0)
                                {
                                    $haa++;

                                }
                                else if($height<=77.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //17 month############
                        else if($row["baby_age_in_months"]==17)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=76.0)
                                {
                                    $ha++;

                                }
                                else if($height<=78.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=76.0)
                                {
                                    $haa++;

                                }
                                else if($height<=78.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //18 month############
                        else if($row["baby_age_in_months"]==18)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=77.0)
                                {
                                    $ha++;

                                }
                                else if($height<=79.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=77.0)
                                {
                                    $haa++;

                                }
                                else if($height<=79.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //19 month############
                        else if($row["baby_age_in_months"]==19)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=77.9)
                                {
                                    $ha++;

                                }
                                else if($height<=80.3)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=77.9)
                                {
                                    $haa++;

                                }
                                else if($height<=80.3)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //20 month############
                        else if($row["baby_age_in_months"]==20)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=78.6)
                                {
                                    $ha++;

                                }
                                else if($height<=81.2)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=78.6)
                                {
                                    $haa++;

                                }
                                else if($height<=81.2)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //21 month############
                        else if($row["baby_age_in_months"]==21)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=79.4)
                                {
                                    $ha++;

                                }
                                else if($height<=82.2)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=79.4)
                                {
                                    $haa++;

                                }
                                else if($height<=82.2)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //22 month############
                        else if($row["baby_age_in_months"]==22)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=80.0)
                                {
                                    $ha++;

                                }
                                else if($height<=83.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=80.0)
                                {
                                    $haa++;

                                }
                                else if($height<=83.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //23 month############
                        else if($row["baby_age_in_months"]==23)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=80.8)
                                {
                                    $ha++;

                                }
                                else if($height<=83.9)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=80.8)
                                {
                                    $haa++;

                                }
                                else if($height<=83.9)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //24 month############
                        else if($row["baby_age_in_months"]==24)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=81.5)
                                {
                                    $ha++;

                                }
                                else if($height<=84.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=81.5)
                                {
                                    $haa++;

                                }
                                else if($height<=84.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //25 month############
                        else if($row["baby_age_in_months"]==25)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.0)
                                {
                                    $ha++;

                                }
                                else if($height<=85.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.0)
                                {
                                    $haa++;

                                }
                                else if($height<=85.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //26 month############
                        else if($row["baby_age_in_months"]==26)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.3)
                                {
                                    $ha++;

                                }
                                else if($height<=85.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.3)
                                {
                                    $haa++;

                                }
                                else if($height<=85.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //27 month############
                        else if($row["baby_age_in_months"]==27)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=82.9)
                                {
                                    $ha++;

                                }
                                else if($height<=86.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=82.9)
                                {
                                    $haa++;

                                }
                                else if($height<=86.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //28 month############
                        else if($row["baby_age_in_months"]==28)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=83.5)
                                {
                                    $ha++;

                                }
                                else if($height<=86.7)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=83.5)
                                {
                                    $haa++;

                                }
                                else if($height<=86.7)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //29 month############
                        else if($row["baby_age_in_months"]==29)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=84.0)
                                {
                                    $ha++;

                                }
                                else if($height<=87.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=84.0)
                                {
                                    $haa++;

                                }
                                else if($height<=87.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //30 month############
                        else if($row["baby_age_in_months"]==30)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=84.8)
                                {
                                    $ha++;

                                }
                                else if($height<=87.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=84.8)
                                {
                                    $haa++;

                                }
                                else if($height<=88.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //31 month############
                        else if($row["baby_age_in_months"]==31)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=85.5)
                                {
                                    $ha++;

                                }
                                else if($height<=89.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=85.5)
                                {
                                    $haa++;

                                }
                                else if($height<=89.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //32 month############
                        else if($row["baby_age_in_months"]==32)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=86.0)
                                {
                                    $ha++;

                                }
                                else if($height<=89.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=86.0)
                                {
                                    $haa++;

                                }
                                else if($height<=89.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //33 month############
                        else if($row["baby_age_in_months"]==33)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=86.7)
                                {
                                    $ha++;

                                }
                                else if($height<=90.3)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=86.7)
                                {
                                    $haa++;

                                }
                                else if($height<=90.3)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //34 month############
                        else if($row["baby_age_in_months"]==34)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=87.4)
                                {
                                    $ha++;

                                }
                                else if($height<=91.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=87.4)
                                {
                                    $haa++;

                                }
                                else if($height<=91.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //35 month############
                        else if($row["baby_age_in_months"]==35)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=88.0)
                                {
                                    $ha++;

                                }
                                else if($height<=91.6)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=88.0)
                                {
                                    $haa++;

                                }
                                else if($height<=91.6)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //36 month############
                        else if($row["baby_age_in_months"]==36)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=88.6)
                                {
                                    $ha++;

                                }
                                else if($height<=92.4)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=88.6)
                                {
                                    $haa++;

                                }
                                else if($height<=92.4)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //37 month############
                        else if($row["baby_age_in_months"]==37)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=89.2)
                                {
                                    $ha++;

                                }
                                else if($height<=93.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=89.2)
                                {
                                    $haa++;

                                }
                                else if($height<=93.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //38 month############
                        else if($row["baby_age_in_months"]==38)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=89.7)
                                {
                                    $ha++;

                                }
                                else if($height<=93.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=89.7)
                                {
                                    $haa++;

                                }
                                else if($height<=93.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //39 month############
                        else if($row["baby_age_in_months"]==39)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=90.2)
                                {
                                    $ha++;

                                }
                                else if($height<=94.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=90.2)
                                {
                                    $haa++;

                                }
                                else if($height<=94.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //40 month############
                        else if($row["baby_age_in_months"]==40)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=90.8)
                                {
                                    $ha++;

                                }
                                else if($height<=94.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=90.2)
                                {
                                    $haa++;

                                }
                                else if($height<=94.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //41 month############
                        else if($row["baby_age_in_months"]==41)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=91.3)
                                {
                                    $ha++;

                                }
                                else if($height<=95.2)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=91.3)
                                {
                                    $haa++;

                                }
                                else if($height<=95.2)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //42 month############
                        else if($row["baby_age_in_months"]==42)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=91.9)
                                {
                                    $ha++;

                                }
                                else if($height<=95.8)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=91.9)
                                {
                                    $haa++;

                                }
                                else if($height<=95.8)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //43 month############
                        else if($row["baby_age_in_months"]==43)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=92.3)
                                {
                                    $ha++;

                                }
                                else if($height<=96.3)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=92.3)
                                {
                                    $haa++;

                                }
                                else if($height<=96.3)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //44 month############
                        else if($row["baby_age_in_months"]==44)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=92.8)
                                {
                                    $ha++;

                                }
                                else if($height<=97.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=92.8)
                                {
                                    $haa++;

                                }
                                else if($height<=97.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //45 month############
                        else if($row["baby_age_in_months"]==45)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=93.4)
                                {
                                    $ha++;

                                }
                                else if($height<=97.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=93.4)
                                {
                                    $haa++;

                                }
                                else if($height<=97.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //46 month############
                        else if($row["baby_age_in_months"]==46)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=94.0)
                                {
                                    $ha++;

                                }
                                else if($height<=98.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=94.0)
                                {
                                    $haa++;

                                }
                                else if($height<=98.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //47 month############
                        else if($row["baby_age_in_months"]==47)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=94.5)
                                {
                                    $ha++;

                                }
                                else if($height<=98.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=94.5)
                                {
                                    $haa++;

                                }
                                else if($height<=98.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //48 month############
                        else if($row["baby_age_in_months"]==48)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=95.0)
                                {
                                    $ha++;

                                }
                                else if($height<=99.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=95.0)
                                {
                                    $haa++;

                                }
                                else if($height<=99.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //49 month############
                        else if($row["baby_age_in_months"]==49)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=95.5)
                                {
                                    $ha++;

                                }
                                else if($height<=99.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=95.5)
                                {
                                    $haa++;

                                }
                                else if($height<=99.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //50 month############
                        else if($row["baby_age_in_months"]==50)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=96.0)
                                {
                                    $ha++;

                                }
                                else if($height<=100.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=96.0)
                                {
                                    $haa++;

                                }
                                else if($height<=100.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //51 month############
                        else if($row["baby_age_in_months"]==51)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=96.5)
                                {
                                    $ha++;

                                }
                                else if($height<=100.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=96.5)
                                {
                                    $haa++;

                                }
                                else if($height<=100.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //52 month############
                        else if($row["baby_age_in_months"]==52)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=97.0)
                                {
                                    $ha++;

                                }
                                else if($height<=101.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=97.0)
                                {
                                    $haa++;

                                }
                                else if($height<=101.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //53 month############
                        else if($row["baby_age_in_months"]==53)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=97.5)
                                {
                                    $ha++;

                                }
                                else if($height<=101.5)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=97.5)
                                {
                                    $haa++;

                                }
                                else if($height<=101.5)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //54 month############
                        else if($row["baby_age_in_months"]==54)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=98.0)
                                {
                                    $ha++;

                                }
                                else if($height<=102.0)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=98.0)
                                {
                                    $haa++;

                                }
                                else if($height<=102.0)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //55 month############
                        else if($row["baby_age_in_months"]==55)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=98.5)
                                {
                                    $ha++;

                                }
                                else if($height<=102.6)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=98.5)
                                {
                                    $haa++;

                                }
                                else if($height<=102.6)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //56 month############
                        else if($row["baby_age_in_months"]==56)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.0)
                                {
                                    $ha++;

                                }
                                else if($height<=103.2)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.0)
                                {
                                    $haa++;

                                }
                                else if($height<=103.2)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //57 month############
                        else if($row["baby_age_in_months"]==57)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.4)
                                {
                                    $ha++;

                                }
                                else if($height<=103.8)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.4)
                                {
                                    $haa++;

                                }
                                else if($height<=103.8)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //58 month############
                        else if($row["baby_age_in_months"]==58)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=99.9)
                                {
                                    $ha++;

                                }
                                else if($height<=104.4)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=99.9)
                                {
                                    $haa++;

                                }
                                else if($height<=104.4)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //59 month############
                        else if($row["baby_age_in_months"]==59)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=100.2)
                                {
                                    $ha++;

                                }
                                else if($height<=104.8)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=100.2)
                                {
                                    $haa++;

                                }
                                else if($height<=104.8)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        //60 month############
                        else if($row["baby_age_in_months"]==60)
                        {
                            //male
                            if($gender=='M')
                            {
                                if($height<=100.6)
                                {
                                    $ha++;

                                }
                                else if($height<=105.3)
                                {
                                    $hb++;
                                }
                                else 
                                {
                                    $hc++;
                                }

                            }
                            //female
                            else
                            {
                                if($height<=100.6)
                                {
                                    $haa++;

                                }
                                else if($height<=105.3)
                                {
                                    $hbb++;
                                }
                                else
                                {
                                    $hcc++;
                                }
                            }
                        }
                        else
                        {
                            echo "error";
                        }
                        
 
                    }
                    

                    $taa=$a+$aa;
                    $tbb=$b+$bb;
                    $tcc=$c+$cc;
                    $tdd=$d+$dd;
                    $tee=$e+$ee;

                    $thaa=$ha+$haa;
                    $thbb=$hb+$hbb;
                    $thcc=$hc+$hcc;

                    array_push($weight_count,$month_si);
                    array_push($weight_count,$taa);
                    array_push($weight_count,$tbb);
                    array_push($weight_count,$tcc);
                    array_push($weight_count,$tdd);
                    array_push($weight_count,$tee);

                    //array_push($height_count_haa,$thaa);
                    //array_push($height_count_hbb,$thbb);
                    //array_push($height_count_hcc,$thcc);
                
                    
                }

                   //print_r($weight_count);

                   //$jsonData = json_encode($weight_count, true);

                $jsonData='  {
                                    "status":"success",
                                    "data":{   
                                        "one": ["'.$weight_count[0].'",'.$weight_count[1].','.$weight_count[2].','.$weight_count[3].','.$weight_count[4].','.$weight_count[5].'],
                                        "two": ["'.$weight_count[6].'",'.$weight_count[7].','.$weight_count[8].','.$weight_count[9].','.$weight_count[10].','.$weight_count[11].'],
                                        "three": ["'.$weight_count[12].'",'.$weight_count[13].','.$weight_count[14].','.$weight_count[15].','.$weight_count[16].','.$weight_count[17].'],
                                        "four": ["'.$weight_count[18].'",'.$weight_count[19].','.$weight_count[20].','.$weight_count[21].','.$weight_count[22].','.$weight_count[23].'],
                                        "five": ["'.$weight_count[24].'",'.$weight_count[25].','.$weight_count[26].','.$weight_count[27].','.$weight_count[28].','.$weight_count[29].'],
                                        "six": ["'.$weight_count[30].'",'.$weight_count[31].','.$weight_count[32].','.$weight_count[33].','.$weight_count[34].','.$weight_count[35].']
                                    }
                                }';

                   echo($jsonData);

                ?>
                    
       
