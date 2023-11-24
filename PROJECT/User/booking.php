<?php
include("../Assests/connection/connection.php");   
session_start();                                                                                                                                                                            
If(isset($_POST["btnsubmit"]))
{
	$show=$_POST["radst"];
	$date=$_POST["date"];
  $amount=$_POST["totalprice"];

	$insqry="insert into tbl_booking(showtime_id,booking_date,booking_amount,user_id) values('".$show."','".$date."','".$amount."','".$_SESSION['uid']."')";
	
	if(mysql_query($insqry)){
		$selBooking="select max(booking_id) as id from tbl_booking where user_id=".$_SESSION['uid'];
    $resBooking=mysql_query($selBooking);
    $dataBooking=mysql_fetch_array($resBooking);
    $booking_id=$dataBooking['id'];
    $seats = $_POST['seats'];
    foreach ($seats as $key => $value) {
     $insSeat="insert into tbl_seatbooking (booking_id,seat_no) values(".$booking_id.",".$value.")";
      if(mysql_query($insSeat)){
        echo "Inserted";
      }
    }
    ?>
    <script>
      window.location='Payment.php?bid=<?php echo $booking_id ?>'
    </script>
    <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		//window.location="showtime.php"
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
   .seat-box{
        display: flex;
    justify-content: center;
    margin: 30px;
      }
      .seat-label{
        margin: 0;
      }
        .checkbox-container {
      position: relative;
      display: inline-block;
      cursor: pointer;
      margin: 2px;
    }

    input[type="checkbox"] {
      display: none; /* Hide the default checkbox */
    }

    /* Style the Font Awesome icon */
    .fa-couch::before {
      font-size: 24px; /* Set the font size as needed */
    }

    /* Define styles for the checked state */
    input[type="checkbox"]:checked + i.fa-couch::before {
      /* Add styles for the checked state if desired */
      color:green;
    }
    input[type="checkbox" i]:disabled {
      color:blue;
    }

    /* Style the custom checkbox icon when it's disabled */
input[type="checkbox"]:disabled + i.fa-couch::before {
  color: blue; /* Change the background color for disabled state */
}

    input[type="submit"] {
      border: none;
      padding: 10px;
    background-color: #20af20;
    color: white;
    border-radius: 5px;
    width: 100px;
    }
    </style>
</head>

<body>
<h1 align="center">Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table border="1">
      <tr>
        <td>Date</td>
        <td><label for="date_id"></label>
        <input type="date" name="date" id="date_id" min="<?php echo date('Y-m-d'); ?>" /></td>
      </tr>
      <tr>
        <td>showtime</td>
        <td>
          <?php
          $selST="SELECT * from tbl_showtime st inner join tbl_screen s on s.screen_id=st.screen_id where film_id='".$_GET['fid']."' and theatre_id='".$_GET['tid']."'";
          $resST=mysql_query($selST);
          while($dataST=mysql_fetch_array($resST))
          {
            ?>
            
          <label><input onchange="getShowtime(<?php echo $dataST['showtime_id'] ?>)" type="radio" name="radst" id="radst" value="<?php echo $dataST['showtime_id'] ?>"><?php echo $dataST['screen_name'] ?></label> &nbsp;Time: <label><?php echo $dataST['showtime'] ?></label><br>
          <?php
          }
          ?>
        </td>
      </tr>
    </table>
    <div id='seats'></div>
</form>
</body>

<script src="../Assests/JQ/jQuery.js"></script>
<script>


  function getShowtime(showtime)
{
  var date = document.getElementById('date_id').value;
  if(date==""){
    alert('Select a Date')
  }
  else{
  $.ajax({
		url: "../Assests/AjaxPages/AjaxSeats.php?show=" + showtime+"&date="+date,
		success: function(data) {
			$("#seats").html(data);
		}
	});
}
}
let myArray = [];
function getTotal(sn){

  if (myArray.includes(sn)) {
    // Value already exists, so remove it
    const index = myArray.indexOf(sn);
    if (index !== -1) {
      myArray.splice(index, 1);
    }
  } else {
    // Value doesn't exist, so add it
    myArray.push(sn);
  }
  var count = myArray.length;
  console.log(count);

  var ticketPrice=document.getElementById('ticketprice').value;
  var total=ticketPrice*count;
  document.getElementById('totalprice').value=total;
  document.getElementById('ticketcount').value=count;
}
</script>
</html>