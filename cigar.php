<?php
require_once('incl/functions.php');
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>CIGAR NAME</title>
	</head>
	<body>
		<?php
			$query= "SELECT * FROM cigars";
			$results= $db->query($query); //returns resource
			$results= $db->resToArray($results); //converts resource to array
			
			//print_array($results);
			
			foreach($results as $cigar){
				print '<p><a href="cigar.php?id='.$cigar['cID'].'">'.$cigar['name'].'</a></p>';
				}
			
		?>
	
	</body>
</html>