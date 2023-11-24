<?php
include('../Connection/Connection.php');

?>

<table border="1">
    <tr>
      <?php
	  include("../connection/connection.php");  
	 $selTheatre="select * from tbl_theatre t inner join tbl_place p on p.place_id=t.theatre_place inner join  tbl_district d on d.district_id=p.district_id inner join tbl_screen s on s.theatre_id=t.theatre_id inner join tbl_showtime st on st.screen_id=s.screen_id where st.film_id='".$_GET['fid']."' and true";
	
	  if($_GET['dis']!=null){
		  $selTheatre=$selTheatre." and d.district_id='".$_GET['dis']."'";
	  }
	  if($_GET['pla']!=null){
		  $selTheatre=$selTheatre." and p.place_id='".$_GET['pla']."'";
	  }
	  //echo $selTheatre;
	$data = mysql_query($selTheatre);
	$i=0;
	while($s=mysql_fetch_array($data))
	{
		$i++;
		?>
        <td>
      <p align="center" style="padding:'2rem', margin:'10px'">
            <?php echo $s['theatre_name'] ?><br />
            <?php echo $s['district_name'] ?><br />
            <?php echo $s['place_name'] ?><br />
            <?php echo $s['theatre_address'] ?><br />
            <a href="searchtheatre.php?fid=<?php echo $s['film_id'] ?>">Select Theatre</a>
      </p>
      </td>
	 <?php
	 if($i==5)
	 {
		 echo "</tr><tr>";
		 $i=0;
	 }
		}
		?>
        </tr>
        </table>