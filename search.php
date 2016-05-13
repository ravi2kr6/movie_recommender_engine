<?php
    include('lib/db.php');
	//get search term
    $searchTerm = $_GET['term'];
    $rs=mysql_query("SELECT * FROM avg_rating WHERE title LIKE '%".$searchTerm."%' ORDER BY rating");
	if(!$rs)
	{
		die(mysql_error());
	}
    while ($r = mysql_fetch_array($rs)) {
        $data[] = $r['title'];
    }
    
    //return json data
    echo json_encode($data);
?>
