<?php
include("../Assests/connection/connection.php");
include("Header.php");
if(isset($_POST['btn_sub']))
{
	$name=$_POST['theatre_name'];
	$contact=$_POST['theatre_contact'];
	$place=$_POST['place_id'];
	$address=$_POST['theatre_address'];
	$email=$_POST['theatre_email'];
	$password=$_POST['txt_password'];
	
	$license=$_FILES['theatre_license']['name'];
	$path=$_FILES['theatre_license']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/Theatre/".$license);
	
	$ins="insert into tbl_theatre(theatre_name,theatre_contact,theatre_place,theatre_address,theatre_email,theatre_password,theatre_license)
	values('".$name."','".$contact."','".$place."','".$address."','".$email."','".$password."','".$license."')";
	echo $ins;
if(mysql_query($ins))
	{
		?>
        <script>
			alert("Query Inserted")
			window.location="theatre.php";
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
<h1 align="center">Theatre_Registration</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div align="center">
    <table width="200"  style="margin-top:40px;color:white;" cellpadding="10">
      <tr>
        <td>Name</td>
        <td><label for="theatre"></label>
        <input type="text"  pattern="^[A-Z]+[a-zA-Z ]*$" class="text-box" required name="theatre_name" id="theatre_name" /></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><label for="theatre_contact"></label>
        <input type="text" required name="theatre_contact" class="text-box" id="theatre_contact" pattern="[7-9]{1}[0-9]{9}" /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><label for="theatre_email"></label>
        <input type="text" name="theatre_email" id="theatre_email" required class="text-box"   />        <label for="theatre_address"></label></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>District</td>
        <td><label for="district"></label>
         <select name="district_id" required id="district_id" class="text-box" onChange="getPlace(this.value)">
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
        <td>Place</td>
        <td><label for="place_id"></label>
         <select name="place_id" required class="text-box"    id="place_id">
          <option value="">.....SELECT.....</option>
        </select></td>
      </tr>
      <tr>
        <td>password</td>
        <td><label for="txt_password"></label>
        <input type="text" name="txt_password" class="text-box" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="txt_password" /></td>
      </tr>
      <tr>
        <td>license</td>
        <td><label for="theatre_license"></label>
        <input type="file" name="theatre_license"required id="theatre_license"  /></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" class="text-box" required value="Register" />
        </div></td>
      </tr>
    </table>
  </div>
  <br>
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
include("footer.php");
?>