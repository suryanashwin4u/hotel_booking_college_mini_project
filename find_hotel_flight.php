<?php
include("config.php");
$start = $_REQUEST["start"];
$end = $_REQUEST["end"];
$return = $_REQUEST["return"];
$depart = $_REQUEST["depart"];
$dest = $_REQUEST["dest"];
$checkin = $_REQUEST["checkin"];
$checkout = $_REQUEST["checkout"];
$adult = $_REQUEST["adult"];
$child = $_REQUEST["child"];
$room = $_REQUEST["room"];
if (isset($_POST['book_hotel_flight'])) {
 if (isset($_POST['dep_flight'])) {
 $dep_id = $_POST['dep_flight'];
 }
 if (isset($_POST['ret_flight'])) {
 $ret_id = $_POST['ret_flight'];
 }
 if (isset($_POST['select_hotel'])) {
 $hotel_id = $_POST['select_hotel'];
 }
 $totalprice = $_POST['ret_price' . $ret_id] + $_POST['dep_price' . $dep_id] + $_POST['totalprice'];
 header('location:hotelflight.php?dep_flight=' . $dep_id . '&return_flight=' . $ret_id . '&hotel=' . $hotel_id . '&totalprice=' . $totalprice);   }
include 'header.php';  ?>
<style>
 .table-striped > tbody > tr:nth-child(2n+1) {
 background-color: rgb(230, 227, 224);
 }
 .table-striped > tbody > tr:hover {
 background-color: #C0BFBF;
 }
</style>
<script>
 var c = a = 0;
 function get_val(value, price, flight) {
 a = parseInt(value);
 update1(price);
 document.getElementById('flight_id').value = flight;
 }
 function get_val1(value1, price, flight) {
 c = parseInt(value1);
 update1(price);
 document.getElementById('return_flight_id').value = flight;
 }
 function update1(price) {
 var hotel = document.getElementById('hprice' + price).value;
 var result = a + c + parseInt(hotel);
 document.getElementById('price' + price).innerHTML = result;
 }
