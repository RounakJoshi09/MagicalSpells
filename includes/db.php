<?php 
//This is the more secure way of connection to the database b y converting it into constants.
$db['db_host']="localhost";
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='cms';
foreach($db as $key=>$value)
{
    define(strtoupper($key),$value);
}
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// if($connection)
// {
//         echo "Working Fine";
// }
// else
// {
//     echo "Not Working";
// }













?>