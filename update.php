<?php
require_once('incl/functions.php');
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Manifest Development</title>
	</head>
	<body>
		<?php
			if(isset($_POST['submit'])){
				update_cigar($_POST);
			}
			
			if($_GET['id']){
				$cigar= get_cigar($_GET['id']);	
			}
		?>

			<form method="post" name="update_cigar">
				<div>
					<label for="name">Cigar Name:</label> <input type="text" name="name" value="<?php print $cigar['name']; ?>" placeholder="Cigar Name" />
				</div>
				<div>
					<label for="size">Size:</label> <input type="text" name="size" value="<?php print $cigar['size']; ?>" placeholder="Cigar Size" />
				</div>				
				<div>
					<label for="strength">Strength:</label> <input type="text" name="strength" value="<?php print $cigar['strength']; ?>" placeholder="Cigar Strength" />
				</div>
				<div>
					<label for="wrapper">Wrapper:</label> <input type="text" name="wrapper" value="<?php print $cigar['wrapper']; ?>" placeholder="Cigar Wrapper" />
				</div>
				<div>
					<label for="price">Price:</label> <input type="text" name="price" value="<?php print $cigar['price']; ?>" placeholder="Cigar Price" />
				</div>
				<div>
					<label for="desc">Description:</label> <textarea  name="desc"><?php print $cigar['description']; ?></textarea>
				</div>
				<div>
					<select name="maker">
						<option value="0">Select a Maker</option>
						<?php
							$makers= get_info('makers');
							foreach($makers as $m){
								$selected= ($cigar['makerID'] == $m['mID']) ? 'selected' : '';
								print '\t<option value="'.$m['mID']. '"'. $selected .'>'.$m['name'] .'</option>\n';
							}
						?>
					</select>
				</div>
				<div>
					<input type="hidden" name="cID" value="<?php print $cigar['cID']; ?>" />
					<input type="submit" name="submit" value="HERF IT!" />
				</div>
			</form>

	</body>