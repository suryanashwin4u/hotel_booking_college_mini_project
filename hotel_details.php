<?php
include 'header.php';
include("config.php");
$hotel_id = $_REQUEST["hotel_id"];
$check_in = $_REQUEST["check_in"];
$check_out = $_REQUEST["check_out"];
$adult=$_REQUEST["adult"];
$child=$_REQUEST["child"];
$room=$_REQUEST["room"];
if (isset($_POST['submit'])) {
 if(isset($_SESSION['user_ses'])){
 $q_user = mysqli_query("select * from signup where email = '".$_SESSION['user_ses']."'");
 $result_user = mysqli_fetch_array($q_user);
 
 $user_name = $result_user['name'];
 $user_mobile = $result_user['mobile'];
 $user_email = $result_user['email'];
 }else{
 $user_name = $_POST['user_name'];
 $user_mobile = $_POST['mb_no'];
 $user_email = $_POST['user_email'];
 }
 
 $q_hotel = mysqli_query("select * from find_hotel where hotel_id='$hotel_id'");
 $result_hotel = mysqli_fetch_array($q_hotel);
 $name = $result_hotel['hotel_name'];
 $city = $result_hotel['hotel_city'];
 $price = $result_hotel['hotel_price'];
 $sql = mysqli_query("insert into book_hotel values('', '$user_name','$user_mobile', '$user_email','$name','$city', '$check_in','$check_out','$adult','$child','$room', '$price')");
 if ($sql) {
 header("location:thank.php");
 } else {
 echo "false" . mysqli_error();
 }
}
?>
<form method="post">
 <?php $q = mysqli_query("select * from find_hotel where hotel_id='$hotel_id'"); ?>
 <?php
 $result = mysqli_fetch_array($q);
 $name = $result['hotel_name'];
 $city = $result['hotel_city'];
 $price = $result['hotel_price'];
 ?> 
 <div class="container">
 <div class="row">
 <div class="col-sm-4">
 <?php echo "<img src=upload/$result[3] class='img-thumbnail'class='img-thumbnail'width='200px' height='100px'>"; ?>
 </div>
 <div class="col-sm-4">
 <?php
 echo "$result[4], $result[1]<br/>";
 echo "Check-in: $check_in &nbsp";
 echo "Check-out: $check_out<br/>";
 echo "No. of Adult: $adult &nbsp No. of Child $child <br/>";
 echo "No. of Rooms: $room<br/>";
 ?>
 <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo "$result[6]"; ?>
 
 </div>
 <?php
 if (isset($_SESSION['user_ses'])) {
 ?>
 <div class="col-sm-4"> 
 <label>Card Number</label><input type ='text' name='card_number' class='form-control' />
 <label>CVV</label><input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
 </div>
 <?php
 echo "user is logged in";
 } else {
 ?>
 <div class='col-sm-4'>
 <label>Name</label><input type ='text' name='user_name' class='form-control' />
 <label>Email</label><input type ='text' name='user_email' class='form-control'/>
 <label>Mobile Number</label><input type ='text' name='mb_no' class='form-control' />
 <label>Card Number</label><input type ='text' name='card_number' class='form-control' />
 <label>CVV</label><input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
 </div>
 <?php
 }
 ?>
</div>
 </div>
 </form>
 <br/><br/><br/><br/>
 <?php
 include 'footer.php';
 ?>
