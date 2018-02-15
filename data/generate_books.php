INSERT INTO book (autor, title, land) VALUES ('Autor-1','Title-1','Land-1'),

<?php


$sql = "INSERT INTO book (autor, title, land) VALUES ";

for($i=1; $i<=150;$i++) {
	
	if($i==150) {
		
		
	}
	else {
	
	sql .= "('Autor-' . $i . "',"Title-" . $i . "',"Land-" . $i . "')";
	
	}
}

echo $sql;

?>
