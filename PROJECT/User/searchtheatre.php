<?php

include("../Assests/connection/connection.php");                                                  

If(isset($_POST["btn_sub"]))
{
	$disid=$_POST["district_id"];
	$place=$_POST["place_id"];
	$name=$_POST['theatre_name'];
	$contact=$_POST['theatre_contact'];
	$address=$_POST['theatre_address'];

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">

    <input type="hidden" name="movie_id" id="movie_id" value="<?php echo $_GET['fid'] ?>" />
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h1>SEARCH THEATRE    </h1>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="718" height="89" border="1">
      <tr>
        <td width="33" height="85"><div align="center">District</div></td>
        <td width="33"><label for="district_id"></label>
          <div align="center">
            <select name="district_id" id="district_id" onChange="getPlace(this.value),getTheatre()">
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

        </select>
        </div></td>
        <td width="33"><div align="center">Place</div></td>
        <td width="33"><label for="place_id"></label>
          <div align="center">
           <select name="place_id" id="place_id" onchange="getTheatre()">
          <option value="">.....SELECT.....</option>
        </select>
        </div></td>
        <td width="44"><div align="center">
          <input type="submit" name="btn_sub" id="btn_sub" value="Search" />
        </div></td>
      </tr>
    </table>
  </div>
  <div id="search">
    <div align="center">
      <table border="1">
        <tr>
          <?php
		  
	$selTheatre1="SELECT *
FROM tbl_theatre t
INNER JOIN tbl_place p ON t.theatre_place = p.place_id
INNER JOIN tbl_district d ON p.district_id = d.district_id inner join tbl_screen s on s.theatre_id=t.theatre_id inner join tbl_showtime st on st.screen_id=s.screen_id where st.film_id=".$_GET['fid'];
	$data1 = mysql_query($selTheatre1);
	$i=0;
	while($s1=mysql_fetch_array($data1))
	{
		$i++;
		?>
          <td>
            <p align="center" style="padding:'2rem', margin:'10px'">
              <?php echo $s1['district_name'] ?><br />
              <?php echo $s1['place_name'] ?><br />
              <?php echo $s1['theatre_name'] ?><br />
              <?php echo $s1['theatre_address'] ?><br />
              <?php echo $s1['theatre_contact'] ?><br />
              <a href="booking.php?tid=<?php echo $s1['theatre_id'] ?>&fid=<?php echo $_GET['fid'] ?>">book film</a>
            </p>
          </td>
          <?php
	 if($i==5)
	 {
		 echo "</tr><tr>";
		 $i=0;
	 }
		}
		?>
          </tr>
        </table>
    </div>
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

function getTheatre(){
	var movie=document.getElementById('movie_id').value;
	var district=document.getElementById('district_id').value;
	var place=document.getElementById('place_id').value;
	console.log(movie)
	$.ajax({
		url: "../Assests/AjaxPages/AjaxTheatreSearch.php?fid=" +  movie + "&&dis=" + district  + "&&pla=" + place,
		success: function(data) {
		
			$("#search").html(data);

		}
	});
}
</script>
</html>