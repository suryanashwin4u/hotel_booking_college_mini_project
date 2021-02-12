<?php
include 'header.php';
include("config.php");
$departure = $_REQUEST['depart_id'];
$return = $_REQUEST['return_id'];
$depart = $_REQUEST["depart"];
$return = $_REQUEST["return"];
$no_adult = $_REQUEST["adult"];
$no_child = $_REQUEST["child"];
if (isset($_POST['submit'])) {
 if (isset($_SESSION['user_ses'])) {
 $q_user = mysqli_query("select * from signup where email = '$_SESSION[user_ses]'");
 $result_user = mysqli_fetch_array($q_user);
 $user_name = $result_user['name'];
 $user_mobile = $result_user['mobile'];
 $user_email = $result_user['email'];
 } else {
 $user_name = $_POST['user_name'];
 $user_mobile = $_POST['mb_no'];
 $user_email = $_POST['user_email'];
 }
 $q_flight = mysqli_query("select * from find_flight where flight_id='$departure'");
 $result_flight = mysqli_fetch_array($q_flight);
 $departure_flight_name = $result_flight['flight_name'];
 $flight_price = $result_flight['flight_price'];
 $departure_city = $result_flight['flight_from'];
 $return_city = $result_flight['flight_to'];
 $r_flight = mysqli_query("select * from find_flight where flight_id='$return'");
 $result_return_flight = mysqli_fetch_array($r_flight);
 $return_flight_name = $result_return_flight['flight_name'];
 $return_flight_price = $result_return_flight['flight_price'];
 $departure_city = $result_flight['flight_to'];
 $return_city = $result_flight['flight_from'];
 $total_price = $flight_price + $return_flight_price;
 $sql = mysqli_query("insert into book_flight (id,user_name,user_mobile, user_email,departure_flight_name,return_flight_name,departure_city,return_city,price,depart_date,return_date,no_adult,no_child) values('', '$user_name','$user_mobile', '$user_email','$departure_flight_name','$return_flight_name','$departure_city', '$return_city', '$total_price', '$depart', '$return', '$no_adult', '$no_child');");
 if ($sql) {
 header('location:thank.php');
 }
}
?>
<form method="post">
 <?php
 $q = mysqli_query("select * from find_flight where flight_id='$departure'");
 $result = mysqli_fetch_array($q);
 ?> 
 <div class="container">
 <div class="row">
 <h3>Flight Details</h3>
 <?php if ($return == '') {
 ?>
 <h4>Departure</h4>
 <div class="col-sm-3">
 <?php
 echo "<img src=upload/$result[4] class='img-thumbnail'class='img-thumbnail'width='50px' height='50px'><br/>";
 echo "$result[3]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result[1]</br>";
 echo "$result[5]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "&#8594;<br/>";
 echo "$result[7]";
 ?>
 </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result[2]<br/>";
 echo "$result[6]";
 ?> </div>
 <div class="col-sm-3"> 
 <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo "$result[8]"; ?>
 </div>
 </div>
 <?php } else { ?>
 <h4>Departure</h4>
 <div class="col-sm-3">
 <?php
 echo "<img src=upload/$result[4] class='img-thumbnail'class='img-thumbnail'width='50px' height='50px'><br/>";
 echo "$result[3]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result[1]</br>";
 echo "$result[5]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "&#8594;<br/>";
 echo "$result[7]";
 ?>
 </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result[2]<br/>";
 echo "$result[6]";
 ?> </div>
 <div class="col-sm-3"> 
 <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo "$result[8]"; ?>
 </div>
 </div>
 <?php
 $q1 = mysqli_query("select * from find_flight where flight_id='$return'");
 $result1 = mysqli_fetch_array($q1);
 ?> 
 <div class="row">
 <h4>Return</h4>
 <div class="col-sm-3">
 <?php
 echo "<img src=upload/$result1[4] class='img-thumbnail'class='img-thumbnail'width='50px' height='50px'><br/>";
 echo "$result[3]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result1[1]</br>";
 echo "$result1[5]";
 ?> </div>
 <div class="col-sm-2"> 
 <?php
 echo "&#8594;<br/>";
 echo "$result1[7]";
 ?>
 </div>
 <div class="col-sm-2"> 
 <?php
 echo "$result1[2]<br/>";
 echo "$result1[6]";
 ?> </div>
 <div class="col-sm-3"> 
 <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo "$result1[8]"; ?>
 </div>
 </div>
 <?php } ?>
 <?php
 if (isset($_SESSION['user_ses'])) {
 ?>
 <div class="col-sm-4"> 
 <label>Card Number</label><input type ='text' name='card_number' class='form-control' />
 <label>CVV</label><input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now" />
 </div>
 <?php
 } else {
 ?>
 <div class='col-sm-4'>
 <label>Name</label><input type ='text' name='user_name' class='form-control' />
 <label>Email</label><input type ='text' name='user_email' class='form-control'/>
 <label>Mobile Number</label><input type ='text' name='mb_no' class='form-control' />
 <label>Card Number</label><input type ='text' name='card_number' class='form-control' />
 <label>CVV</label><input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now" />
 </div>
 <?php
 }
 ?>
</div>
</form>
<br/><br/><br/><br/>
<?php
include 'footer.php';
?>
