<?php
include("../Assests/connection/connection.php");            
include("Header.php");                                                                                                                                                                   
if(isset($_POST["btn_sub"]))
{
	
	$fcdid=$_POST["certification_name"];

	$insqry="insert into tbl_certification(certification_name) values('$fcdid')";
	mysql_query($insqry);
}

if($_GET["fcdid"])
{
	$fcdid=$_GET["fcdid"];
	$delqry="delete from tbl_certification where certification_id='$fcdid'";
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
    <h1 class="text-center">Film_Certification</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Film-Certification</td>
                    <td>
                        <input type="text" class="form-control" name="certification_name" id="certification_id" />
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
            <table class="table table-bordered" style="width: 399px; height: 153px;">
                <tr>
                    <td>Sl.no</td>
                    <td>Certification</td>
                    <td>Action</td>
                </tr>
                <?php 
                $selqry = "select * from tbl_certification";
                $data = mysql_query($selqry);
                $i = 0;
                while($row = mysql_fetch_array($data))
                {
                    $i++;
                ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $row["certification_name"]?></td>
                    <td><a href="filmcertification.php?fcdid=<?php echo $row["certification_id"]?>" class="btn btn-danger">DELETE</a></td>
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