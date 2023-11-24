<table border="1">
    <tr>
      <?php
	  include("../connection/connection.php");  
	  $selTheatre="select * from tbl_film f inner join tbl_language l on l.language_id=f.language_id inner join tbl_certification c on c.certification_id=f.certification_id inner join tbl_genres g on g.genres_id=f.genres_id where true";
	  if($_GET['lg']!=null){
		  $selTheatre=$selTheatre." and l.language_id='".$_GET['lg']."'";
	  }
	  if($_GET['gn']!=null){
		  $selTheatre=$selTheatre." and g.genres_id='".$_GET['gn']."'";
	  }
	  if($_GET['cr']!=null){
		  $selTheatre=$selTheatre." and c.certification_id='".$_GET['cr']."'";
	  }
	$data = mysql_query($selTheatre);
	$i=0;
	while($s=mysql_fetch_array($data))
	{
		$i++;
		?>
        <td>
      <p align="center" style="padding:'2rem', margin:'10px'">
            <?php echo $s['film_name'] ?><br />
            <?php echo $s['language_name'] ?><br />
            <?php echo $s['genres_name'] ?><br />
            <?php echo $s['certification_name'] ?><br />
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