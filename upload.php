<?php
if(isset($_POST['submit']))
{
	//include the database file
	include_once 'dbConfig.php';

	//file upload configuration
	$targetDir = "uploads/";
	$allowTypes = array('jpg','png','jpeg','gif');

	$statusMsg = $errorMsg = $insertValueSQL = $errorUpload = $errorUploadType ='';
	if(!empty(array_filter($_FILES['files']['name'])))
	{
		foreach($_FILES['files']['name'] as $key=>$val){
			//File upload path
			$filesName = basename($_FILES['files']['name']['$key']);
			$targetFilePath = $targetDir . $fileName;

			//check whether file type is valid
			$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
			if(in_array($fileType, $allowTypes)){
				//Upload file to server
				if(move_upload_file($_FILES["files"][$key], $targetFilePath)){
					//Image db insert sql
					$insertValuesSQL .="('".$fileName."', NOW()),";
				}else{
					$errorUpload .=$_FILES['files']['name'][$key].',';
				}
			}else{
				$errorUploadType .=$_FILES['files']['name'][$key].',';
			}
		}
		if(!empty($insertValuesSQL)){
			$insertValuesSQL = trim($insertValuesSQL,',');
			//insert image file name into database
		}
	}
}
?>