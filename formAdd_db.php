<?php
require_once('connect.php');
if (isset($_REQUEST['btn_insert'])) {
  try {
    $name =  $_REQUEST['name'];
    $year =  $_REQUEST['year'];
    $doc_name =  $_REQUEST['doc_name'];
    $doc_file = $_FILES['doc_file']['name'];
    $type = $_FILES['doc_file']['type'];
    $size = $_FILES['doc_file']['size'];
    $temp = $_FILES['doc_file']['tmp_name'];

    $path = "doc/" . $doc_file;
    if (empty($name)) {
      $errorMsg = "Please Enter name";
    } else if (empty($year)) {
      $errorMsg = "Please Enter year";
    } else if (empty($doc_name)) {
      $errorMsg = "Please Enter doc_name";
    } else if (empty($doc_file)) {
      $errorMsg = "please Select PDF";
    } else if ($type != "application/pdf") {
      $errorMsg = "Upload PDF";
    } else {
      if (!file_exists($path)) { // check file not exist in your upload folder path
        if ($size < 500000000) { // check file size 5MB
          move_uploaded_file($temp, 'doc/'.$doc_file); // move upload file temperory directory to your upload folder
        } else {
          $errorMsg = "Your file too large please upload 50MB size"; // error message file size larger than 5mb
        }
      } else {
        $errorMsg = "File already exists... Check upload folder"; // error message file not exists your upload folder path
      }
    }
    if (isset($errorMsg)) {
      $insert_stmt = $conn->prepare('INSERT INTO upload(name,year,doc_name,doc_file) VALUES (:fname,:fyear,:fdoc_name,:fdoc_file)');
      $insert_stmt->bindparam(':fname',$name);
      $insert_stmt->bindparam(':fyear',$year);
      $insert_stmt->bindparam(':fdoc_name',$doc_name);
      $insert_stmt->bindparam(':fdoc_file',$doc_file);
      if ($insert_stmt->execute()) {
        $insertMsg = "File Uploaded successfully...";
        header('refresh:2;index.php');
      }
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  date_default_timezone_set("Asia/Bangkok");

  $sToken = "DRGMafOVoXdnETD1cqMsTmh3z6YOmAeO0A4KHtvzYLC";
  $sMessage = "มีรายการส่งเอกสาร\n";
  $sMessage .= "ชื่อ นามสกุล: " . $name . "\n";
  $sMessage .= "ชั้นปี: " . $year . "\n";
  $sMessage .= "ชื่อเอกสาร". $doc_name ."\n";

  $chOne = curl_init(); 
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   
}
?>