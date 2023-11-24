<?php	
session_start();
	include("../Assests/connection/connection.php");    
  include("Header.php");                                     
	$selqry="select * from tbl_complaint ";
     $data=mysql_query($selqry);
	 $row=mysql_fetch_array($data)
	 
	 
?>
<?php
 if($_GET["cid"])
{
	$cid=$_GET["cid"];
	$delqry="delete from tbl_complaint where complaint_id='$cid'";
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
    <h1 class="text-center">COMPLAINT Show</h1>
    <form id="form1" name="form1" method="post" action="">
        <div class="text-center">
            <table class="table table-bordered" style="width: 533px;">
                <tr>
                    <td>SL no</td>
                    <td>Complaint Title</td>
                    <td>Complaint Content</td>
                    <td>Complaint Reply</td>
                    <td>Action</td>
                </tr>
                <tr>
                    <td><?php echo  $row["complaint_id"] ?></td>
                    <td><?php echo $row["complaint_title"]?></td>
                    <td><?php echo $row["complaint_content"]?></td>
                    <td>
                        <?php if ($row['complaint_status'] == 0) { ?>
                            <a href="ComplaintReply.php?cid=<?php echo $row['complaint_id'] ?>" class="btn btn-primary">Reply</a>
                        <?php } else { ?>
                            <?php echo $row["message"]; ?>
                        <?php } ?>
                    </td>
                    <td><a href="complaintshow.php?cid=<?php echo $row["complaint_id"] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>
<?php
include("Footer.php");
?>