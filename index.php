<?php
require_once('incl/functions.php');
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>CIgar Database</title>
	</head>
	<body>
		<?php
			if(isset($_POST['submit'])){
				if(!check_cigar($_POST['name'])){
					add_cigar($_POST);
				}else{
					print "<h3>That cigar already exists in the DB</h3>";
				}
			}
			
			if(isset($_POST['maker_submit'])){
				add_maker($_POST);
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
							$makers= get_info('makers');
							foreach($makers as $m){
								print '\t<option value="'.$m['mID']. '">'.$m['name'] .'</option>\n';
							}
						?>
					</select>
				</div>
				<div>
					<input type="submit" name="submit" value="HERF IT!" />
				</div>
			</form>
			
			
			<form method="post" name="add_maker">
				<div>
					<label for="maker_name">Maker Name:</label> <input type="text" name="maker_name" placeholder="Maker Name" />
				</div>
				<div>
					<label for="location">Location:</label> <input type="text" name="location" placeholder="Location" />
				</div>				
				<div>
					<label for="year">Year Est:</label> <input type="text" name="year" placeholder="Year" />
				</div>
				<div>
					<label for="factories"># Factories:</label> <input type="text" name="factories" placeholder="factories" />
				</div>
				<div>
					<input type="submit" name="maker_submit" value="Add Maker" />
				</div>
			</form>

		
			

	</body>