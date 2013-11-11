<?php

require_once('incl/Database.php'); 

$host= 'localhost';
$u= 'USER';
$p= 'PDUB';
$d= 'DB';

$db= new Database($d, $u, $p, $host);

$results= $db->query('SELECT makers.name, makers.mID FROM makers'); 

$results= $db->resToArray($results);

?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Manifest Development</title>
	</head>
	<body>
		<?php
			if(isset($_POST['submit'])){
				print "<pre>";
				 print_r($_POST); 
				print "</pre>";
				extract($_POST);
				$price= substr($price, 1);
				
				$woo= $db->query("INSERT INTO cigars VALUES('', '$name', '$size', '$strength', '$wrapper', '$price', '$desc', '$maker', 'now()'");

				if($woo){ print "<h3>$name submitted!</h3>"; }


			}
		?>

			<form method="post" name="add_cigar">
				<div>
					<label for="name">Cigar Name:</label> <input type="text" name="name" placeholder="Cigar Name" />
				</div>
				<div>
					<label for="size">Size:</label> <input type="text" name="size" placeholder="Cigar Size" />
				</div>				
				<div>
					<label for="strength">Strength:</label> <input type="text" name="strength" placeholder="Cigar Strength" />
				</div>
				<div>
					<label for="wrapper">Wrapper:</label> <input type="text" name="wrapper" placeholder="Cigar Wrapper" />
				</div>
				<div>
					<label for="price">Price:</label> <input type="text" name="price" placeholder="Cigar Price" />
				</div>
				<div>
					<label for="desc">Description:</label> <input type="text" name="desc" placeholder="Desc" />
				</div>
				<div>
					<select name="maker">
						<option value="0">Select a Maker</option>
						<?php
							foreach($results as $m){
								print '\t<option value="'.$m['mID']. '">'.$m['name'] .'</option>\n';
							}
						?>
					</select>
				</div>
				<div>
					<input type="submit" name="submit" value="HERF IT!" />
				</div>
			</form>
		
			

	</body>