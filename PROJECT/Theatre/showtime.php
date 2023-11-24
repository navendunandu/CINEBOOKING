<?php
include("../Assests/connection/connection.php");                                                                                                                                                                               
If(isset($_POST["btn_sub"]))
{
	$showtime=$_POST["show_time"];
	$film=$_POST["film_name"];
	$screen=$_GET["sid"];
	$screenspec=$_POST["screenspec_name"];
	$soundspec=$_POST["soundspec_name"];
    $ticketamount=$_POST["ticket_name"];
	

	$insqry="insert into tbl_showtime(showtime,film_id,screen_id,screenspec_id,soundspec_id,showtime_ticket) values('".$showtime."','".$film."','".$screen."','".$screenspec."','".$soundspec."','".$ticketamount."')";
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('showtime inserted')
		//window.location="showtime.php"
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

if($_GET["stid"])
{
	$stid=$_GET["stid"];
	$delqry="delete from tbl_showtime where showtime_id='$stid'";
	mysql_query($delqry);
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">Show_Time</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="200" border="1">
      <tr>
        <td>Show time</td>
        <td><label for="showtime_id"></label>
        <input type="time" name="show_time" id="show_id" /></td>
      </tr>
      <tr>
        <td>film</td>
        <td><label for="film_id"></label>
          <select name="film_name" id="film_id">
                  <option value="">.....SELECT.....</option>
             <?php
		$selQry1 = "select * from tbl_film";
		$data1 = mysql_query($selQry1);
		while($row1 = mysql_fetch_array($data1))
		{
		?>
        <option value="<?php echo $row1['film_id']  ?>"><?php echo $row1['film_name']  ?></option>
        <?php
		}
		?>
        </select></td>
      </tr>
      <tr>
        <td>screen specification</td>
        <td><label for="screenspec_id"></label>
          <select name="screenspec_name" id="screenspec_id">
                  <option value="">.....SELECT.....</option>
             <?php
		$selQry3 = "select * from tbl_screenspec";
		$data3 = mysql_query($selQry3);
		while($row3 = mysql_fetch_array($data3))
		{
		?>
        <option value="<?php echo $row3['screenspec_id']  ?>"><?php echo $row3['screenspec_name']  ?></option>
        <?php
		}
		?>
        </select></td>
      </tr>
      <tr>
        <td>sound specification</td>
        <td><label for="soundspec_id"></label>
          <select name="soundspec_name" id="soundspec_id">
                  <option value="">.....SELECT.....</option>
             <?php
		$selQry4 = "select * from tbl_soundspec";
		$data4 = mysql_query($selQry4);
		while($row4 = mysql_fetch_array($data4))
		{
		?>
        <option value="<?php echo $row4['soundspec_id']  ?>"><?php echo $row4['soundspec_name']  ?></option>
        <?php
		}
		?>
        </select></td>
      </tr>
      <tr>
        <td>ticket amount</td>
        <td><label for="ticket_name"></label>
        <input type="text" name="ticket_name" id="ticket_name" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="ADD" />
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="913" height="261" border="1">
      <tr>
        <td><p>Sl no</p></td>
        <td>Show Time</td>
        <td>Film Name</td>
        <td>Screen</td>
        <td>Screen Specification</td>
        <td>Sound specification</td>
        <td>Ticket Amount</td>
        <td>Action</td>
      </tr>
       
            <?php 
	$selqry="select * from tbl_showtime s inner join tbl_screenspec c on c.screenspec_id=s.screenspec_id inner join tbl_soundspec d on d.soundspec_id=s.soundspec_id inner join tbl_film f on f.film_id=s.film_id inner join tbl_screen n on n.screen_id=s.screen_id";
	$data=mysql_query($selqry);
	$i=0;
	while($rows=mysql_fetch_array($data))
	{
	
		$i++;
		?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $rows["showtime"]?></td>
        <td><?php echo $rows["film_name"]?></td>
       <td><?php echo $rows["screen_name"]?></td>
        <td><?php echo $rows["screenspec_name"]?></td>
       <td><?php echo $rows["soundspec_name"]?></td>
        <td><?php echo $rows["showtime_ticket"]?></td>
          <td><a href="showtime.php?stid=<?php echo $rows["showtime_id"]?>">DELETE</a></td>
    </tr>
    <?php
	}
	?>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>