<?php
    include_once ('lib/db.php'); 
    //get the function
    include_once ('pagination.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
       $statement = "avg_rating";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Movie Recommendation Engine:Average Rating</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="css/grey.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<style>
.wrapper {
    padding:0;
    margin:0;
    
}
</style>
                
</head>

<body>
<nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
 <div class="container-fluid">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Movie Recommendation Engine</a>
  </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="collob.php">Colloborative Prediction</a></li>
		<li class="active"><a href="avg1.php">Average Rating</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li><form class="navbar-form navbar-left" role="search" method="POST" action="result.php">
        <div class="form-group">
          <input type="text" id="movies" class="form-control" placeholder="Search" values="" name="movie">
        </div>
        <button type="submit" class="btn btn-default" name="submit1" >Submit</button>
      </form></li>
      </ul>
       </div>
	   </div>
	   </nav>
	   
	   
	   <div class="wrapper" style="margin-top: 50px;">

    <div class="container">
	<table class=" table table-bordered table-hover">
	<tr>
	<th>Average Rating</th>
    <th>Title</th>
    <th>Number of users who've given review</th>
    <th>Genre</th>
     </tr>	<?php
            //show records
            $query = mysql_query("SELECT * FROM avg_rating ORDER BY rating desc LIMIT $startpoint , $limit");
            
        	while ($row = mysql_fetch_assoc($query)) {
        ?>
          <tr><td><?php echo round($row['rating'],1); ?></td><td><?php echo $row['title'];?></td><td><?php echo $row['count'];?></td><td><?php echo $row['genre'] ;?></td></tr>
        <?php    
            }
        ?>
		</table>
    </div>
</div>
<?php
	echo pagination($statement,$limit,$page);
?>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script> 
<script src="js/bootstrap.min.js"></script>   
<script>
$(function() {
    $( "#movies" ).autocomplete({
        source: 'search.php'
    });
});
</script>
</body>
</html>
