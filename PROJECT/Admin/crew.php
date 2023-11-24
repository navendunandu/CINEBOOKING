<?php
include("../Assests/connection/connection.php");  
include("Header.php");                                                                                                                                                                             
If(isset($_POST["btn_sub"]))
{
	$crewtypeid=$_POST["crewtype_name"];
	$crewname=$_POST["crew_name"];
	
	
	$crewphoto=$_FILES['cast_photo']['name'];
	$path=$_FILES['cast_photo']['tmp_name'];
	move_uploaded_file($path,"../Assests/Files/Admin/".$crewphoto);

	$insqry="insert into tbl_crew(crewtype_id,crew_name,crew_photo) values('".$crewtypeid."','".$crewname."','".$crewphoto."')";
	
	if(mysql_query($insqry)){
		?>
        <script>
		alert('Crew inserted')
		window.location="crew.php"
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Failed')
		window.location="crew.php"
		</script>
        <?php
	}
}

if($_GET["ctid"])
{
	$ctid=$_GET["ctid"];
	$delqry="delete from tbl_crew where crew_id='$ctid'";
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
    <h1 class="text-center">Crew</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Crew-type</td>
                    <td>
                        <select class="form-control" name="crewtype_name" id="crewtype_id">
                            <option value="">.....SELECT.....</option>
                            <?php
                            $selQry = "select * from tbl_crewtype";
                            $data = mysql_query($selQry);
                            while($row = mysql_fetch_array($data))
                            {
                            ?>
                            <option value="<?php echo $row['crewtype_id']  ?>"><?php echo $row['crewtype_name']  ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" class="form-control" name="crew_name" id="crew_id" />
                    </td>
                </tr>
                <tr>
                    <td>photo</td>
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
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <table class="table table-bordered" style="width: 604px;">
                <tr>
                    <td width="90">Sl No</td>
                    <td width="90">Crew type</td>
                    <td>Name</td>
                    <td>PHOTO</td>
                    <td>Action</td>
                </tr>
                <?php 
                $selqry = "select * from tbl_crewtype t inner join tbl_crew c on t.crewtype_id=c.crewtype_id";
                $data = mysql_query($selqry);
                $i = 0;
                while($rows = mysql_fetch_array($data))
                {
                    $i++;
                ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $rows["crewtype_name"]?></td>
                    <td><?php echo $rows["crew_name"]?></td>
                    <td><img src="../Assests/Files/Admin/<?php echo $rows['crew_photo'] ?>" height="100px"/></td>
                    <td><a href="crew.php?ctid=<?php echo $rows["crew_id"]?>" class="btn btn-danger">DELETE</a></td>
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