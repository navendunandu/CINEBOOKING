<?php
include("../Assests/connection/connection.php");            
include("Header.php");                                                                                                                                                                   
If(isset($_POST["btn_sub"]))
{
	$sndid=$_POST["soundspec_name"];

	$insqry="insert into tbl_soundspec(soundspec_name) values('$sndid')";
	mysql_query($insqry);
}

if($_GET["sndid"])
{
	$sndid=$_GET["sndid"];
	$delqry="delete from tbl_soundspec where soundspec_id='$sndid'";
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
    <h1 class="text-center">Sound_Specification</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Sound Specification</td>
                    <td>
                        <input type="text" class="form-control" name="soundspec_name" id="soundspec_id" />
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
        </div>
        <br />
        <br />
        <table class="table table-bordered" style="width: 399px; height: 153px;">
            <tr>
                <td><div class="text-center">Sl.no</div></td>
                <td><div class="text-center">Sound Specification</div></td>
                <td><div class="text-center">Action</div></td>
            </tr>
            <?php
            $i = 0;
            $selqry = "select * from tbl_soundspec";
            $data = mysql_query($selqry);
            while($row = mysql_fetch_array($data))
            {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["soundspec_name"]?></td>
                <td><a href="soundspec.php?sndid=<?php echo $row["soundspec_id"]?>" class="btn btn-danger">DELETE</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</div>
</body>
</html>
<?php 
include("Footer.php");
?>