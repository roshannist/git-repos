<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'roshan';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
      //$sql = 'SELECT RSLNO FROM wel';
  mysql_select_db('wel');
 
if($_POST){

//Array ( [country] => mohit [states] => [blue] => [orange] => [PUBLICSECTOR] => [PRIVATESECTOR] => [IIMJOBS] => [submit] => Submit )
$condition = '';
if(isset($_POST['STATENAME']) && $_POST['STATENAME'] !=''){
$condition = 'STATENAME="'.$_POST['STATENAME'].'" and';
//$condition = 'rslno="'.$_POST['rslno'].'" or';

}
if(isset($_POST['DISTNAME']) && $_POST['DISTNAME'] !=''){
 $condition = 'DISTNAME="'.$_POST['DISTNAME'].'" and';
//$condition = 'statename="'.$_POST['statename'].'" or';
}

if(isset($_POST['STATUSCD']) && $_POST['STATUSCD'] !=''){
 $condition = 'STATUSCD="'.$_POST['STATUSCD'].'" or';
// $condition = 'distcode="'.$_POST['distcode'].'" or';

}
if(isset($_POST['OWNERSHIP=']) && $_POST['OWNERSHIP='] !=''){
$condition = 'OWNERSHIP=="'.$_POST['OWNERSHIP='].'" or';
//$condition = 'distname="'.$_POST['distname'].'" or';
}

if(isset($_POST['NEW_MACH_INNO']) && $_POST['NEW_MACH_INNO'] !=''){
$condition = 'NEW_MACH_INNO="'.$_POST['NEW_MACH_INNO'].'" or';   
}

//if(isset($_POST['address']) && $_POST['address'] !='') {
//$condition = 'address="'.$_POST['address'].'" and';
//}// echo $sql = 'SELECT rslno,statename,distcode,distname,name,address FROM wel where '.$condition. ' 1=1';


  // echo $sql = 'SELECT rslno,statename,distcode,distname,name,address FROM wel where '.$condition. ' 1=1';
   echo $sql = 'SELECT COUNT( STATENAME ) 
FROM wel WHERE STATENAME =  'Andhra Prades'
AND DISTNAME =  'Medak' and STATUSCD=1 and OWNERSHIP='Private Ltd' and NEW_MACH_INNO=' New machines'; 

   mysql_select_db('wel');
  $retval = mysql_query( $sql, $conn );
   if(! $retval )
   {
      die('Could not get data: ' . mysql_error());
   }
   echo "<table border='1' cellpadding='10' color='Red'>";
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
     
      echo '<tr>';
      echo "<td>  ".$row['STATENAME']."</td>";
      echo "<td> ".$row['DISTNAME']."</td>";
      echo "<td> ".$row['STATUSCD']."</td>";
      echo "<td> ".$row['OWNERSHIP']."</td>";
      echo "<td> ".$row['NEW_MACH_INNO']."</td>";
     // echo "<td>".$row['address']."</td>";
      echo '</tr>';

      // echo '<tr>';
      // echo "<td>STATENAME :  ".$row['STATENAME']."</td>";
      // echo "<td>DISTNAME : ".$row['DISTNAME']."</td>";
      // echo "<td>STATUSCD : ".$row['STATUSCD']."</td>";
      // echo "<td>OWNERSHIP : ".$row['OWNERSHIP']."</td>";
      // echo "<td>NEW_MACH_INNO     : ".$row['NEW_MACH_INNO']."</td>";
      // echo '</tr>';
 }
 echo '</table>';
   echo "Fetched data successfully\n";
   mysql_close($conn);
}
?>

