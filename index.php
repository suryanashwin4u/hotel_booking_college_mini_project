<?php
include 'header.php';
include 'slider.php';
?>

<div class="container" >
<div class="row">
<div class="col-sm-6">
<?php 
include 'tab.php';
?> 
</div>
<div class="col-sm-6">

<?php
 include("config.php");
 $q = mysqli_query($con,"select * from packages");
 while ($r = mysqli_fetch_array($q)) 
 {
 echo "<table>";
 echo "<tr>";
 echo"<td style='padding-right: 20px;'>
 	  <div class='albumDetail'>
 	  <a href='find_holiday.php?goto=Goa'>
 	  <img class='img-responsive imghover' src='upload/$r[1]' width='220' height='150' >
 	  <span class='albumtitle'>Goa</span>
      </a> 
      </div> 
      </div>  
      </td>";
 echo"<td style='padding-right: 20px;'>
 	  <div class='albumDetail'>
 	    <a href='find_holiday.php?goto=Leh Ladakh'><img class='img-responsive imghover' src='upload/$r[2]' width='220' height='150' >
 		<span class='albumtitle'>Leh Ladakh</span>
 		</a> 
 		</div> 
 		</div>  
 		</td>";  
 echo "</tr>";
 echo "<br/><br/><br/>"; 
 echo "<tr>";
 echo"<td style='padding-right: 20px;'>
		<div class='albumDetail'>
 			<a href='find_holiday.php?goto=Kerala'><img class='img-responsive imghover' src='upload/$r[3]' width='220' height='150' > <span class='albumtitle'>Kerala</span>
 			</a> 
 		</div> 
 		</div>  
 		</td>";
 echo"<td style='padding-right: 20px;'>
 		<div class='albumDetail'>
 			<a href='find_holiday.php?goto=Sikkim'><img class='img-responsive imghover' src='upload/$r[4]' width='220' height='150' >
 			<span class='albumtitle'>Sikkim</span></a> </div> </div>  </td>";  
 echo "</tr>"; 
 echo "</table>";
	   }   
	   ?>
</div>
</div>
</div>
<br/>
<br/>
<br/>
<?php include 'footer.php'; ?>
