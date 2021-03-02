<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
$db=mysqli_connect("localhost","volhard","Dhanush@123","netflix suggestions");
if(!$db){
	die("failed to connect to database".mysqli_connect_error());
}
$sql="SELECT* FROM `data`";
    $result=$db->query($sql);
    if(!$result){
        die("query is invalid");
    }
    $response=array();
    $i=0;
    while($row=$result->fetch_array()){
        $response[]=$row;
        $cast=$response[$i]['cast'];
        $newcast=utf8_encode($cast);
        $response[$i]['cast']=$newcast;
        $response[$i][4]=utf8_encode($response[$i][4]);
        $response[$i][2]=utf8_encode($response[$i][2]);
        $response[$i]['title']=utf8_encode($response[$i]['title']);
        $response[$i]['director']=utf8_encode($response[$i]['director']);
        $response[$i][3]=utf8_encode($response[$i][3]);
        $response[$i][11]=utf8_encode($response[$i][11]);
        $x=str_replace("-"," ",$response[$i]['description']);
        $response[$i]['description']=utf8_encode($x);
        $i++;
    }
    echo json_encode($response) ;
?>