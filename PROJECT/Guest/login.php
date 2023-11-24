<?php
session_start();
include("../Assests/Connection/connection.php");
include("Header.php");
if(isset($_POST['btn_sub']))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	
	$seluser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$datas=mysql_query($seluser);
	
    $selt="select * from tbl_theatre where theatre_email='".$email."' and theatre_password='".$password."'";
	$datast=mysql_query($selt);
		
    $sela="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$datasa=mysql_query($sela);
	
	if($rowsa=mysql_fetch_array($datasa))
	{
		$_SESSION["aid"]=$rowsa["admin_id"];
		$_SESSION["aname"]=$rowsa["admin_name"];
		header("location:../Admin/homepage.php");
	}
	
	else if($rows=mysql_fetch_array($datast))
	{
		$_SESSION["tid"]=$rows["theatre_id"];
		$_SESSION["tname"]=$rows["theatre_name"];
		header("location:../Theatre/homepage.php");
	}
	
	else if($row=mysql_fetch_array($datas))
	{
		$_SESSION["uid"]=$row["user_id"];
		$_SESSION["uname"]=$row["user_name"];
		header("location:../User/homepage.php");
	}
	else
	{
	echo "Invalid credentials";	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
	.text-box {
		padding:10px;
		border-radius:10px;
		background:transparent;
		color:white;
		border:1px white solid;
	}
	body {
		background-image:url("../Assests/Templates/Main/img/Login FOrm.jpg");
		background-size:cover;
	}
</style>
<body>
<div align="center">
  <table width="302" height="143" style="margin-top:140px;color:white;" cellpadding="10">
  <form id="form2" name="form2" method="post" action="">
    <tr>
      <td width="92">E-MAIL</td>
      <td width="110">
        <label for="txt_email"></label>
        <input type="text" name="txt_email" class="text-box" id="txt_email" required />
     </td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td>
        <label for="txt_password"></label>
        <input name="txt_password" type="password" class="text-box"  required id="txt_password" /> <!--  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" class="text-box" value="Login" />
          </div>
      </td>
    </tr></form>
  </table>
</div>
</body>
</html>
<?php 
include("Footer.php");
?>