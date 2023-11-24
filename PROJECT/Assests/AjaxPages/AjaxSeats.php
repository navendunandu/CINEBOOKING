<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_showtime s inner join tbl_screen sc on s.screen_id=sc.screen_id where showtime_id=".$_GET['show'];
$res=mysql_query($selQry);
$data=mysql_fetch_array($res);
?>
<div class="seat-box">
  <div class="row">
    <?php

        $seats = $data['screenno'];
        $time=$data['showtime'];
        $date=$_GET['date'];
for ($i = 1; $i <= $seats; $i++) {
  ?>
    <label class="checkbox-container">
      <input type='checkbox' id='custom-checkbox'
      <?php
    $selCheck="SELECT * FROM tbl_seatbooking sb inner join tbl_booking b on b.booking_id=sb.booking_id inner join tbl_showtime st on st.showtime_id=b.showtime_id where sb.seat_no=".$i." and st.showtime='".$time."' and booking_date='".$date."' and booking_status=1";
    $resCheck=mysql_query($selCheck);
    if(mysql_fetch_array($resCheck)){
        echo "disabled";
    }
    ?>
      name='seats[]' value='<?php echo $i ?>' onclick="getTotal(this.value)">
      <i class="fas fa-couch"></i>
      <p class="seat-label" align="center"><?php echo $i ?></p>
    </label>

    <?php
//    echo $selCheck="SELECT * FROM tbl_seatbooking sb inner join tbl_booking b on b.booking_id=sb.booking_id inner join tbl_showtime st on st.showtime_id=b.showtime_id where sb.seat_no=".$i." and st.showtime='".$time."' and booking_date='".$date."'";

    if ($i % 10 == 0) {
        echo "<br>
    <hr />
    "; } else if ($i % 5 == 0) { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
    } ?>
  </div>
</div>
<table>
  <tr>
    <td>Ticket Price</td>
    <td><input
        type="text"
        name="ticketprice"
        id="ticketprice"
        readonly
        value="<?php echo $data['showtime_ticket'] ?>"
      />
    </td>
    <td>Tickets</td>
    <td><input type="text" name="ticketcount" id="ticketcount" readonly></td>
    <td>Total Amount</td>
    <td><input type="text" name="totalprice" id="totalprice" readonly></td>
  </tr>
</table>
<div align="center">
  <input type="submit" value="Submit" name="btnsubmit" />
</div>
