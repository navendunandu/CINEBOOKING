<?php
include("../Assests/connection/connection.php");
include("Header.php");
$selqry="select * from tbl_admin";
$data=mysql_query($selqry);
$row=mysql_fetch_array($data);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container">
    <h1 class="text-center">MY PROFILE</h1>
    <div class="text-center">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered" style="width: 274px; height: 222px;">
                <tr>
                    <td width="192">Name</td>
                    <td width="66">
                        <?php echo $row["admin_name"]?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?php echo $row["admin_email"]?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>
<?php
include("Footer.php");
?>