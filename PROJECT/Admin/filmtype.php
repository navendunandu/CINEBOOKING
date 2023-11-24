<?php
include("../Assests/connection/connection.php");        
include("Header.php");                                                                                                                                                                      
If(isset($_POST["btn_sub"]))
{
	$ftid=$_POST["filmtype_name"];

	$insqry="insert into tbl_language(language_name) values('$ftid')";
	mysql_query($insqry);
}

if($_GET["ftid"])
{
	$sndid=$_GET["ftid"];
	$delqry="delete from tbl_filmtype where filmtype_id='$ftid'";
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
    <h1 class="text-center">Film_Type</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Filmtype</td>
                    <td>
                        <input type="text" class="form-control" name="filmtype_name" id="filmtype_id" />
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
            <table class="table table-bordered" style="width: 558px; height: 154px;">
                <tr>
                    <td height="70">Sl.no</td>
                    <td>Film Type</td>
                    <td>Action</td>
                </tr>
                <?php 
                $selqry = "select * from tbl_filmtype";
                $data = mysql_query($selqry);
                $i = 0;
                while($row = mysql_fetch_array($data))
                {
                    $i++;
                ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $row["filmtype_name"]?></td>
                    <td><a href="filmtype.php?ftid=<?php echo $row["filmtype_id"]?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <p>&nbsp;</p>
        </div>
    </form>
</div>
</body>
</html>
<?php 
include("Footer.php");
?>