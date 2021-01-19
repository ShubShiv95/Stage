<?php
  function generate_fee_recept($dbhandle,$Session,$SchoolId){
        $rno='';
        $CountRow_sql="select count(FP_Id) as receptno,date_format(now(),'%m%y') as dateformat from fee_payment_master where session='$Session' and school_id=$SchoolId";
        $result=$dbhandle->query($CountRow_sql);
        $row=$result->fetch_assoc();
        $count=$row["receptno"];
        $count++;
        //Generatig Recept Number srring in the format of : mmyy/total count rows number+1
        $rno=$row["dateformat"] .  '-' . $count;
        return $rno;
    }

?>