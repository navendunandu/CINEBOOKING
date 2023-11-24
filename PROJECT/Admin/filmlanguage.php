<?php
include("../Assests/connection/connection.php");   
include("Header.php");                                                                                                                                                                            
if(isset($_POST["btn_sub"]))
{
	
	$flid=$_POST["language_name"];

	$insqry="insert into tbl_language(language_name) values('$flid')";
	mysql_query($insqry);
}

if($_GET["flid"])
{
	$flid=$_GET["flid"];
	$delqry="delete from tbl_language where language_id='$flid'";
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
    <h1 class="text-center">Film_Language</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 200px;">
                <tr>
                    <td>Film-Language</td>
                    <td>
                        <input type="text" class="form-control" name="language_name" id="language_id" />
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
            <p>&nbsp;</p>
            <table class="table table-bordered" style="width: 399px; height: 153px;">
                <tr>
                    <td>Sl.no</td>
                    <td>Languages</td>
                    <td>Action</td>
                </tr>
                <?php 
                $selqry = "select * from tbl_language";
                $data = mysql_query($selqry);
                $i = 0;
                while($row = mysql_fetch_array($data))
                {
                    $i++;
                ?>
                <tr>
                    <td height="58"><?php echo $i ?></td>
                    <td><?php echo $row["language_name"]?></td>
                    <td><a href="filmlanguage.php?flid=<?php echo $row["language_id"]?>" class="btn btn-danger">DELETE</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </form>
</div>
</form>
</body>
</html>
<?php 
include("Footer.php");
?>