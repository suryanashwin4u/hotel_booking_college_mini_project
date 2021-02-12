<script type="text/javascript" src="js/min.js"></script>
<link href="css/jquery.ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap3.css" />
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
function chng(){
 document.getElementById('ret').style.display='block';
 document.getElementById('ret1').style.display='none';
 document.getElementById('rel').style.display='block';
 document.getElementById('rel1').style.display='none';
 }
function jsFunction(val){
 document.getElementById("city").value=val;
 }
</script>
 <h2>Plan Your Travel</h2>
 <ul class="nav nav-tabs">
 <li class="active" id="tab1"><a data-toggle="tab" href="#flight"><img src='image/flight.png' class='img-class'> Flight</a></li>
 <li id="tab2"><a data-toggle="tab" href="#hotel"><img src='image/hotel.png' class='img-class'> Hotel</a></li>
 <li id="tab3"><a data-toggle="tab" href="#hotelflight"><img src='image/FlightHotel.png' class='img-class'> Hotel+Flight</a></li>
 <li id="tab4"><a data-toggle="tab"href="#holiday"><img src='image/holiday.png' class='img-class'> Holidays</a></li>
 </ul>
 <div class="tab-content">
 <div id="flight" class="tab-pane fade in active">
 <h3>Flight</h3> <div>
 <form role="form" method="post">
 <div class="form-group">
 <table> <tr>
 <td style="padding-right: 20px;"><label for="from">Leaving from</label>
 <select class="form-control" id="from" name="from">
 <option></option>
 <option>Goa</option>
 <option>Kerala</option>
 <option>Sikkim</option>
 <option>Leh Ladakh</option>
 </select> </td>
  <td><label for="to">Going to</label>
 <select class="form-control" id="to" name="to">
 <option></option> <option>Goa</option> <option>Kerala</option>
 <option>Sikkim</option> <option>Leh Ladakh</option> </select></td>
  </tr> <tr>
 <td style="padding-right: 20px;"><label for="depart">Departure</label><input type="text" class="form-control" name="datepicker_depart" id="datepicker_depart"></td>
 <td id="ret" style="display:none;"><label for="return">Return</label><input type="text" class="form-control" name="datepicker_return" id="datepicker_return"></td>
 <td id="ret1" onclick="chng();"><img src='image/return.png' class='img-class' style="margin-top: 5px;"></td>
 </tr>  <tr>
 <td style="padding-right: 20px;">
<label for="adult">Adult</label>
 <select class="form-control" id="adult" name="adult">
 <option value="1">1</option> <option value="2">2</option> <option value="3">3</option>
 <option value="4">4</option> <option value="5">5</option> </select>
 </td>
 <td style="padding-right: 20px;">
 <label for="child">Child</label>
 <select class="form-control" id="child" name="child">
 <option value="0">0</option> <option value="1">1</option> <option value="2">2</option>
 <option value="3">3</option> <option value="4">4</option>
 </select>
 </td> </tr> <tr> <td colspan="2">
 <input type="submit" name="flightsubmit" class="btn btn-primary" value="Find Flights" style="width:120px; height:50px; margin-top:20px;" />
 </td> </tr>  </table> </div> </form>  </div> </div> <div id="hotel" class="tab-pane fade">
 <h3>Hotel</h3> <div>
 <form role="form" method="post"> <table> <tr>
 <td style="padding-right: 20px;"><label for="city">Going to</label>
 <select class="form-control" id="city" name="city">
 <option></option> <option>Goa</option> <option>Kerala</option> <option>Sikkim</option>
 <option>Leh Ladakh</option>
 </select></td> </tr> <tr>
 <td style="padding-right: 20px;"><label for="check_in">Check-in</label><input type="text" class="form-control" name="datepicker_in" id="datepicker_in"></td>
 <td style="padding-right: 20px;"><label for="check_out">Check-out</label><input type="text" class="form-control" name="datepicker_out" id="datepicker_out"></td>
  </tr> <tr> <td style="padding-right: 20px;">
<label for="adult">Adult</label>
 <select class="form-control" id="adult" name="adult">
 <option value="1">1</option> <option value="2">2</option> <option value="3">3</option>
 <option value="4">4</option> <option value="5">5</option> </select> </td> <td style="padding-right: 20px;"> <label for="child">Child</label>
 <select class="form-control" id="child" name="child"> 
