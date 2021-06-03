<?php
require_once 'classes/db.class.php';
include_once("config.php");

function randomString($chars=10) { //generate random string
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randstring = '';
	for ($i = 0; $i < $chars; $i++) { $randstring .= $characters[rand(0, strlen($characters) -1)]; }
	return $randstring;
}

function currentFileName() { //return current file name
	return basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
}

function baseURL($sub=0) { //return base url for cron jobs
	 $requesturi = explode("?",$_SERVER["REQUEST_URI"]);
	 $subdir =  $requesturi[0];
	 $pageURL = 'http';
	 if(isset($_SERVER["HTTPS"])) { if($_SERVER["HTTPS"] == "on") {$pageURL .= "s";} }
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"] . $subdir;
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"] . $subdir;
	 }
	 return $pageURL;
}

function curlReturn($url) { //get url with curl
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch,CURLOPT_URL, $url);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function active_page($page,$property){
	if(basename($_SERVER['SCRIPT_NAME']) == $page){
		return $property;
	}
	else {
		 return '';
	 }
}
function redirect_to($page){
	echo "<script>document.location.href=$page</script>";
}

// ----------------------------------------------------------------------------------------------
// GENERAL DATABASE FUNCTIONS

function get_count($table,$row='',$compared_value=''){
	$count = DB::queryFirstField("SELECT COUNT(*) FROM $table where $row=%s",$compared_value);
	echo $count;
}
function table_count($table){
	$count = DB::queryFirstField("SELECT COUNT(*) FROM $table");
	return $count;
}

// ----------------------------------------------------------------------------------------------
// login register
class AppLib
{

  /*
   * Register New User
   *
   * @param $name, $email, $username, $password
   *
   * */
  public function Register($fullname,$username, $phone, $email,  $password)
  {
      try {
		$role = "user";
		$enc_password = password_hash($password,PASSWORD_DEFAULT);
		$insert_register = DB::insert('pengguna',[
			'nama'=>$fullname,
			'username'=>$username,
			'email'=>$email,
			'phone'=>$phone,
			'password'=> $enc_password,
			'role'=> $role,
		  ]);
          if ($insert_register>0) {
          	echo "<script>alert('Akun Anda succes Terdaftar');document.location='index.php';</script>";
          }
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
  }
}
class AppLib2
{
  public function EditRegister($fullname, $phone, $email)
  {
      try {
		$insert_register = DB::update('pengguna',[
			'nama'=>$fullname,
			'email'=>$email,
			'phone'=>$phone,
		  ], "id=%i", $id = $_GET['edt']);
          if ($insert_register>0) {
          	echo "<script>alert('Your account have successfully Edit')</script>";
          }
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
  }
}
?>