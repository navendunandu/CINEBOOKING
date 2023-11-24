<?php
include("../Assests/connection/connection.php");                                         
If(isset($_POST["btn_sub"]))
{
	$complaint_title=$_POST["complaint_name"];
	$message=$_POST["message_name"];
	$complaintcontent_title=$_POST["complaintcontent_name"];
   


	$insqry="insert into tbl_complaint(complaint_title,complaint_content) values('".$complaint_title."','".$complaintcontent_title."')";
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('complaint submitted')
		window.location="complaint.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		window.location="complaint.php"
		</script>
        <?php
	}
}

if($_GET["cid"])
{
	$cid=$_GET["cid"];
	$delqry="delete from tbl_complaint where complaint_id='$cid'";
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
 <h1 align="center">COMPLAINT</h1>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
   
    <table width="200" border="1">
      <tr>
        <td>Complaint Title</td>
        <td><label for="complaint_id"></label>
        <input type="text" name="complaint_name" id="complaint_id" /></td>
      </tr>
      <tr>
        <td>complaint Content</td>
        <td><label for="complaintcontent_id">
          <textarea name="complaintcontent_name" id="complaintcontent_id" cols="45" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td>Message</td>
        <td>&nbsp;</td>
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