<option value="0">0</option> <option value="1">1</option> <option value="2">2</option>
 <option value="3">3</option> <option value="4">4</option> </select> </td> <td>
 <label for="room">Rooms</label>
 <select class="form-control" id="room" name="room">
 <option value="1">1</option>
 <option value="2">2</option> <option value="3">3</option> <option value="4">4</option>
 </select> </td> </tr> <tr> <td colspan="2">
 <input type="submit" name="findhotel" class="btn btn-primary" value="Find Hotel" style="width:120px; height:50px; margin-top:20px;" />
 </td> </tr> </table> </form> </div> </div>
 <div id="hotelflight" class="tab-pane fade">
 <h3>Hotel + Flight</h3> <div>
 <form role="form" method="post"> <table> <tr>
 <td style="padding-right: 20px;"><label for="start">From</label>
 <select class="form-control" id="end" name="start">
 <option value=''>Select</option>
 <option value='goa'>Goa</option>
 <option value='kerala'>Kerala</option>
 <option value='sikkim'>Sikkim</option>
 <option value='leh ladakh'>Leh Ladakh</option>
 </select></td>
 <td style='padding-right:20px;'><label for='end'>To</label>
 <select class='form-control' id='end' name='end' onChange="jsFunction(this.value)" >
 <option value=''>Select</option>
 <option value='Goa'>Goa</option>
 <option value='Kerala'>Kerala</option>
 <option value='Sikkim'>Sikkim</option>
 <option value='Leh Ladakh'>Leh Ladakh</option>
 </select></td> </tr> <tr>
 <td style="padding-right: 20px;"><label for="depart">Departure</label><input type="text" class="form-control" name="datepicker_departure" id="datepicker_departure" /></td>
 <td id="rel" style="display:none;"><label for="dest">Return</label><input type="text" class="form-control" name="datepicker_dest" id="datepicker_dest" /></td>
 <td id="rel1" onclick="chng();"><img src='image/return.png' class='img-class' style="margin-top: 5px;"></td> </tr> <tr>
 <td style="padding-right: 20px;"><label for="city">Hotel City</label>
 <input type='text' id='city' name='city' class='form-control' > 
 </td> </tr>  <tr>
 <td style="padding-right: 20px;"><label for="check_in">Check-in</label><input type="text" class="form-control" name="datepicker_checkin" id="datepicker_checkin" /></td>
 <td style="padding-right: 20px;"><label for="check_out">Check-out</label><input type="text" class="form-control" name="datepicker_checkout" id="datepicker_checkout" /></td>
 </tr> <tr> <td style="padding-right: 20px;">
<label for="adult">Adult</label>
 <select class="form-control" id="adult" name="adult">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 </select> </td>
 <td style="padding-right: 20px;">
 <label for="child">Child</label>
 <select class="form-control" id="child" name="child">
 <option value="0">0</option> 
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="5">4</option>
 </select> </td> <td>
 <label for="room">Rooms</label>
 <select class="form-control" id="room" name="room">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 </select> </td> </tr> <tr>
 <td colspan="2">
 <input type="submit" name="hotelflight" class="btn btn-primary" value="Find Hotel+Flight" style="width:150px; height:50px; margin-top:20px;" />
 </td> </tr> </table> </form> </div> </div>
 <div id="holiday" class="tab-pane fade">
 <h3>Holidays</h3>
 <div>
 <form method="post"> <table> <tr>
 <td style="padding-right: 20px;"><label for="goto">I Want to go</label>
 <select class="form-control" id="goto" name="goto">
 <option value="">Select</option>
 <option value="Goa">Goa</option>
 <option value="Kerala">Kerala</option>
 <option value="Sikkim">Sikkim</option>
 <option value="Leh Ladakh">Leh Ladakh</option>
 </select></td> </tr> <tr>
 <td style="padding-right: 20px;"><label for="date">Date</label><input type="text" class="form-control" name="date" id="datepicker_date"></td>
 <td style="padding-right: 20px;"><label for="days">No. of Days</label>
 <select class="form-control" id="days" name="days">
 <option></option>
 <option value="3 night">3 NIGHTS</option>
 <option value="5 night">5 NIGHTS</option>
 <option value="7 night">7 NIGHTS</option>
 </select></td> </tr> <tr>
 <td colspan="2">
 <input type="submit" name="findholidays" class="btn btn-primary" value="Find Holidays" style="width:120px; height:50px; margin-top:20px;" />
 </td> </tr>  </table> </form> </div>  </div> </div>
<script>
 $(document).ready(function() {
 $("#datepicker_depart").datepicker();
 });
 </script>
<script>
 $(document).ready(function() {
 $("#datepicker_return").datepicker();
 });
 </script>
 <script>
 $(document).ready(function() {
 $("#datepicker_in").datepicker();
 });
 </script>
<script>
 $(document).ready(function() {
 $("#datepicker_out").datepicker();
 });
 </script>
 <script>
 $(document).ready(function() {
 $("#datepicker_departure").datepicker();
 });
 </script>
<script>
 $(document).ready(function() {
 $("#datepicker_dest").datepicker();
 });
 </script>
 <script>
 $(document).ready(function() {
 $("#datepicker_checkin").datepicker();
 });
 </script>
<script>
 $(document).ready(function() {
 $("#datepicker_checkout").datepicker();
 });
 </script>
 <script>
 $(document).ready(function() {
 $("#datepicker_date").datepicker();
 });
 </script>
