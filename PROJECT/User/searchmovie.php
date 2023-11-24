<?php

include("../Assests/connection/connection.php");                                                  

If(isset($_POST["btn_sub"]))
{
	$disid=$_POST["district_id"];
	$place=$_POST["place_id"];
	$screenspec=$_POST["screenspec_id"];
    $soundspec=$_POST["soundspec_id"];


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center"><strong>SEARCH </strong>MOVIE</h1>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="1131" height="111" border="1">
      <tr>
        <td width="142">Film language</td>
        <td width="188"><label for="txt_filmlanguage"></label>
          <label for="language_id"></label>
          <select name="language_name" id="language_id" onchange="getTheatre()">
                <option value="">.....SELECT.....</option>
             <?php
		$selQry1 = "select * from tbl_language";
		$data1 = mysql_query($selQry1);
		while($row1 = mysql_fetch_array($data1))
		{
		?>
        <option value="<?php echo $row1['language_id']  ?>"><?php echo $row1['language_name']  ?></option>
        <?php
		}
		?>
        </select></td>
        <td width="118">Film-genres        </td>
        <td width="186"><label for="genres"></label>
          <label for="genre_id"></label>
          <div align="left">
            <select name="genre_id" id="genre_id" onchange="getTheatre()">
              <option value="">.....SELECT.....</option>
              <?php
		$selQry3 = "select * from tbl_genres";
		$data3 = mysql_query($selQry3);
		while($row3 = mysql_fetch_array($data3))
		{
		?>
              <option value="<?php echo $row3['genres_id']  ?>"><?php echo $row3['genres_name']  ?></option>
              <?php
		}
		?>
            </select>
        </div></td>
        <td width="162"><p>Film-certification</p></td>
        <td width="182"><label for="language"></label>
          <label for="filmcertification_id"></label>
          <select name="filmcertification_id" id="filmcertification_id" onchange="getTheatre()">
            <option value="">.....SELECT.....</option>
            <?php
		$selQry2 = "select * from tbl_certification";
		$data2 = mysql_query($selQry2);
		while($row2 = mysql_fetch_array($data2))
		{
		?>
            <option value="<?php echo $row2['certification_id']  ?>"><?php echo $row2['certification_name']  ?></option>
            <?php
		}
		?>
        </select></td><td width="107">  <input type="submit" name="btn_sub" id="btn_sub" value="SEARCH" /></td>
        
      </tr>
    </table>
    <div id="search">
    <table border="1">
    <tr>
      <?php
	$selTheatre="select * from tbl_film f inner join tbl_language l on l.language_id=f.language_id inner join tbl_certification c on c.certification_id=f.certification_id inner join tbl_genres g on g.genres_id=f.genres_id";
	$data = mysql_query($selTheatre);
	$i=0;
	while($s=mysql_fetch_array($data))
	{
		$i++;
		?>
        <td>
      <p align="center" style="padding:'2rem', margin:'10px'">
            <?php echo $s['film_name'] ?><br />
            <?php echo $s['language_name'] ?><br />
            <?php echo $s['genres_name'] ?><br />
            <?php echo $s['certification_name'] ?><br />
            <a href="searchtheatre.php?fid=<?php echo $s['film_id'] ?>">Select Theatre</a>
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
<p align="center">&nbsp;</p>
</body>
<script src="../Assests/JQ/jQuery.js"></script>
<script>
function getTheatre(){
	
	var language=document.getElementById('language_id').value;
	var genre=document.getElementById('genre_id').value;
	var cert=document.getElementById('filmcertification_id').value;
	$.ajax({
		url: "../Assests/AjaxPages/AjaxMovieSearch.php?lg=" + language + "&gn=" + genre + "&cr=" + cert,
		success: function(data) {
		
			$("#search").html(data);

		}
	});
}
</script>
</html>