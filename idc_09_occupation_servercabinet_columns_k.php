<?php

function array2object($array) {
  if (is_array($array)) {
    $obj = new StdClass();
    foreach ($array as $key => $val){
      $obj->$key = $val;
    }
  }
  else { $obj = $array; }
  return $obj;
}



/*
//truncate table idc_09;
//insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_e04 order by location desc;
$mysqli = new mysqli("50.62.209.86","adminidc","idc_21viacloud","tsun_chen_idc");
if (mysqli_connect_errno())
{
 printf("fail to connect: %s<br>", mysqli_connect_error());
}

$query = "TRUNCATE table idc_09;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_d03 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_d04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_d10 order by location desc;";


$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_e04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_e05 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_e06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_e10 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_g06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_g07 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_i09 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_i10 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_j02 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_j06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_j08 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_j09 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k01 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k02 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k03 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k05 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k07 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k08 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_k09 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l01 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l02 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l03 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l07 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l09 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_l10 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m02 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m03 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m07 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m09 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_m10 order by location desc;";

$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n01 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n02 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n03 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n04 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n06 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n07 order by location desc;";
$query.= "insert into idc_09(location, hostname, tag, uidle, in_pose_date) select location, hostname, tag, uidle, in_pose_date from idc_09_n09 order by location desc;";






if ($mysqli->multi_query($query) === false){
 echo mysqli_error($mysqli);
}
$mysqli->close();
*/


 // connection to database 
 if (($connection = mysql_connect("50.62.209.86", "adminidc", "idc_21viacloud")) === FALSE)
 //if (($connection = mysql_connect("localhost", "root", "TSUNC")) === FALSE)
     die("Unable to connect to database.".mysql_error());

 mysql_query("set names utf8"); 



 $start = ($_REQUEST['start'] != '' ) ? $_REQUEST['start'] : 0;
 $limit = ($_REQUEST['limit'] != '' ) ? $_REQUEST['limit'] : 1000;

 // select to db
 if (mysql_select_db("tsun_chen_idc", $connection) === FALSE)
     die("Could not select database".mysql_error());

 //$count_sql = "SELECT * FROM `a02`";
 $count_sql = "select location, hostname, tag, uidle, in_pose_date, dev_sname
 from idc_09 where location like 'idc_09_k%' order by location desc
";


//"SELECT a01.hostname AS '001-A1', a01.tag AS '001-A1-tag', a02.hostname AS '002-A2', a02.tag AS '002-A2-tag' FROM a01, `a02` where a01.location = a02.location";

				//"SELECT a01.hostname AS '001-A1', a02.hostname AS '002-A2' FROM a01, `a02` where a01.location = a02.location";
		               //SELECT a01.hostname AS '001-A1', a02.hostname AS '002-A2' FROM a01, `a02` where a01.location = a02.location

 $sql = $count_sql . " LIMIT " . $start . ", " . $limit;

 $arr = array();
 $arr2 = array();

 if (!$rs = mysql_query($sql)) {
  echo '{success: false}';
 }
 else {
  $rs_count = mysql_query($count_sql);
  $results = mysql_num_rows($rs_count);

  while ($obj = mysql_fetch_object($rs)) {
	$arr[]=$obj;
  }


//  print_r( $arr );
//  echo '{success:true, results:' . $results . ',rows:' .json_encode($arr).'}';
//  echo '{"root":'.json_encode($arr).'}';

  $students = json_decode(json_encode($arr), true);
  for($i=0;$i<count($students);$i++){
    {

     $ar2 = array( 
		'idc09-location' => $students[$i]['location'],
		'idc09-tag' => $students[$i]['tag'],
		'idc09' => "<a title=U态：".$students[$i]['uidle']."&#13;"."状态序列号：".$students[$i]['dev_sname']."&#13;"."迁入：".$students[$i]['in_pose_date']."&#13;"."台帐：".$students[$i]['tag'].">".$students[$i]['hostname']."</a>",
		//'idc07' => "<a title=".$students[$i]['hostname'].">".$students[$i]['location']."</a>" 

		 
		//  '002-hostname' => "<a title=".$students[$i]['002-A2-tag'].">".$students[$i]['002-A2']."</a>",
		// '003-A3' => "<a title=".$students[$i]['003-A3-tag'].">".$students[$i]['003-A3']."</a>",
		// '004-A4' => "<a title=".$students[$i]['004-A4-tag'].">".$students[$i]['004-A4']."</a>",
		// '005-A5' => "<a title=".$students[$i]['005-A5-tag'].">".$students[$i]['005-A5']."</a>",
		/// '006-A6' => "<a title=".$students[$i]['006-A6-tag'].">".$students[$i]['006-A6']."</a>",
		// '007-A7' => "<a title=".$students[$i]['007-A7-tag'].">".$students[$i]['007-A7']."</a>",
		/// '008-A8' => "<a title=".$students[$i]['008-A8-tag'].">".$students[$i]['008-A8']."</a>",
		//'009-A9' => "<a title=".$students[$i]['009-A9-tag'].">".$students[$i]['009-A9']."</a>"
/*
     $ar2 = array(
	'001-A1' => $students[$i]['001-A1'].$students[$i]['001-A1-tag'],
	'002-A2' => $students[$i]['002-A2'].$students[$i]['002-A2-tag'],
	'003-A3' => $students[$i]['003-A3'].$students[$i]['003-A3-tag'],
	'004-A4' => $students[$i]['004-A4'].$students[$i]['004-A4-tag'],
	'005-A5' => $students[$i]['005-A5'].$students[$i]['005-A5-tag'],
	'006-A6' => $students[$i]['006-A6'].$students[$i]['006-A6-tag']
*/

     );
     $arr2 [] = array2object($ar2);

    }
  }

//  print_r ($arr2);
  //echo '{"root":'.json_encode($arr2).'}';
  echo '{ results:' . $results;
  echo ', root:'.json_encode($arr2).' }';
 }
 




?>