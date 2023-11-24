<?php
include("../Assests/connection/connection.php");
include("Header.php");
if(isset($_POST["btn_sub"]))
{
	$disid=$_POST["txt_district"];
	$plaid=$_POST["txt_place"];
	$insqry="insert into tbl_place(place_name,district_id) values('$plaid','$disid')";
	mysql_query($insqry);
}

if($_GET["disid"])
{
	$delqry="delete from tbl_place where place_id='".$_GET["disid"]."'";
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
    <h1 class="text-center">PLACE</h1>
    <form id="form2" name="form2" method="post" action="">
        <table class="table table-bordered" style="width: 349px; height: 174px;">
            <tr>
                <td>District</td>
                <td>
                    <select class="form-control" name="txt_district" id="district_id">
                        <option value="">......SELECT.....</option>
                        <?php
                        $selqry = "select * from tbl_district";
                        $data = mysql_query($selqry);
                        while($row = mysql_fetch_array($data))
                        {
                        ?>
                        <option value="<?php echo $row["district_id"]?>">
                            <?php echo $row["district_name"]?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Place</td>
                <td>
                    <input type="text" class="form-control" name="txt_place" id="place_id" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="btn_sub" id="place_btn" value="SAVE" />
                    </div>
                </td>
            </tr>
        </table>
        <br />
        <br />
        <br />
        <table class="table table-bordered" style="width: 773px; height: 130px;">
            <tr>
                <td width="98"><div class="text-center">SL.NO</div></td>
                <td width="256"><div class="text-center">District_Name</div></td>
                <td width="236"><div class="text-center">Place_Name</div></td>
                <td width="155"><div class="text-center">Action</div></td>
            </tr>
            <?php
            $i = 0;
            $selqry1 = "select * from tbl_district d inner join tbl_place p on d.district_id=p.district_id";
            $data = mysql_query($selqry1);
            while($row = mysql_fetch_array($data))
            {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["district_name"]?></td>
                <td><?php echo $row["place_name"]?></td>
                <td><a href="place.php?disid=<?php echo $row["place_id"]?>" class="btn btn-danger">DELETE</a></td>
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