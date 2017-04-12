<?php

//connect to db
$conn = mysql_connect("localhost", "root", "")
or die(mysql_error());
mysql_select_db("users") or die(mysql_error());


//call passed in functions
if(function_exists($_GET['method'])){
		$_GET['method']();
}


//methods
function getAllUsers(){
	$user_sql = mysql_query("SELECT * FROM user") or die(mysql_error());
	$users = array();
	while($user = mysql_fetch_array($user_sql)) {
		$users[]=$user;
	}
	$users = json_encode($users);
	echo $_GET['jsoncallback'] . '(' . $users . ')';

}

?>