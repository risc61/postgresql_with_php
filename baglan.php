<?php
/*$dbuser = 'postgres';
$dbpass = 'sapass';
$host = 'localhost';
$dbname='makaleSitesi';
$dbh = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass, array(
PDO::ATTR_PERSISTENT => true));	
echo 'burasi';*/

$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Forum";
   $credentials = "user = postgres password=sapass";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
     // echo "Error : Unable to open database\n";
   } else {
     // echo "Opened database successfully\n";
   }