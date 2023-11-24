<?php
session_start();
include("../Assests/connection/connection.php");
$selqry="select * from tbl_theatre t inner join tbl_place p on p.place_id=t.theatre_place inner join tbl_district d on d.district_id=p.district_id where theatre_id='".$_SESSION['tid']."' and theatre_name='".$_SESSION['tname']."'";
$data=mysql_query($selqry);
$row=mysql_fetch_array($data)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">THEATRE PROFILE</h1>
<div align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="274" height="222" border="1">
    <tr>
      <td width="192">Theatre Name</td>
      <td width="66">
     <?php echo $row["theatre_name"]?>
      </td>
    </tr>
    <tr>
      <td>Theatre Conatct</td>
      <td>  <?php echo $row["theatre_contact"]?>
        </td>
    </tr>
    <tr>
      <td>Theatre E-mail</td>
      <td><?php echo $row["theatre_email"]?></td>
    </tr>
    <tr>
      <td>Theatre District</td>
      <td><?php echo $row["district_name"]?></td>
    </tr>
    <tr>
      <td>Theatre Place</td>
      <td>
        <?php echo $row["place_name"]?></td>
    </tr>
  </table>
  </form>
</div>
<div align="center"></div>

</body>
</html>