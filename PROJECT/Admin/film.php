<?php
include("../Assests/connection/connection.php");   
include("Header.php");                                                                                                                                                                            
If(isset($_POST["btn_sub"]))
{
	$filmid=$_POST["film_name"];
	$description=$_POST["description"];
    $duration=$_POST["duration"];
	$language=$_POST["language_name"];
	$certificate=$_POST["filmcertification_id"];
	$genre=$_POST["genre_id"];
	
	$trailer=$_FILES['trailer']['name'];
	$path=$_FILES['trailer']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/Admin/".$trailer);	
	
	$poster=$_FILES['poster']['name'];
	$path=$_FILES['poster']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/Admin/".$poster);



	$insqry="insert into tbl_film(film_name,description,duration,trailer,poster,language_id,certification_id,genres_id) values('".$filmid."','".$description."','".$duration."','".$trailer."','".$poster."','".$language."','".$certificate."','".$genre."')";
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('Film inserted')
		window.location="film.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		window.location="film.php"
		</script>
        <?php
	}
}

if($_GET["fid"])
{
	$fid=$_GET["fid"];
	$delqry="delete from tbl_film where film_id='$fid'";
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
<div class="container">
    <h1 class="text-center">Cast_Type</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 500px;" align='center'>
                <tr>
                    <td>Cast Type</td>
                    <td>
                        <input type="text" class="form-control" name="crewtype_name" id="crewtype_id" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_sub" id="btn_sub" value="SAVE" />
                        </div>
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table class="table table-bordered">
                <tr>
                    <td>Sl.no</td>
                    <td>Crew Type</td>
                    <td>Action</td>
                </tr>
                <?php 
                $selqry = "select * from tbl_crewtype";
                $data = mysql_query($selqry);
                $i = 0;
                while($row = mysql_fetch_array($data))
                {
                    $i++;
                ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $row["crewtype_name"]?></td>
                    <td><a href="crewtype.php?sndid=<?php echo $row["crewtype_id"]?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </form>
</div>

</body>
</html>
<?php 
include("Footer.php");
?>