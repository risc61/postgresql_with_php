<?php
include("..//baglan.php");
class DB_con
{
 /*function __construct()
 {
  $conn = pg_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.pg_error());
  pg_select_db(DB_NAME, $conn);
 }*/
 
 public function select($tablo)
 {

  $res=pg_query("SELECT * FROM $tablo");
  return $res;
 }
 

 public function delete($table,$id)
 {
  $res = pg_query("DELETE FROM $table WHERE user_id=".$id);
  return $res;
 }
 
 public function update($table,$id,$fname,$lname,$city)
 {
  $res = pg_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=".$id);
  return $res;
 }
 
  
 public function getirKullaniciRol($id)
 {     echo $id;
     pg_query("SELECT * FROM kullanici_role");
   $res = pg_query("SELECT * FROM kullanici_role where kullanici_id='$id' limit 1");
   $res_kullanici_Rol=pg_fetch_array($res);
   $res_Rol_ID=$res_kullanici_Rol['role_id'];
   
   
   $res = pg_query("SELECT * FROM role where role_id='$res_Rol_ID' limit 1");
   $res_Rol=pg_fetch_array($res);
   $res_Rol_Adi=$res_Rol['role_name'];
  return $res_Rol_Adi;

 }
 
 
 
}
