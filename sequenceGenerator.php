<?php
    function sequence_number($tablename,$dbhandle){

    
    $getseq_sql="select count(*) as cnt from $tablename";
	$seqid=0;
	$getseq_result=$dbhandle->query($getseq_sql);
	//var_dump($getseq_result);
	if($getseq_result)
		{
            $getseq_row=$getseq_result->fetch_assoc();
            $seqid=$getseq_row["cnt"];
            $seqid=$seqid+1;
            return $seqid;
		}
	else
		{
			echo "Database Error: Not able to create Unique Id. Please try after some time.";
			//echo $tablename;
			die();
			return false;
		}
	
    
    

	//End of Tmplate Details Table sequence generator.
	}
	

	// function to generate 10 digit student Id
	function generate_student_id($tablename,$dbhandle)
	{
		$getseq_sql="select count(*) as cnt from $tablename";
		$seqid=0;
		if($getseq_result=$dbhandle->query($getseq_sql))
			{
				$getseq_row=$getseq_result->fetch_assoc();
				$seqid=$getseq_row["cnt"];
				$seqid=$seqid+1;
				if ($seqid<10) {
					$seqid='00000'.$seqid;
				}else if($seqid>=10 && $seqid<100) {
					$seqid='0000'.$seqid;
				}
				elseif ($seqid>=100 && $seqid<1000) {
					$seqid='000'.$seqid;
				}
				elseif ($seqid>=1000 && $seqid<10000) {
					$seqid='00'.$seqid;
				}else if ($seqid>=100000 && $seqid<999999){
					$seqid=$seqid;
				}
				return $_SESSION["STARTYEAR"].$seqid;
			}
		else
			{
				echo "Database Error: Not able to create Template Id. Please try after some time.";
				die();
				return false;
			}
	}
