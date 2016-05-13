<?php

include('lib/db.php');
$lst = implode("|",$_POST['check_list']);
$rs3 = mysql_query("SELECT * from avg_rating where genre='$lst' ORDER BY rating desc LIMIT 15");
$rs4 = mysql_query("SELECT * from predicted_rating where genre='$lst'ORDER BY rating desc  LIMIT 15");             
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    

<title>Search Result</title>
</head>
<body style="background-image:url(img/f4.jpg);">
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
		<li><a href="avg1.php">Average Rating</a></li>
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
<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
Based on average rating</div>
<table class="table table-hover table-bordered">
<tr>
<th>Rating</th>
<th>Movie</th>
<th>Count</th>
</tr>
<?php while($r3=mysql_fetch_array($rs3))
{?>
<tr>
<td><?php echo round($r3['rating'],1); ?></td>
<td><?php echo  $r3['title']; ?></td>
<td><?php echo  $r3['count']; ?></td>
</tr>
<?php } ?>

</table>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">Based on colloborative rating</div>
<table class="table table-bordered table-hover">
<tr>
<th>Rating</th>
<th>Movie</th>
<th>Count</th>
</tr>
<?php while($r4=mysql_fetch_array($rs4))
{?>
<tr>
<td><?php echo round($r4['rating'],1); ?></td>
<td><?php echo  $r4['title']; ?></td>
<td><?php echo  $r4['count']; ?></td>
</tr>
<?php } ?>

</table>
</div>
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
