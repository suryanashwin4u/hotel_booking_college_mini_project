<?php
include("config.php");
$from = $_REQUEST["from"];
$to = $_REQUEST["to"];
$depart = $_REQUEST["depart"];
$return = $_REQUEST["return"];
$no_adult = $_REQUEST["adult"];
$no_child = $_REQUEST["child"];
$err='';
if (isset($_POST['submit'])) {
 if (isset($_POST['depart']) || isset($_POST['return'])) {
 header("Location:flight_details.php?depart_id=$_POST[depart_id]&return_id=$_POST[return_id]&depart=$_POST[datepicker_depart]&return=$_POST[datepicker_return]&adult=$_POST[adult]&child=$_POST[child]");
 } else {
 $err = "Select Values";
 }
}
if (isset($_POST['flightsubmit'])) {
 header("location:findflight.php?from=$_POST[from]&to=$_POST[to]&depart=$_POST[datepicker_depart]&return=$_POST[datepicker_return]&adult=$_POST[adult]&child=$_POST[child]");
}
include 'header.php';
?>
<script>
 function radio_depart(value) {
 document.getElementById("depart_id").value = value;
 }
 function radio_return(value1) {
 document.getElementById("return_id").value = value1;
 }
</script>
<script type="text/javascript" src="js/min.js"></script>
<link href="css/jquery.ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap3.css" />
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<div class="container">
<form method="post">
 
 <table style="background-color: #FE9A2E;padding: 10px;">
 <tr>
 <td style="padding: 10px;">
 <label for="from">Leaving From</label>
 <select name="from">
 <option value=""></option>
 <option value="Sikkim"<?php
 if ($from == 'Sikkim') {
 echo 'selected="selected"';
 }
 ?>
 >Sikkim</option>
 <option value="Goa"<?php
 if ($from == 'Goa') {
 echo 'selected="selected"';
 }
 ?>
 >Goa</option>
 <option value="Kerala"<?php
 if ($from == 'Kerala') {
 echo 'selected="selected"';
 }
 ?>
 >Kerala</option>
 <option value="Leh Ladakh"<?php
 if ($from == 'Leh Ladakh') {
 echo 'selected="selected"';
 }
 ?>>Leh Ladakh</option>
 </select></td>
 <td style="padding: 10px;">
 <label for="to">Going TO</label>
 <select name="to">
 <option value=""></option>
 <option value="Sikkim"<?php
 if ($to == 'Sikkim') {
 echo 'selected="selected"';
 }
 ?>
 >Sikkim</option>
 <option value="Goa"<?php
 if ($to == 'Goa') {
 echo 'selected="selected"';
 }
 ?>
 >Goa</option>
 <option value="Kerala"<?php
 if ($to == 'Kerala') {
 echo 'selected="selected"';
 }
 ?> >Kerala</option>
 <option value="Leh Ladakh"<?php
 if ($to == 'Leh Ladakh') {
 echo 'selected="selected"';
 }
 ?>>Leh Ladakh</option>
 </select></td>
 <td style="padding: 10px;"><label for="adult">Departure</label><input type="text" name="datepicker_depart" id="datepickernew" value="<?php echo $depart; ?>" /></td>
 <td style="padding-right: 10px;"><label for="adult">Return</label><input type="text" name="datepicker_return" id="datepickernew1" value="<?php echo $return; ?>" /></td>
 <td style="padding-right: 20px;"><label for="adult">Adult</label><br/><input type="text" name="adult" style="width:50px;" value="<?php echo $no_adult; ?>" /></td>
 <td style="padding: 20px;"><label for="child">Child</label><br/><input type="text" name="child" style="width:50px;" value="<?php echo $no_child; ?>" /></td> 
 <td style="padding: 20px;"><input type="submit" class="btn btn-primary" name="flightsubmit" value="Find Flight" style="margin-top: 15px;"/>
 </td>
 </tr>
 </table>
 
 <?php
 echo "<span style='color:red;'>".$err."</span><br />";
 echo '<font color="#FE9A2E" size="4">' . $from . '&nbsp' . '</font>' . ' &#8594;' . '&nbsp' . '<font color="#FE9A2E" size="4">' . $to . '</font>' . '&nbsp' . '<font size="3">' . $depart . '&nbsp' . $return . '</font>';
 ?>
 <div class="row">
 <?php
 if ($return != "") {
 ?>
 <div class="col-sm-6">
 <h4>Departure</h4>
 <?php
 } else {
 ?>
 <div class="col-sm-12"><h4>Departure</h4>
 <?php
 }
 $q = mysqli_query($con,"select * from find_flight where flight_from ='$from' AND flight_to='$to'");
 echo"<table class='table table-bordered' width='100%'>";
 echo"<tr class='info'><th>Select</th><th>Airline</th><th>Depart</th><th>Arrive</th><th>Duration</th><th>Price</th>";
 echo"</tr>";
 $total_price = 0;
 while ($result = mysqli_fetch_assoc($q)) {
 $total_price = (($result['flight_price'] * $no_adult) + ($no_child * $result['flight_price'] * 0.80));
 echo"<tr>";
 echo"<td><input type='radio' name='depart' value='$result[flight_id]' onclick='radio_depart(this.value)'></td>";
 echo"<td>$result[flight_name]</td>";
 echo"<td>$result[flight_time]</td>";
 echo"<td>$result[flight_arrive]</td>";
 echo"<td>$result[flight_duration]</td>";
 echo"<td>Rs $total_price</td>";
 echo"</tr>";
 }
 echo"</table>";
 ?>
 </div>
 <?php
 if ($return != "") {
 ?>
 <div class="col-sm-6">
 <h4>Return</h4>
 <?php
 $q = mysqli_query($con,"select * from find_flight where flight_from ='$to' AND flight_to='$from'");
 echo"<table class='table table-bordered' width='100%'>";
 echo"<tr class='info'><th>Select</th><th>Airline</th><th>Depart</th><th>Arrive</th><th>Duration</th><th>Price</th>";
 echo"</tr>";
 $total_price = 0;
 while ($result = mysqli_fetch_assoc($q)) {
 $total_price = (($result['flight_price'] * $no_adult) + ($no_child * $result['flight_price'] * 0.80));
 echo"<tr>";
 echo "<td><input type='radio' name='return' value='" . $result['flight_id'] . "' onclick='radio_return(this.value)'></td>";
 echo "<td>" . $result['flight_name'] . "</td>";
 echo"<td>" . $result['flight_time'] . "</td>";
 echo"<td>" . $result['flight_arrive'] . "</td>";
 echo"<td>" . $result['flight_duration'] . "</td>";
 echo"<td>Rs $total_price</td>";
 echo"</tr>";
 }
 echo"</table>";
 ?>
 </div>
 <?php } ?>
 </div>
 <span style='position: absolute;align:center;left: 47%;'>
 <input type="hidden" id="depart_id" name="depart_id" >
 <input type="hidden" id="return_id" name="return_id" >
 <input type='submit'class='btn btn-warning' value='Book Now' name='submit'></span>
 </div>
</form>
 </div>
<script>
 $(document).ready(function() {
 $("#datepickernew").datepicker();
 });
</script>
<script>
 $(document).ready(function() {
 $("#datepickernew1").datepicker();
 });
</script>
<br/><br/><br/><br/>
<?php
include 'footer.php';
?>
