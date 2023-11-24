<?php
include("../Assests/connection/connection.php");
session_start();                                                                                                                                                                               
If(isset($_POST["btn_sub"]))
{
	$screenname=$_POST["screen_name"];
	$screenspec=$_POST["screenspec_name"];
	$soundspec=$_POST["soundspec_name"];
	$screenno=$_POST["seatnumber"];
	

	$insqry="insert into tbl_screen(screen_name,screen_specification,sound_specification,screenno,theatre_id) values('".$screenname."','".$screenspec."','".$soundspec."','".$screenno."','".$_SESSION["tid"]."')";
	
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('screen inserted')
		window.location="screen.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		window.location="screen.php"
		</script>
        <?php
	}
}

if($_GET["sid"])
{
	$sid=$_GET["sid"];
	$delqry="delete from tbl_screen where screen_id='$sid'";
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
<h1 align="center">Screens</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="459" height="267" border="1">
      <tr>
        <td>Screen name</td>
        <td><label for="screen_name"></label>
        <input type="text" name="screen_name" id="screen_id" /></td>
      </tr>
      <tr>
        <td>Screen Specification</td>
        <td><label for="screenspec_id"></label>
          <select name="screenspec_name" id="screenspec_id">
                <option value="">.....SELECT.....</option>
             <?php
		$selQry1 = "select * from tbl_screenspec";
		$data1 = mysql_query($selQry1);
		while($row1 = mysql_fetch_array($data1))
		{
		?>
        <option value="<?php echo $row1['screenspec_id']  ?>"><?php echo $row1['screenspec_name']  ?></option>
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
		$selQry2 = "select * from tbl_soundspec";
		$data2 = mysql_query($selQry2);
		while($row2 = mysql_fetch_array($data2))
		{
		?>
        <option value="<?php echo $row2['soundspec_id']  ?>"><?php echo $row2['soundspec_name']  ?></option>
        <?php
		}
		?>
        </select></td>
      </tr>
      <tr>
        <td>number of seats</td>
        <td><label for="screenseats"></label>
          <label for="seatnumber"></label>
          <input type="text" name="seatnumber" id="seatnumber" />
</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="ADD" />
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="858" height="221" border="1">
      <tr>
        <td>Sl no</td>
        <td>Screen Name</td>
        <td>Screen specification</td>
        <td>Sound specification</td>
        <td>number of Seats</td>
        <td>Action</td>
      </tr>
     
            <?php 
	$selqry="select * from tbl_screen s inner join tbl_screenspec c on c.screenspec_id=s.screen_specification inner join tbl_soundspec d on d.soundspec_id=s.sound_specification where theatre_id='".$_SESSION["tid"]."'";
	$data=mysql_query($selqry);
	$i=0;
	while($rows=mysql_fetch_array($data))
	{
	
		$i++;
		?>
    <tr>
      <td height="58"><?php echo $i ?></td>
      <td><?php echo $rows["screen_name"]?></td>
      <td><?php echo $rows["screenspec_name"]?></td>
       <td><?php echo $rows["soundspec_name"]?></td>
        <td><?php echo $rows["screenno"]?></td>
      <td>
      <a href="screen.php?sid=<?php echo $rows["screen_id"]?>">DELETE</a>
      <a href="showtime.php?sid=<?php echo $rows["screen_id"]?>">Assign Movie</a>
      </td>
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