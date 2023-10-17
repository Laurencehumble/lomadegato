<?php 

	$pos_q = "SELECT * FROM tbl_position ORDER BY `order` ASC";
    $pos_r = $conn->query($pos_q);



    $position = array();
	while($row = $pos_r->fetch_assoc()){
		$position[] = $row; 
	}

    
?>