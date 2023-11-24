<?php
include("../Assests/connection/connection.php");  
include("Header.php");                                                                                                                                                                             
If(isset($_POST["btn_sub"]))
{
	$castid=$_POST["cast_name"];
	$charid=$_POST["character_name"];
	
	
	$castphoto=$_FILES['file_image']['name'];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/Admin/".$castphoto);

	$insqry="insert into tbl_cast(cast_name,character_name,cast_photo) values('".$castid."','".$charid."','".$castphoto."')";
	mysql_query($insqry);
}

if($_GET["ctid"])
{
	$ctid=$_GET["ctid"];
	$delqry="delete from tbl_cast where cast_id='$ctid'";
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
    <h1 class="text-center">Cast</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" class="form-control" name="cast_name" id="cast_id" />
                    </td>
                </tr>
                <tr>
                    <td>Character Name</td>
                    <td>
                        <input type="text" class="form-control" name="character_name" id="character_id" />
                    </td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        <input type="file" class="form-control-file" name="cast_photo" id="cast_photo" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btn_sub" id="btn_sub" value="ADD" />
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <p>&nbsp;</p>
        <table class="table table-bordered" style="width: 604px;">
            <tr>
                <td width="90">Sl No</td>
                <td width="90">Name</td>
                <td>Character name</td>
                <td>PHOTO</td>
                <td>Action</td>
            </tr>

            <?php 
            $selqry = "select * from tbl_cast";
            $data = mysql_query($selqry);
            $i = 0;
            while ($row = mysql_fetch_array($data)) {
                $i++;
            ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $row["cast_name"] ?></td>
                    <td><?php echo $row["character_name"] ?></td>
                    <td><a href="">Photo</a></td>
                    <td><a href="cast.php?ctid=<?php echo $row["cast_id"] ?>">DELETE</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <p>&nbsp;</p>
    </form>
</div>
</body>
</html>
<?php 
include("Footer.php");
?>