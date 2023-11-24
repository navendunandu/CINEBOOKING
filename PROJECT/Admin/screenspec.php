<?php
include("../Assests/connection/connection.php");     
include("Header.php");                                                                                                                                                                          
If(isset($_POST["btn_sub"]))
{
	$scrid=$_POST["screenspec_name"];

	$insqry="insert into tbl_screenspec(screenspec_name) values('$scrid')";
	mysql_query($insqry);
}

if($_GET["scrid"])
{
	$scrid=$_GET["scrid"];
	$delqry="delete from tbl_screenspec where screenspec_id='$scrid'";
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
<h1 class="text-center">Screen_Specification</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Screen Specification</td>
                    <td>
                        <input type="text" class="form-control" name="screenspec_name" id="screenspec_id" />
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
        <table class="table table-bordered" style="width: 429px; height: 158px;">
            <tr>
                <td><div class="text-center">Sl.no</div></td>
                <td><div class="text-center">Screen Specification</div></td>
                <td><div class="text-center">Action</div></td>
            </tr>
            <?php
            $i = 0;
            $selqry = "select * from tbl_screenspec";
            $data = mysql_query($selqry);
            while($row = mysql_fetch_array($data))
            {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["screenspec_name"]?></td>
                <td><a href="screenspec.php?scrid=<?php echo $row["screenspec_id"]?>" class="btn btn-danger">DELETE</a></td>
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