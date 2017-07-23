<?php

// 将<a href>与数据表结合，中间json

// array convert to object
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

 // connection to database 
 //if (($connection = mysql_connect("50.62.209.86", "tsunchen", "TSun810425")) === FALSE)
 //if (($connection = mysql_connect("localhost", "root", "TSUNC")) === FALSE)
 if (($connection = mysql_connect("50.62.209.86", "adminidc", "idc_21viacloud")) === FALSE)
     die("Unable to connect to database.".mysql_error());

 mysql_query("set names utf8");

 $start = ($_REQUEST['start'] != '' ) ? $_REQUEST['start'] : 0;
 $limit = ($_REQUEST['limit'] != '' ) ? $_REQUEST['limit'] : 99;

 // select to db
 //if (mysql_select_db("idc_wgq", $connection) === FALSE)
 if (mysql_select_db("tsun_chen_idc", $connection) === FALSE)
     die("Could not select database".mysql_error());

 //$count_sql = "SELECT * FROM `a02`";
 $count_sql = "SELECT   idc_09_k09.location AS '001-A1-location', idc_09_k09.hostname AS '001-A1', 
			idc_09_k09.tag AS '001-A1-tag', idc_09_k09.in_pose_date AS '001-A1-in_pose_date',
			idc_09_k09.uidle AS '001-A1-uidle'
			

 FROM idc_09_k09 order by location desc";

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

  $friends = json_decode(json_encode($arr), true);
  for($i=0;$i<count($friends);$i++){
    {
/*
     $ar2 = array('001-A1' => "<a title=".$students[$i]['001-A1-tag'].">".$students[$i]['001-A1']."</a>" , 
		  '002-A2' => "<a title=".$students[$i]['002-A2-tag'].">".$students[$i]['002-A2']."</a>"
*/
/*
     $ar2 = array('001-A1-location' => "<a title=".$students[$i]['001-A1-location'].">".$students[$i]['001-A1-location']."</a>",
		'001-A1' => "<a title=型号：".$students[$i]['001-A1-dev_type']."&#13;"."台帐：".$students[$i]['001-A1-tag'].">".$students[$i]['001-A1']."</a>" 
*/
     $ar2 = array('001-A1-location' => $friends[$i]['001-A1-location'],
		  '001-A1' => $friends[$i]['001-A1'],
		  '001-A1-tag' => $friends[$i]['001-A1-tag'],
		  '001-A1-in_pose_date' => $friends[$i]['001-A1-in_pose_date'],
		  '001-A1-uidle' => $friends[$i]['001-A1-uidle']
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