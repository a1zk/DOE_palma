<?php
$con = mysqli_connect("search_app_db","php_user","php_user","search_db") or die ("connection error");
$output = '';
//collect info
if(isset($_POST['search'])){

  $search_q = $_POST['search'];
  $search_q = preg_replace("#[^0-9a-z]#i","",$search_q);
  $search_q = ucwords($search_q);
  $ms_quary = mysqli_query($con, "SELECT * FROM city WHERE cnames LIKE '%$search_q%' OR hotels LIKE '%$search_q%'") or die("could not find !");
  $count = mysqli_num_rows($ms_quary);
  if($count == 0){
    $output = "The results haven't been founded";
  }else {
    while($row = mysqli_fetch_array($ms_quary)){
      $cname = $row['cnames'];
      $hname = $row['hotels'];
      $id = $row['id'];
      $output .= '<div>'.$cname.' -------> '.$hname.'</div>';
    }
  }

}

?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
margin: 0 auto;
position: absolute;
top: 50%;
left: 50%;
margin-right: -50%;
transform: translate(-50%, -50%)
}
</style>
<title>Search</title>
</head>

<body>
<img src="http://aux.iconspalace.com/uploads/1195785364488512707.png">
<form action="index.php" method="post">
  <input type="text" name="search" placeholder="e.g. City or Hotel" size="35"/>
  <input type="submit" value="Submit" />

</form>
<h2>Results: </h2>
<div> <?php print("$output");?></div>



</body>

</html>
