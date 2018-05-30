<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RanaCreed</title>
<link href="ranacreed.css" rel="stylesheet" type="text/css">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>. 
<div class="head col-sm-12 col-md-12">
	<h2 class="h21">RANA</h2><h2 class="h22">CREED™</h2>
	<p>Already have an account? <a href="#">login</a></p>
</div>




	<div class="frm text-center">
		<h3>Guest Book</h3>
		  <form class="fr" method="post" action="#">
                            <div class="form-group frn">
                                <input type="text" class="form-control" placeholder="Name..." maxlength="40" name="name" />
                            <br/>
                                  <input type="textarea" class="form-control" placeholder="Comment" maxlength="240" name="comment" />
                            <br/>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form><br/>
						<br/>
						
	</div>
	<div class="container">
<?php
$con =mysqli_connect('localhost','root','','guestbook');

$sql = "SELECT * FROM comment";
	$result = $con->query($sql);
	$com = "";
	if ($result->num_rows > 0) {
	
  
    while($row = $result->fetch_assoc()) {
    
	$com .= $row["username"]." : ".$row["comment"]."\n";}}
    
  ?>
  <br/> <br/>
 <textarea name = 'txtComment' class="form-control" rows = '10' cols = '75' readonly maxlength='1000'><?php echo $com ?></textarea></br>

                              
	
   	<?php
   	
if(isset($_POST['name']))
{
	$comment = $_POST['comment'];
	$user = $_POST['name'];
	
	$stmt = $con->prepare("insert into UserComments(username,comment) values(?,?)");
	$stmt->bind_param("ss", $user, $comment);

	$stmt->execute();
	$stmt->close();
	$con->close();
	header("Refresh:0");
}
?>
</div>
</body>
</html>
