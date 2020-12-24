<?php
$request_type=$_REQUEST["Parameter"];
if($request_type=='StudMAttendance')
    {
        $studentid=$_REQUEST["StudentId"];
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
                        "status"=>"200",
                        "message"=>"success",
                        //new array here
                        "months"=>array(
                            array(    
                                "month_no"=>"12",  
                                "month_name"=>"December",
                                "days_count"=>"31",
                                "present_count"=>"13",
                                "absent_count"=>"1",
                                "late_count"=>"1",
                                "halfday_count"=>"1",
                                "holiday_count"=>"4",
                                "attendance"=>array(
                                                    array( 
                                                        "day"=>"1","status"=>"PRESENT"
                                                    ),
                                                    array( 
                                                        "day"=>"2","status"=>"PRESENT"
                                                    ),
                                                    array( 
                                                        "day"=>"3","status"=>"HALFDAY"
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
                                                        "day"=>"9","status"=>"LATE"
                                                    ),
                                                    array( 
                                                        "day"=>"10","status"=>"PRESENT"
                                                    ),
                                                    array( 
                                                        "day"=>"11","status"=>"PRESENT"
                                                    ),
                                                    array( 
                                                        "day"=>"12","status"=>"ABSENT"
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
                                                    )
                                                )
                                ),//End of April Month Data       
                        array(

                               "month_no"=>"11",  
                               "month_name"=>"November",
                               "days_count"=>"30",
                               "present_count"=>"23",
                               "absent_count"=>"1",
                               "late_count"=>"1",
                               "halfday_count"=>"1",
                               "holiday_count"=>"4",
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
                                                )//end of days list
                            )//End of April Month Data  
                        )
                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }      

    if($request_type=='StudYearlyAttendance')
    {
        $studentid=$_REQUEST["StudentId"];
        
        $data = array(
                        "status"=>"200",
                        "message"=>"success",
                        //new array here
                        "month"=>array(
                                        array(
                                                "month_no"=>"12",  
                                                "month_name"=>"December",
                                                "attendance_percent"=>"60"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"11",  
                                                "month_name"=>"November",
                                                "attendance_percent"=>"75"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"10",  
                                                "month_name"=>"October",
                                                "attendance_percent"=>"80"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"9",  
                                                "month_name"=>"September",
                                                "attendance_percent"=>"88"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"8",  
                                                "month_name"=>"August",
                                                "attendance_percent"=>"62"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"7",  
                                                "month_name"=>"July",
                                                "attendance_percent"=>"71"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"6",  
                                                "month_name"=>"June",
                                                "attendance_percent"=>"45"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"5",  
                                                "month_name"=>"May",
                                                "attendance_percent"=>"35"
                                        ),//End of April Month Data       
                                        array(
                                                "month_no"=>"4",  
                                                "month_name"=>"April",
                                                "attendance_percent"=>"25"
                                        ) 
                                    )
                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }      
   