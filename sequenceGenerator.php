<?php
    function sequence_number($tablename,$dbhandle){

    
    $getseq_sql="select count(*) as cnt from $tablename";
    $seqid=0;
	if($getseq_result=$dbhandle->query($getseq_sql))
		{
            $getseq_row=$getseq_result->fetch_assoc();
            $seqid=$getseq_row["cnt"];
            $seqid=$seqid+1;
            return $seqid;
		}
	else
		{
			echo "Database Error: Not able to create Template Id. Please try after some time.";
			die();
			return false;
		}
	
    
    

	//End of Tmplate Details Table sequence generator.
    }
?>