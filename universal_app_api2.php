<?php
require_once './dbhandle.php';
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
                                "month_no"=>"04",  
                                "month_name"=>"April",
                                "days_count"=>"30",
                                "present_count"=>"13",
                                "absent_count"=>"1",
                                "late_count"=>"1",
                                "halfday_count"=>"1",
                                "holiday_count"=>"4",
                                "attendance_percent" =>"90",
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
                                                            "day"=>"5","status"=>"LATE"
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
                                                            "day"=>"20","status"=>"PRESENT"
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
                                ),
                            array(    
                                "month_no"=>"05",  
                                "month_name"=>"May",
                                "days_count"=>"31",
                                "present_count"=>"13",
                                "absent_count"=>"1",
                                "late_count"=>"1",
                                "halfday_count"=>"1",
                                "holiday_count"=>"4",
                                "attendance_percent" =>"30",
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
                                                            "day"=>"20","status"=>"PRESENT"
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
                                                        ),
                                                        array( 
                                                            "day"=>"31","status"=>"PRESENT"
                                                        ) 
                                                    )
                                ),//End of April Month Data       
                        array(

                               "month_no"=>"06",  
                               "month_name"=>"June",
                               "days_count"=>"30",
                               "present_count"=>"0",
                               "absent_count"=>"0",
                               "late_count"=>"0",
                               "halfday_count"=>"0",
                               "holiday_count"=>"30",
                               "attendance_percent" =>"85",
                               "attendance"=>array(
                                                    array( 
                                                        "day"=>"1","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"2","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"3","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"4","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"5","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"6","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"7","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"8","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"9","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"10","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"11","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"12","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"13","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"14","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"15","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"16","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"17","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"18","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"19","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"20","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"21","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"22","status"=>"HOLIDAY"
                                                    ) ,
                                                    array( 
                                                        "day"=>"23","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"24","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"25","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"26","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"27","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"28","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"29","status"=>"HOLIDAY"
                                                    ),
                                                    array( 
                                                        "day"=>"30","status"=>"HOLIDAY"
                                                    )                                            
                                                )//end of days list
                                    ),//End of April Month Data  
                                    array(    
                                        "month_no"=>"07",  
                                        "month_name"=>"July",
                                        "days_count"=>"31",
                                        "present_count"=>"13",
                                        "absent_count"=>"1",
                                        "late_count"=>"1",
                                        "halfday_count"=>"1",
                                        "holiday_count"=>"4",
                                        "attendance_percent" =>"80",
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
                                                                    "day"=>"20","status"=>"PRESENT"
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
                                                                ),
                                                                array( 
                                                                    "day"=>"31","status"=>"PRESENT"
                                                                ) 
                                                            )
                                        ),                   
                                        array(    
                                            "month_no"=>"08",  
                                            "month_name"=>"August",
                                            "days_count"=>"31",
                                            "present_count"=>"13",
                                            "absent_count"=>"1",
                                            "late_count"=>"1",
                                            "halfday_count"=>"1",
                                            "holiday_count"=>"4",
                                            "attendance_percent" =>"40",
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
                                                                        "day"=>"20","status"=>"PRESENT"
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
                                                                    ),
                                                                    array( 
                                                                        "day"=>"31","status"=>"PRESENT"
                                                                    ) 
                                                                )
                                            ), 
                                            array(    
                                                "month_no"=>"09",  
                                                "month_name"=>"September",
                                                "days_count"=>"30",
                                                "present_count"=>"13",
                                                "absent_count"=>"1",
                                                "late_count"=>"1",
                                                "halfday_count"=>"1",
                                                "holiday_count"=>"4",
                                                "attendance_percent" =>"60",
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
                                                                            "day"=>"20","status"=>"PRESENT"
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
                                                ),
                                                array(    
                                                    "month_no"=>"10",  
                                                    "month_name"=>"October",
                                                    "days_count"=>"31",
                                                    "present_count"=>"13",
                                                    "absent_count"=>"1",
                                                    "late_count"=>"1",
                                                    "halfday_count"=>"1",
                                                    "holiday_count"=>"4",
                                                    "attendance_percent" =>"100",
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
                                                                                "day"=>"4","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"5","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"6","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"7","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"8","status"=>"PRESENT"
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
                                                                                "day"=>"14","status"=>"PRESENT"
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
                                                                                "day"=>"20","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"21","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"22","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"23","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"24","status"=>"PRESENT"
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
                                                                                "day"=>"28","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"29","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"30","status"=>"PRESENT"
                                                                            ),
                                                                            array( 
                                                                                "day"=>"31","status"=>"PRESENT"
                                                                            ) 
                                                                        )
                                                    ), 
                                                    array(    
                                                        "month_no"=>"11",  
                                                        "month_name"=>"November",
                                                        "days_count"=>"30",
                                                        "present_count"=>"22",
                                                        "absent_count"=>"1",
                                                        "late_count"=>"1",
                                                        "halfday_count"=>"1",
                                                        "holiday_count"=>"5",
                                                        "attendance_percent" =>"95",
                                                        "attendance"=>array(
                                                                                array( 
                                                                                    "day"=>"1","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"2","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"3","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"4","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"5","status"=>"HALFDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"6","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"7","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"8","status"=>"HOLIDAY"
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
                                                                                    "day"=>"13","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"14","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"15","status"=>"HOLIDAY"
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
                                                                                    "day"=>"20","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"21","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"22","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"23","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"24","status"=>"PRESENT"
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
                                                                                    "day"=>"28","status"=>"PRESENT"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"29","status"=>"HOLIDAY"
                                                                                ),
                                                                                array( 
                                                                                    "day"=>"30","status"=>"PRESENT"
                                                                                ) 
                                                                            )
                                                        ),  
                                                        array(    
                                                            "month_no"=>"12",  
                                                            "month_name"=>"December",
                                                            "days_count"=>"31",
                                                            "present_count"=>"15",
                                                            "absent_count"=>"4",
                                                            "late_count"=>"2",
                                                            "halfday_count"=>"1",
                                                            "holiday_count"=>"1",
                                                            "attendance_percent" =>"90",
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
                                                                                        "day"=>"7","status"=>"PRESENT"
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
                                                                                        "day"=>"14","status"=>"PRESENT"
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
                                                                                        "day"=>"20","status"=>"PRESENT"
                                                                                    ),
                                                                                    array( 
                                                                                        "day"=>"21","status"=>"HOLIDAY"
                                                                                    ),
                                                                                    array( 
                                                                                        "day"=>"22","status"=>"ABSENT"
                                                                                    ),
                                                                                    array( 
                                                                                        "day"=>"23","status"=>"ABSENT"
                                                                                    )
                                                                                )
                                                            ),                                                                                                                                                                                                  
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
    
    if($request_type=='ListOfLeaves')
    {
        $studentid=$_REQUEST["StudentId"];
        
        $data = array(
                        "status"=>"200",
                        "message"=>"success",
                        "Leave"=>array(
                                        array(
                                                "Leave_Reason"=>"Personal",  
                                                "From_Date"=>"09/10/2020",
                                                "To_Date"=>"09/10/2020",
                                                "Status"=>"Declined"
                                        ),
                                        array(
                                                "Leave_Reason"=>"Sick",  
                                                "From_Date"=>"11/11/2020",
                                                "To_Date"=>"12/11/2020",
                                                "Status"=>"Approved"
                                        ),
                                        array(
                                                "Leave_Reason"=>"Other",  
                                                "From_Date"=>"30/11/2020",
                                                "To_Date"=>"30/11/2020",
                                                "Status"=>"Pending"
                                        )
                                    )
                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }
    
    if($request_type=='LeaveReason')
    {
        $studentid=$_REQUEST["StudentId"];
        
        $data = array(
                        "status"=>"200",
                        "message"=>"success",
                        "Leave_Reason"=>array(
                                       "leave_reason_1"=>"Sick",
                                       "leave_reason_2"=>"Family Function",
                                       "leave_reason_3"=>"Bereavement",
                                       "leave_reason_4"=>"Other"
                                    )
                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }

    if($request_type=='SubmitLeaves')
    {
        $studentid=$_REQUEST["StudentId"];
        
        $data = array(
                        "status"=>"200",
                        "message"=>"success"
                        ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
    }
 
    if($request_type=='MeetingList')
    {
        $studentid=$_REQUEST["StudentId"];
        
        $data = array(
            "status"=>"200",
            "message"=>"success",
            "name" => "Ravi Kumar",
            "class"=> "Class 5",
            "section" => "A",
            "roll_no" => "15",
            "Meetings"=>array(
                            array(
                                    "topic"=>"Physics",  
                                    "description"=>"Some Description about Physics",
                                    "subject"=>"About Gravitation",
                                    "teacher"=>"Mr. Ashish Kumar",
                                    "class_start_date_time"=>"29/12/2020 | 08:15 pm",
                                    "class_end_date_time"=>"29/12/2020 | 08:55 pm",
                                    "Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz09"
                            ),
                            array(
                                    "topic"=>"Chemistry",  
                                    "description"=>"Some Description about Chemistry",
                                    "subject"=>"Chemical Reaction",
                                    "teacher"=>"Mrs. Sanjana Kumar",
                                    "class_start_date_time"=>"30/12/2020 | 03:00 pm",
                                    "class_end_date_time"=>"30/12/2020 | 04:00 pm",
									"Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"                                    
                            ),
                            array(
                                    "topic"=>"Hindi",  
                                    "description"=>"Some Description about Hindi",
                                    "subject"=>"Premchandra",
                                    "teacher"=>"Mrs. Pooja Sinha",
                                    "class_start_date_time"=>"30/12/2020 | 03:00 pm",
                                    "class_end_date_time"=>"30/12/2020 | 04:00 pm",
									"Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"                                    
                            ),
                            array(
                                    "topic"=>"English",  
                                    "description"=>"Some Description about English",
                                    "subject"=>"Chemical Reaction",
                                    "teacher"=>"Mrs. Sanjana Kumar",
                                    "class_start_date_time"=>"31/12/2020 | 03:00 pm",
                                    "class_end_date_time"=>"31/12/2020 | 04:00 pm",
									"Meeting_URL" => "https://zoom.us/j/92369077029?pwd=ZlY0TUFzVjZ1blptVkJEdVhud1ZDZz"                                    
                            ),
                            array(
                                    "topic"=>"Physics",  
                                    "description"=>"Some Description about Physics",
                                    "subject"=>"About Gravitation",
                                    "teacher"=>"Mr. Ashish Kumar",
                                    "class_start_date_time"=>"31/12/2020 | 08:15 pm",
                                    "class_end_date_time"=>"31/12/2020 | 08:55 pm",
                                    "Meeting_URL" => "" 
                            )
                        )
            ); 
        header('Content-type: text/javascript');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    if($request_type=='LoginAPI')
        {
        $userId=$_REQUEST["user_id"];
        $password=$_REQUEST["password"];
            
            $data = array(
                            "status"=>"200",
                            "message"=>"success",
                            "student_Id" => "12345",
                            "student_name" => "Riddhi Kumari",
                            "class" => "5",
                            "section" => "A",
                            "roll_no" => "15",
                            "image" => "http://stage.swiftcampus.com/app_images/profile/f70dec5e6f21734a156221c9db14ebec.jpg"
                            ); 
                    header('Content-type: text/javascript');
                    echo json_encode($data, JSON_PRETTY_PRINT);
        }

        if($request_type=='SyllabusList')
        {
            $studentId=$_REQUEST["StudentId"];
            $schoolId=$_REQUEST["schooid"];
    
            $data = array(
                "status"=>"200",
                "message"=>"success",
                "name" => "Ravi Kumar",
                "class"=> "Class 5",
                "section" => "A",
                "roll_no" => "15",
                "subjects"=>array(
                                array(
                                        "name" => "Math",
                                        "filelist"=>array( 
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc1.pdf"
                                                    ),	  
                                        "description" => "Some description" 
                                     ),
                                array(
                                        "name" => "English",
                                        "filelist"=>array( 
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc2.pdf"
                                                    ),	  
                                        "description" => "Some description" 
                                     ),
                                array(
                                        "name" => "Hindi",
                                        "filelist"=>array( 
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc3.pdf"
                                                    ),	  
                                        "description" => "Some description"  
                                     ),
                                array(
                                        "name" => "Science",
                                        "filelist"=>array( 
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc1.pdf",
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc2.pdf", 
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc3.pdf"
                                        ),                
                                        "description" => "Some description" 
                                     ),
                                array(
                                        "name" => "IT",
                                        "filelist"=> array(
                                                "http://stage.swiftcampus.com/app_images/syllabus/Doc1.pdf"
                                                    ),	  
                                        "description" => "Some description" 
                                     ),
                                 array(
                                        "name" => "Sanskrit",
                                        "filelist"=> array(
                                        "http://stage.swiftcampus.com/app_images/syllabus/Doc2.pdf"
                                        ),
                                        "description" => "Some description"
                                     )
    
                                     
                            )
                ); 
            header('Content-type: text/javascript');
            echo json_encode($data, JSON_PRETTY_PRINT);
        }                            
    