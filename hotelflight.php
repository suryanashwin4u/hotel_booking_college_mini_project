<?php
include 'header.php';
include ("config.php");
$dep_flight = $_REQUEST['dep_flight'];
$ret_flight = $_REQUEST['return_flight'];
$hotel = $_REQUEST['hotel'];
$totalprice = $_REQUEST['totalprice'];
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
 $sql = mysqli_query("insert into book_hotel_flight values('', '$user_name','$user_mobile', '$user_email','$hotel','$dep_flight','$ret_flight', NOW(),'$totalprice')");
 if ($sql) {
 header('location:thank.php');
 } else {
 echo "false" . mysqli_error();
 }
}
?>
<form method="post" >
 <?php
 if (isset($_SESSION['user_ses'])) {
 ?>
 <div class="col-sm-4"> 
 <label>Card Number</label><input type ='text' name='card_number' class='form-control' />
 <label>CVV</label><input type ='text' name='card_cvv' class='form-control'/>
 <label> <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo $totalprice; ?></label><br>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
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
 <label> <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php echo $totalprice; ?></label><br>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
 </div>
 <?php
 }
 ?>
</form>
<?php
include 'footer.php';
?>
