<?php
session_start();

include("config.php");

if (isset($_POST['flightsubmit'])) 
{ 
header("location:findflight.php?from=$_POST[from]&to=$_POST[to]&depart=$_POST[datepicker_depart]&return=$_POST[datepicker_return]&adult=$_POST[adult]&child=$_POST[child]");
}

if (isset($_POST['findhotel'])) 
{
header("location:find_hotel.php?city=$_POST[city]&checkin=$_POST[datepicker_in]&checkout=$_POST[datepicker_out]&adult=$_POST[adult]&child=$_POST[child]&room=$_POST[room]");
}

if (isset($_POST["hotelflight"])) 
{
if (isset($_POST['datepicker_dest'])) 
{
if ($_POST['datepicker_dest'] != '') 
{
$return = 1;
}
else 
{
$return = 0;
}
}
header("location:find_hotel_flight.php?start=$_POST[start]&end=$_POST[end]&return=$return&depart=$_POST[datepicker_departure]&dest=$_POST[datepicker_dest]&checkin=$_POST[datepicker_checkin]&checkout=$_POST[datepicker_checkout]&adult=$_POST[adult]&child=$_POST[child]&room=$_POST[room]"); 
}

if (isset($_POST['findholidays'])) 
{
header("location:find_holiday.php?goto=$_POST[goto]&date=$_POST[date]&days=$_POST[days]"); 
}
function get_username($email) 
{
$query = mysqli_query("SELECT name FROM signup WHERE email='$email'");
$name = mysqli_fetch_row($query);
return $name['0']; 
}
?>
<html> 
<head> 
	<title>Tour & Travel</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap3.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/image_writer.css" rel="stylesheet" type="text/css">
<link href="css/fontello.css" rel="stylesheet" type="text/css">

<script>
function displayHelpInfo(value) 
{


if (value == "Flights") 
{
$('html, body').animate({
scrollTop: $("#.nav li#tab1").offset().top
}, 1000);

$('.nav li').removeClass('active');

$('.nav li#tab1').addClass('active');

$('.tab-pane').removeClass('in active');

$('#flight').addClass('in active');

}



if (value == "Hotels") 
{
$('html, body').animate({
scrollTop: $(".nav li#tab2").offset().top
}, 1000);

$('.nav li').removeClass('active');

$('.nav li#tab2').addClass('active');

$('.tab-pane').removeClass('in active');

$('#hotel').addClass('in active');

}




if (value == "Flight&Hotel") 
{
$('html, body').animate({
scrollTop: $(".nav li#tab3").offset().top
}, 1000);

$('.nav li').removeClass('active');

$('.nav li#tab3').addClass('active');

$('.tab-pane').removeClass('in active');

$('#hotelflight').addClass('in active');

}




if (value == "Holidays") 
{
$('html, body').animate({
scrollTop: $("#.nav li#tab1").offset().top
}, 1000);

$('.nav li').removeClass('active');

$('.nav li#tab4').addClass('active');

$('.tab-pane').removeClass('in active');

$('#holiday').addClass('in active');

}
}
</script>
</head>
<body>

<div class="header clearfix">
<div style="float:left;width:80%;">
<a href="index.php" class="logo" style="margin-top: 0px;"><img src="image/logo.png"></a>
</div>
<div style="float:right;width:20%;">
	<p>
		<a href="mailto:ankitgoyal0292@gmail.com"><span class="glyphicon glyphicon-envelope"></span> ankitgoyal0292@gmail.com</a>
	</p>
<p>
	<a href="tel:8285911514"> +91-8285911514</a></p>

<?php
if (array_key_exists('user_ses', $_SESSION) && !empty($_SESSION['user_ses'])) 
{
?>

Welcome <?php echo get_username($_SESSION["user_ses"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>

<?php  
} 
else 
{  
?>

<a href="login.php">Login</a> |
<a href="register.php">Register</a>

<?php
 } 
?>
</div>
</div>


<nav class="navbar navbar-default clearfix" style="background-color:#0bc8e5;">

<ul class="nav navbar-nav">
<li class="" style="background-color:#057e91;"><a href="index.php">Home</a></li>
<li><a href="javascript:void(0)" onclick="return displayHelpInfo('Flights');">Flights</a></li>
<li><a href="javascript:void(0)" onclick="return displayHelpInfo('Hotels');">Hotels</a></li>
<li><a href="javascript:void(0)" onclick="return displayHelpInfo('Flight&Hotel');">Flights + Hotels</a></li>
<li><a href="javascript:void(0)" onclick="return displayHelpInfo('Holidays')">Holidays</a></li>
</ul>

</nav>

<div class="mid-page" >
<div class="container-fluid" >
