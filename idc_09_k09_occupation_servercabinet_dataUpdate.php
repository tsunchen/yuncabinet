<?php

 // functions on obj2arr
 function object2array($object) {
  if (is_object($object)) {
    foreach ($object as $key => $value) {
      $array[$key] = $value;
    }
  }
  else {
    $array = $object;
  }
  return $array;
 }

 // connection to database 
 //if (($connection = mysql_connect("localhost", "root", "TSUNC")) === FALSE)
 if (($connection = mysql_connect("50.62.209.86", "adminidc", "idc_21viacloud")) === FALSE)
     die("Unable to connect to database.".mysql_error());

 // select to db
 //if (mysql_select_db("idc_wgq", $connection) === FALSE)
 if (mysql_select_db("tsun_chen_idc", $connection) === FALSE)
     die("Could not select database".mysql_error());


 mysql_query("set names utf8");


 if ($_REQUEST['debug']) {

    print_r($_REQUEST);

    exit(0);
 
}



 $records = json_decode(stripslashes($_REQUEST['recordsToInsertUpdate']));






 $arr = array();



 //print_r ($records);

 $friends = json_decode(json_encode($records), true);

 //echo count($friends);

 //print_r ($friends);

 for($i=0;$i<count($friends);$i++){
	
	$ar2 = object2array($friends[$i]);

	//echo $ar2['001-A1-location'];
	//echo $ar2['001-A1'];
	//echo $ar2['001-A1-tag'];
	//echo $ar2['001-A1-dev_class'];

	// UPDATE `idc_wgq`.`a01` SET `dev_class` = 'ATSUN' WHERE `a01`.`location` = '038';
	// UPDATE `idc_wgq`.`a01` SET `dev_class` = '' WHERE `a01`.`location` = '038';

	$count_sql_1 = " update "."`tsun_chen_idc`.`idc_09_k09` set `in_pose_date` = '".$ar2['001-A1-in_pose_date']."' where `idc_09_k09`.`location` = '".$ar2['001-A1-location']."'";
	$count_sql_2 = " update "."`tsun_chen_idc`.`idc_09_k09` set `tag` = '".$ar2['001-A1-tag']."' where `idc_09_k09`.`location` = '".$ar2['001-A1-location']."'";
	$count_sql_3 = " update "."`tsun_chen_idc`.`idc_09_k09` set `hostname` = '".$ar2['001-A1']."' where `idc_09_k09`.`location` = '".$ar2['001-A1-location']."'";
	$count_sql_4 = " update "."`tsun_chen_idc`.`idc_09_k09` set `uidle` = '".$ar2['001-A1-uidle']."' where `idc_09_k09`.`location` = '".$ar2['001-A1-location']."'";
	

	if (!$rs = (mysql_query($count_sql_1) and mysql_query($count_sql_2) and mysql_query($count_sql_3) and mysql_query($count_sql_4)) ) {

		echo '{success: false}';
	}
	else {

		// update idc09

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
		echo '{success: true}';

	}
	
}


?>
