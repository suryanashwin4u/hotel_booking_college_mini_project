<?php
include("config.php");
$hotel_city= $_REQUEST["city"];
$check_in= $_REQUEST["checkin"];
$check_out= $_REQUEST["checkout"];
$adult = $_REQUEST["adult"];
$child = $_REQUEST["child"];
$room = $_REQUEST["room"];
if (isset($_POST['submit'])) {
header("location:find_hotel.php?city=$_POST[city]&checkin=$_POST[datepicker_in]&checkout=$_POST[datepicker_out]&adult=$_POST[adult]&child=$_POST[child]&room=$_POST[room]"); }
include 'header.php'; ?>
<script type="text/javascript" src="js/min.js"></script>
<link href="css/jquery.ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap3.css" />
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<div class="container">
<form role="form" method="post" style="background-color: orange">
 <table> <tr>
 <td style="padding: 10px;"><label for="city">City</label><br/>
 <select name="from"> <option value=""></option> <option value="Sikkim"<?php
 if ($hotel_city == 'Sikkim') {   echo 'selected="selected"';    }    ?>   >Sikkim</option>
 <option value="Goa"<?php    if ($hotel_city == 'Goa') {   echo 'selected="selected"';    }    ?> >Goa</option>
 <option value="Kerala"<?php  if ($hotel_city == 'Kerala') {  echo 'selected="selected"';  }  ?>
 >Kerala</option>
 <option value="Leh Ladakh"<?php  if ($hotel_city== 'Leh Ladakh') {  echo 'selected="selected"'; }
 ?>>Leh Ladakh</option>  </select></td>
 <td style="padding-right: 20px;"><label for="checkin">Check-in</label><br/><input type="text" name="datepicker" id="datepicker" value="<?php echo $check_in; ?>" /></td>
 <td style="padding-right: 20px;"><label for="checkout">Check-out</label><br/><input type="text" name="datepicker1" id="datepicker1" value="<?php echo $check_out; ?>" /></td>
 <td style="padding-right: 20px;"><label for="adult">Adult</label><br/><input type="text" name="adult" style="width:50px;" value="<?php echo $adult; ?>" /></td>
 <td style="padding-right: 20px;"><label for="child">Child</label><br/><input type="text" name="child" style="width:50px;" value="<?php echo $child; ?>" /></td> 
 <td style="padding-right: 20px;"><label for="room">Room</label><br/><input type="text" name="child" style="width:50px;" value="<?php echo $room; ?>" /></td> 
 <td>
 <input type="submit" name="submit" class="btn btn-primary pull-right" value="Find Hotel" style="margin-top: 15px;"/>
 </td> </tr> </table></form>
<?php
echo $hotel_city;
$q = mysqli_query($con,"select * from find_hotel where hotel_city='$hotel_city'");
echo"<table class='table table-bordered' width='100%'>";
echo"<tr class='info'><th>Hotel View</th><th>Hotel Name</th><th>Room Price</th><th>Book Now</th>"; echo"</tr>";
while ($result = mysqli_fetch_array($q)) 
 {  echo "<tr>";
 echo "<td><img src=upload/$result[3] class='img-thumbnail'class='img-thumbnail'width='200px' height='100px'></td>";
 echo "<td>$result[4]</td>"; echo "<td>$result[6]</td>";
 echo "<td><a href='hotel_details.php?hotel_id=$result[hotel_id]&check_in= $_REQUEST[checkin]&check_out= $_REQUEST[checkout]&adult=$_REQUEST[adult]&child=$_REQUEST[child]&room=$_REQUEST[room]'><input type='button'class='btn btn-warning' value='Book Now'></a></td>";
 echo "</tr>";  }   echo"</table>";  ?>   </div>
<script>
 $(document).ready(function() {
 $("#datepicker").datepicker();
 });
</script>
<script>
 $(document).ready(function() {
 $("#datepicker1").datepicker();
 });
</script>
<?php
include 'footer.php';          ?>
