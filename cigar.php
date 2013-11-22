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
			
			if(isset($_GET['id'])){
				$cigar= get_cigar($_GET['id']);
				print_array($cigar);

			}else{
				$results= get_info('cigars');
			
				foreach($results as $cigar){
					print '<p><a href="cigar.php?id='.$cigar['cID'].'">'.$cigar['name'].'</a></p>';
				}
			}
			
		?>
	
	</body>
</html>