<?php
$request_type=$_REQUEST["request-type"];

if($request_type=='StudMAttendance')
    {
        //$month=$_REQUEST["month"];
        //$year=$_REQUEST["year"];
        
        //Find number of days
        //Formating first_day and last_day for the month.
        /*
            if($month==1 or $month==3 or $month==5 or $month==7 or $month==8 or $month==10 or $month==12)
            {
                $days_count=31;
            }
            else if($month==4 or $month==6 or $month==9 or $month==11)
                {
                    $days_count=30;
                }		
            else if($month==2)	//calculating leaf year or not and specify the last day of february.
                {
                    if($year%4==0)
                        {
                            if($year%100==0)
                                {
                                    if($year%400==0)
                                        {
                                            $days_count=29;
                                        }
                                    else
                                        {	
                                            $days_count=28;
                                        }		
                                }
                            else
                                {
                                    $days_count=29;
                                }
                                
                        }
                    else
                        {
                            $days_count=28;
                        }
                }

            */
        // END OF STEP1: first day and last day formatting.
                        
       // if  attendance data is null or empty then status and message  will be change to "status"=>"0","message"=> "data not found"
        $data = array(
                        "days_count"=>"30",
                        "present_count"=>"23",
                        "absent_count"=>"1",
                        "late_count"=>"1",
                        "halfday_count"=>"1",
                        "holiday_count"=>"4",
                        "status"=>"200",
                        "message"=>"success", 
                        "attendance"=>array(
                                            array( 
                                                "day"=>"1","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"2","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"3","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"4","status"=>"LATE"
                                            ),
                                            array( 
                                                "day"=>"5","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"6","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"7","status"=>"HOLIDAY"
                                            ),
                                            array( 
                                                "day"=>"8","status"=>"ABSENT"
                                            ),
                                            array( 
                                                "day"=>"9","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"10","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"11","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"12","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"13","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"14","status"=>"HOLIDAY"
                                            ),
                                            array( 
                                                "day"=>"15","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"16","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"17","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"18","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"19","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"10","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"21","status"=>"HOLIDAY"
                                            ),
                                            array( 
                                                "day"=>"22","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"23","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"24","status"=>"HALFDAY"
                                            ),
                                            array( 
                                                "day"=>"25","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"26","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"27","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"28","status"=>"HOLIDAY"
                                            ),
                                            array( 
                                                "day"=>"29","status"=>"PRESENT"
                                            ),
                                            array( 
                                                "day"=>"30","status"=>"PRESENT"
                                            )
                                        )
                    ); 
        $obj=json_encode($data);
        echo $obj;    
    }      


    ?>