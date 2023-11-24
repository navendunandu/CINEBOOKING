<?php
include("../Assests/connection/connection.php");
include("Header.php");
if(isset($_POST['btn_sub']))
{
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_conatct'];
	$district=$_POST['district_id'];
	$place=$_POST['place_id'];
	$photo=$_POST['txt_filefield'];
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	
	$photo=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/User/".$photo);
	
	$ins="insert into tbl_user(user_name,user_contacts,user_district,user_place,user_photo,user_email,user_password)
	values('".$name."','".$contact."','".$district."','".$place."','".$photo."','".$email."','".$password."')";
	echo $ins;
if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="user.php";
		</script>
        <?php
	}
	else
	{
		echo "Insert Failed";
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
		background-image:url("../Assests/Templates/Main/img/movie1.jpg");
		background-size:cover;
	}
</style>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div align="center">
    
    <table width="375" height="300"  style="margin-top:40px;color:white;" cellpadding="10">
      <tr>
        <td>Name</td>
        <td><label for="txt_name2"></label>
        <input type="text" pattern="^[A-Z]+[a-zA-Z ]*$" class="text-box" required name="txt_name" id="txt_name2" /></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><label for="txt_conatct"></label>
        <input type="text" required name="txt_conatct" class="text-box" id="txt_conatct" pattern="[7-9]{1}[0-9]{9}" /></td>
      </tr>
      <tr>
        <td>District</td>
        <td><label for="district_id"></label>
          <select name="district_id" id="district_id" class="text-box" required onChange="getPlace(this.value)">
            <option value="">.....SELECT.....</option>
             <?php
		$selQry = "select * from tbl_district";
		$data = mysql_query($selQry);
		while($row = mysql_fetch_array($data))
		{
		?>
        <option value="<?php echo $row['district_id']  ?>"><?php echo $row['district_name']  ?></option>
        <?php
		}
		?>

        </select></td>
      </tr>
      <tr>
        <td height="36">Place</td>
        <td><label for="place_id"></label>
          <select name="place_id" id="place_id" class="text-box" required>
          <option value="">.....SELECT.....</option>
        </select></td>
      </tr>
      <tr>
          <td><label for="txt_filefield">Photo</label></td>
          <td><label for="txt_filefield"></label>
          <input type="file" name="txt_filefield"  id="txt_filefield" required /></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><label for="txt_email"></label>
        <input type="text" name="txt_email" class="text-box" id="txt_email" required/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="txt_password"></label>
        <input type="text" name="txt_password" class="text-box" id="txt_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="txt_password" /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" class="text-box" value="Register" />
        </div></td>
      </tr>
  </table>
    <!-- <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
   
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p> -->
    <br>
  </div>
</form>
</body>

<script src="../Assests/JQ/jQuery.js"></script>
<script>
  function getPlace(did)
{
	$.ajax({
		url: "../Assests/AjaxPages/ajaxplace.php?did=" + did,
		success: function(data) {
		
			$("#place_id").html(data);

		}
	});
}

</script>


</html>
<?php
include("Footer.php");
?>