<?php 
include_once "db_conn.php";

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Appetizer</title>
	<link rel="stylesheet" type="text/css" href="#">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-2 mt-3">
				
			</div>
			<div class="col-10">
				<?php 
					
$sql="SELECT pr.prod_image,pr.prod_name, p.price 
		FROM product as pr
		JOIN pricing as p
		ON pr.prod_id = p.prod_id
		WHERE cat_id = 1;";
			$fquery=$conn->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
				
					<?php

						
						$pfquery=$conn->query($sql);
						$inc=4;
						while($pfrow=$pfquery->fetch_array()){
							$inc = ($inc == 4) ? 1 : $inc+1; 
							if($inc == 1) echo "<div class='row'>"; 
							?>
								<div class="col-md-3">
									<div class="panel panel-default">
										<div class="panel-heading text-center">
											<b><?php echo $pfrow['prod_name']; ?></b>
										</div>
										<div class="panel-body">
											<img src="<?php if(empty($pfrow['prod_image'])){echo "<img src='img/" .$val['prod_image"'];} else{echo $pfrow['prod_image'];} ?>" height="225px;" width="50%">
										</div>
										<div class="panel-footer text-center">
											&#x20A8; <?php echo number_format($pfrow['price'], 2); ?>
										</div>
									</div>
								</div>
							<?php
							if($inc == 4) echo "</div>";
						}
						if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
						if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
					?>
			
			
				 	

			</div>
		</div>
		
	</div>

</body>
</html>