<?php
include 'header.php';
include 'config.php';
$goto = $_REQUEST["holiday_id"];
$city = $_REQUEST["city"];
$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : '';
$days = isset($_REQUEST["days"]) ? $_REQUEST["days"] : '';

if (isset($_POST['submit'])) 
{
 if (isset($_SESSION['user_ses'])) 
 {
 $q_user = mysqli_query("select * from signup where email = '$_SESSION[user_ses]'");
 $result_user = mysqli_fetch_array($q_user);

 $user_name = $result_user['name'];
 $user_mobile = $result_user['mobile'];
 $user_email = $result_user['email'];
 } 
 else 
 {
 $user_name = $_POST['user_name'];
 $user_mobile = $_POST['mb_no'];
 $user_email = $_POST['user_email'];
 }
$q_holiday = mysqli_query("select * from find_holiday where holiday_id='$goto'");
$result_holiday = mysqli_fetch_array($q_holiday);
 $holiday_title = $result_holiday['holiday_title'];
 $holiday_price = $result_holiday['holiday_price'];

$sql = mysqli_query("insert into book_holiday values('', '$user_name','$user_mobile', '$user_email','$holiday_title','$city', NOW(),'$holiday_price')");

 if ($sql) 
 {
 header('location:thank.php');
 } 
 else 
 {
 echo "false" . mysqli_error();
 }  
}  
?>
<form method="post">
 <?php 
 $q = mysqli_query("select * from find_holiday where holiday_id='$goto'"); 
 ?>
 <?php   
 $result1 = mysqli_fetch_array($q);
 $holiday_title = $result1['holiday_title'];
 $holiday_price = $result1['holiday_price'];  
 ?> 
 <div class="container"> 
 	<div class="row">
 		<div class="col-sm-4">
 			<?php echo $result1['holiday_title']; ?> </div>
 		<div class="col-sm-4"> 
		 	<?php 
		 		echo $result1['holiday_city']; 
		 	?>
		 	<?php  
			 	echo "Holiday Starting Date: $date<br/>";
			 	echo "Holidays Days: $days<br/>";  
		 	?>
 <img src="image/rupees.png" width="25px" height="25px" style="margin-right :15px;" />
 <?php 
 echo "$result1[holiday_price]"; 
 ?>  
</div>
<?php  
if (isset($_SESSION['user_ses'])) 
	{
 ?>
 <div class="col-sm-4"> 
 <label>Card Number</label>
 <input type ='text' name='card_number' class='form-control' />
 <label>CVV</label>
 <input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
 </div>
 <?php
 } 
 else 
 {
 ?>
 <div class='col-sm-4'>
 <label>Name</label>
 <input type ='text' name='user_name' class='form-control' />
 <label>Email</label>
 <input type ='text' name='user_email' class='form-control'/>
 <label>Mobile Number</label>
 <input type ='text' name='mb_no' class='form-control' />
 <label>Card Number</label>
 <input type ='text' name='card_number' class='form-control' />
 <label>CVV</label>
 <input type ='text' name='card_cvv' class='form-control'/>
 <input type='submit' name='submit' class='btn btn-primary' value="Book Now">
 </div>
 <?php
  	  }  
 ?> 
</div> 
</div>
</form>
<br/>
<br/>
<br/>
<br/>
<?php 
   include 'footer.php'; 
 ?>

