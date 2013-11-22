<?php

require_once('incl/Database.php'); 

$host= 'localhost';
$u= 'weekendc_chief';
$p= 'RPAB2013!';
$d= 'weekendc_cigars';

global $db;
$db= new Database($d, $u, $p, $host);

/**Return all info from whatever
table is passed to get_info().
If no table is passed, cigars table is used by default.
**/
function get_info($table='cigars'){
	$db= $GLOBALS['db'];
	$results= $db->query("SELECT * FROM $table");
	return $db->resToArray($results);
}

function get_cigar($id){
	$db= $GLOBALS['db'];
	$query= "SELECT * FROM cigars WHERE cID='$id'";
	return $db->get_row($query);
}


function check_cigar($name){
	$cigars= get_info();
	
	foreach($cigars as $cigar){
		if(strtolower($name) == strtolower($cigar['name'])){
			return true;
		}
	}
	
	return false;
	
}	


function add_cigar($info){
	$db= $GLOBALS['db'];
	extract($info);
	$submitted= $db->query("INSERT INTO cigars VALUES('', '$name', '$size', '$strength', '$wrapper', '$price', '$desc', '$maker', 'now()')");

	if($submitted){ 
		print "<h3>$name submitted!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function update_cigar($info){
	$db= $GLOBALS['db'];
	
	foreach($info as $key => $value){
		$info[$key]= $db->clean($value);
	}
	extract($info);
	
	$query= "UPDATE cigars SET name='$name', size='$size', strength='$strength', wrapper='$wrapper', price='$price', description='$desc', makerID='$maker', timestamp='now()' WHERE cID='$cID'";
	
	$submitted= $db->query($query);

	if($submitted){ 
		print "<h3>$name updated!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}


function add_maker($info){
	$db= $GLOBALS['db'];
	extract($info);
	
	$submitted= $db->query("INSERT INTO makers VALUES('', '$maker_name', '$location', '$year', '$factories', now())");

	if($submitted){ 
		print "<h3>$maker_name submitted!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function print_array($a){
	print "<pre>";
	print_r($a);
	print "</pre>";
}

?>