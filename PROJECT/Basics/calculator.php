<?php
$result="";
$no1="";
$no2="";
if(isset($_POST["btn_add"]))
{
	$no1=$_POST["txt_no1"];
	$no2=$_POST["txt_no2"];
	$result=$no1 + $no2;

}
if(isset($_POST["btn_sub"]))
{
	$no1=$_POST["txt_no1"];
	$no2=$_POST["txt_no2"];
	$result=$no1 - $no2;
}
if(isset($_POST["btn_mul"]))
{
	$no1=$_POST["txt_no1"];
	$no2=$_POST["txt_no2"];
	$result=$no1 * $no2;
}
if(isset($_POST["btn_div"]))
{
	$no1=$_POST["txt_no1"];
	$no2=$_POST["txt_no2"];
	$result=$no1 / $no2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculator</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="249" height="122" border="1">
  <tr>
    <td width="72">Number 1</td>
    <td width="161"><label for="txt_no1"></label></td>
  </tr>
  <tr>
    <td>Number 2</td>
    <td><label for="txt_no2"></label></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="btn_add" id="btn_add" value="Add" />
      <input type="submit" name="btn_sub" id="btn_sub" value="sub" />
   
        <input type="submit" name="btn_mul" id="btn_mul" value="mul" />
     
          <input type="submit" name="btn_div" id="btn_div" value="div" />
     
    </td>
    </tr>
  <tr>
    <td>result</td>
    <td><?php echo $result;?></td>
  </tr>
</table>
  </form>
</body>
</html>