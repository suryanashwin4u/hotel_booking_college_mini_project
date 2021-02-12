<?php
include("config.php");
$goto = $_REQUEST["goto"];
$date = $_REQUEST["date"];
$days = $_REQUEST["days"];
include 'header.php'; 
?> 
<div class="container">
<div class="row">
 <form method="post">
 <?php  
  $q1 = mysqli_query("select * from find_holiday where holiday_city='$goto'");
 while ($result1 = mysqli_fetch_assoc($q1)) 
 	{          
  ?>
 <div class="col-sm-4" style=" padding-right: 30px;">
 <?php       
 $img = explode(',', $result1['holiday_img']);
 echo"<table class='table' width='100%' style='background-color:lavender;'>";
 echo "<tr><td>";   
 ?>
 
  <img class="img-thumbnail" src="upload/<?php echo $result1['holiday_city']?>/<?php echo $img[0]; ?>" width='100%' style="padding-top: 2px;">

 <?php
 echo "</td></tr>"; 
 echo "<tr>";
 echo "<td>$result1[holiday_title]</td>"; 
 echo "</tr>";
 echo "<td>$days</td>"; 
 echo "</tr>"; 
 echo "<tr>";
 echo "<td>Starting From: Rs.$result1[holiday_price]<br/>(Per Person on twin sharing)</td>";
 echo "</tr>"; 
 echo "<tr>"; 
 echo "<td>Select a date: $date</td>"; 
 echo "</tr>";
 echo "<tr>"; 
 echo "<td>
		<a href='holiday_details.php?goto=$result1[holiday_id]&city=$result1[holiday_city]&date=$date&days=$days'>
		<input type='btn'class='btn btn-warning' value='View Details'>
		</a>
		</td>";
 echo "</tr>"; 
 echo"</table>";        
 ?>     
 </div>  
<?php        
}        
?> 
 </form>
</div>
</div>
<?php              
include 'footer.php';          
?>
