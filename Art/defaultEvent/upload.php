<!DOCTYPE html>
<html>
<head>
<title>Test Upload Page</title>
</head>
<body>
<?php
$target_dir = "testUploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

echo $_FILES["fileToUpload"]["size"];
echo mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
//echo </br>;

// Check if the file is a valid MIME type
$mimeTypes = array("image/jpeg", "image/png", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
$check = false;
foreach ($mimeTypes as $type) {
	if (strcmp(mime_content_type($_FILES["fileToUpload"]["tmp_name"]), $type) == 0) {
	$check = true;
	}
	}
if ($check) {
	echo "File is a valid MIME type - " . mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
	$uploadOK = 1;
} else {
	echo "File is an invalid MIME type - " . mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
	$uploadOK = 0;
}


// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "xlsx" && $imageFileType != "ppt"
&& $imageFileType != "pptx") {
    echo "Sorry, only XLSX, PPT, PPTX, JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</body>
</html>
