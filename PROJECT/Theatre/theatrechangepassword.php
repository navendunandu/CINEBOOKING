<?php
session_start();
include("../Assests/connection/connection.php");
if(isset($_POST['btn_sub']))
{
	$password=$_POST['txt_currentpassword'];
	$newpassword=$_POST['txt_newpassword'];
	$repassword=$_POST['txt_repassword'];
	
	$selQry= "select * from tbl_theatre where theatre_id = ".$_SESSION['tid'];
	$data=mysql_query($selQry);
	$result = mysql_fetch_array($data);
	$currentPassword = $result['theatre_password'];
	
	if($password==$currentPassword)
	{
		if($newpassword==$repassword)
		{
			 $update = "update tbl_theatre set theatre_password='".$newpassword."' where theatre_id=".$_SESSION['tid'];	
	         mysql_query($update);
		}
		else
		{
			echo "not match";
		}
	}
	else
	{
		echo "invalid current password";
	}
    
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <h1 align="center">CHANGE PASSWORD</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
  
    <table width="200" border="1">
      <tr>
        <td>Current password</td>
        <td><label for="txt_currentpassword"></label>
        <input type="text" name="txt_currentpassword" id="txt_currentpassword" /></td>
      </tr>
      <tr>
        <td>New password</td>
        <td><label for="txt_newpassword"></label>
        <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
      </tr>
      <tr>
        <td>Re-password</td>
        <td><label for="txt_repassword"></label>
        <input type="text" name="txt_repassword" id="txt_repassword" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
        </div></td>
      </tr>
    </table>
  </div>
  
</form>


</body>
</html>