<?php
include("config.php");
include("header.php");
$goto = $_REQUEST["goto"];
$city = $_REQUEST["city"];
$date = $_REQUEST["date"];
$days = $_REQUEST["days"];
$holiday_id=$goto;
$holiday_city=$city;

?>
<div class="container">
<div class="row">
 <div class="col-sm-8">
 <ul class="nav nav-tabs">
 <li class="active" id="tab1"><a data-toggle="tab" href="#package"> Packages Details</a></li>
 <li id="tab2"><a data-toggle="tab" href="#hotel"> Hotel options</a></li>
 </ul>
 <div class="tab-content">
 <div id="package" class="tab-pane fade in active">
 <div>
 <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; ">
 <?php
 $q1 = mysqli_query("select * from find_holiday where holiday_id='$goto'");
 $result1 = mysqli_fetch_assoc($q1);
 $img = explode(',', $result1['holiday_img']);
 ?>
 <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;" class="img-thumbnail">
 <?php
 for ($i = 0; $i < count($img); $i++) {
 ?>
 <div>
 <img u="image" src="upload/<?php echo $city ?>/<?php echo $img[$i]; ?>" />
 <img u="thumb" src="upload/<?php echo $city ?>/<?php echo $img[$i]; ?>" />
 </div>
 <?php
 }
 ?> 
 </div>
 
 <!-- Arrow Left -->
 <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
 </span>
 <!-- Arrow Right -->
 <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px">
 </span>
 <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 600px; height: 60px; left:0px; bottom: 0px;">
 <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
 <div u="slides" style="cursor: move;">
 <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
 <div class=w><div u="thumbnailtemplate" style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></div></div>
 <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
 </div> </div> </div> </div> </div>
 <?php echo $result1['holiday_desc'] ?>
 </div> </div>
 <div id="hotel" class="tab-pane fade">
 <h4><img src='image/hotel.png' class='img-class'> Hotel</h4>
 <div>
 <img class='img-thumbnail'class='img-thumbnail'width='400px' height='200px' src="upload/<?php echo $result1['holiday_hotel'] ?>" width='100%' style="padding-top: 2px;">
 </div> </div>  </div> </div>
 <div class="col-sm-4">
 <form method="post">
 <font color="156EC1"><?php echo $result1['holiday_city'] ?>Total package Price</font><br/>
 <img src="image/rupee.png" width="30px" height="30px" style="margin-right :15px;" >
 <span id="price<?php echo $k ?>;" style="font-size:30px;"><?php echo $result1['holiday_price'] ?></span><br />
 <img src="image/hotel_room.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/plus.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/car.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/plus.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/meal.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/plus.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;">
 <img src="image/binoculars.png" width="25px" height="25px" style="margin-right :15px;margin-top: 40px;"><br/>
<!-- <a href='book_holiday.php?holiday_id=<?php echo $result1['holiday_id'];?>&city=<?php echo $result1['holiday_city'];?>&date=$date&day=$day'>-->
<!-- <input type='submit' name="bookholiday" class='btn btn-warning' value='Book Now' />-->
 <a href='book_holiday.php?holiday_id=<?php echo $result1['holiday_id'];?>&city=<?php echo $result1['holiday_city'];?>'><input type='btn'class='btn btn-warning' value='Book Now'></a>
 </form> </div></div></div>
<?php
include 'footer.php';
?>