</script>
<?php
include 'config.php';
$sql = mysqli_query($con,"SELECT * FROM find_hotel WHERE hotel_city = '$end'");
$k = 1;
while ($hotel = mysqli_fetch_array($sql)) {
 ?>
 <form method="post">
 <section style="border: solid 1px" class="container">
 <div class="row">
 <div class="col-sm-4" style="padding: 10px 0 0 30px;">
 <img src='upload/<?php echo $hotel["hotel_img"] ?>' class='img-thumbnail' width='300px' height='150px' /><br />
 <?php
 echo "<span style='font-size:20;color:#1571be;'>" . $hotel['hotel_name'] . "</span>";
 echo '<br/>';
 echo $hotel['hotel_city'];
 echo '<br/> RS. ';
 echo $hotel['hotel_price'];
 ?>
 </div>
 <div class="col-sm-8" >
 <table class="table table-bordered " width="100%">
 <tr > <td>

 <table class="table table-bordered table-striped" style="">
 <h4><font face='verdana' color='#285783' size="4">DEPARTURE</font></h4>
 <?php
 $i = 1;
 $sql_dep = mysqli_query("SELECT * FROM find_flight WHERE flight_from = '$start' and flight_to = '$end' ");
 while ($dep = mysqli_fetch_array($sql_dep)) {
 $fid = $dep['flight_id'];
 $fprice = $dep['flight_price'];
 echo "<input type='hidden' name='dep_price$fid' value='$fprice'>";
 echo "<tr><td style='padding-top:45px;'><input type='radio' name='dep_flight' id='radio$i' value='$fid' onclick='get_val($fprice,$k,$fid)'></td><td><table style='' width='100%' >";
 echo "<tr ><td ><img src='upload/" . $dep['flight_logo'] . "' width='25px' height='25px'> <b style='padding-left : 15px;'>" . $dep['flight_name'] . "</b>";
 echo '<tr><td class="text-capitalize">';
 echo '<img src="image/plane.png" width="25px" height="25px" style="margin-right :15px;">' . '&nbsp' . '<font color="#285783">' . $start . '&nbsp' . '&#8596;' . ' &nbsp ' . $end . '</font>';
 echo '</td></tr>';
echo '<tr><td>';
echo '<img src="image/clock.png" width="16px" height="16px" style="margin-right :15px;">' . '&nbsp' . $dep['flight_time'] . " " . ' &#8594; ' . $dep['flight_arrive'] . "</td></tr>";
 echo '<tr><td style="font-size:15px;"><img src="image/trajectory.png" width="20px" height="20px" style="margin-right :15px;">' . '&nbsp' . $dep['flight_duration'];
 echo "</td></tr><tr><td>RS " . $dep['flight_price'] . "</td></tr>
 </table></td></tr>";
 $i++;
 }
 ?>
 </table>
 </td>
 <td>
 <?php
 if ($return == "1") {
 ?>

 <table class="table table-bordered table-striped">
 <font face="verdana" color='#285783'><h4>RETURN</h4></font>
 <?php
 $j = 1;
 $sql_dep = mysqli_query("SELECT * FROM find_flight WHERE flight_from = '$end' and flight_to = '$start' ");
 while ($dep = mysqli_fetch_array($sql_dep)) {
 $rfid = $dep['flight_id'];
 $rfprice = $dep['flight_price'];
 echo "<input type='hidden' name='ret_price$rfid' value='$rfprice'>";
 echo "<tr><td style='padding-top:45px;'><input type='radio' name='ret_flight' id='radionew$j' value='$rfid' onclick='get_val1($rfprice,$k,$rfid)'></td><td><table style='' width='100%' >";
 echo "<tr ><td ><img src='upload/$dep[flight_logo]' width='25px' height='25px'> <b style='padding-left : 15px;'>" . $dep['flight_name'] . "</b>";
 echo '<tr><td class="text-capitalize">';
 echo '<img src="image/plane.png" width="25px" height="25px" style="margin-right :15px;">' . '&nbsp' . '<font color="#285783">' . $end . '&nbsp' . '&#8596;' . ' &nbsp ' . $start . '</font>';
 echo '</td></tr>';
 echo '<tr><td>';
 echo '<img src="image/clock.png" width="16px" height="16px" style="margin-right :15px;">' . '&nbsp' . $dep['flight_time'] . " " . ' &#8594; ' . $dep['flight_arrive'] . "</td></tr>";
 echo '<tr><td style="font-size:15px;"><img src="image/trajectory.png" width="20px" height="20px" style="margin-right :15px;">' . '&nbsp' . $dep['flight_duration'];
 echo "</td></tr><tr><td>RS " . $dep['flight_price'] . "</td></tr></table></td></tr>";
 $j++;
 }
 ?>

 </table> 
 <?php
 }
 ?>
 </td>
<td style="padding-top: 100px;padding-left: 50px;">
<font color="156EC1">Total package Price</font><br/>
<img src="image/rupee.png" width="30px" height="30px" style="margin-right :15px;">
<input type="hidden" value="<?php echo $hotel['hotel_price']; ?>" id="hprice<?php echo $k ?>" name="totalprice">
<span id="price<?php echo $k ?>" value="" style="font-size:30px;">Rs <?php echo $hotel['hotel_price']; ?></span><br />
 <img src="image/air_plane.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/plus.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/hotel_room.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;"><br/>
 <input type="hidden" value="<?php echo $hotel['hotel_id']; ?>" name="select_hotel">
 <button type="submit" class="btn btn-lg btn-warning" name="book_hotel_flight" style="margin-top:20px;">Book Now</button>
 </td>
 </tr>
 </table>
 </div>
 </div>
 </section> 
 </form>
 <?php
 $k++;
}
?>
