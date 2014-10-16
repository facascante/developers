<?php

function convertAmounToNotes($amount)
{
	$notes = array(
			100.00,
			50.00,
			20.00,
			10.00
	);
	
	if( (isset($amount) &&           // Value is set
		(($amount % 10) == 0) &&     // Amount is divisible by 10
		($amount > 9) ) ||           // Amount is greather than 9
		 empty($amount) )            // Amount is null
	{	
		$result = array();
		echo 'Entry ' . $amount;
		echo "\n";
		
		foreach ($notes as $value) 
		{
				$tAmount = $amount-array_sum($result);
				$result = array_merge($result,getNotes($value,$tAmount));
		}
		echo 'Result ' . json_encode($result);
		echo "\n";
	}
	else{
		echo "ERROR : Invalid Argument";
		echo "\n";
	}
	
}

function getNotes($notes,$amount){
	$result = array();
	while($amount >= $notes){
		array_push($result, $notes);
		$amount-=$notes;
	}
	return $result;
}


try{
	convertAmounToNotes($argv[1]);
}
catch(exception $e){
	echo "unknown Error " + e;
}



