<!DOCTYPE html>
<html>
<head>
<title>Submission Page</title>
<style>

        body {
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
        background-color:lightgray;
        text-align: center;
        padding: 10px;
    }

        table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
                empty-cells: hide;
                margin: auto;
                text-align: center;
                padding: 10px;
        }


</style>
</head>

<body>

<h1 style="background-image:url(../intel.jpg);background-repeat: no-repeat;background-position: center;height: 352px;width: 1500px;margin:auto"></h1>

<?php
$demoName = $_POST["demoName"];
$demoExperience =  $_POST["demoExperience"];
$conversation =  $_POST["conversation"];
$hardwareFootprint = $_POST["footprint"];
$counterLength = $_POST["counterLength"];
$touch = $_POST["touch"];
$transparent = $_POST["transparent"];
$curved = $_POST["curved"];
$mounted = $_POST["mounted"];
$tvNeeds = $_POST["tvNeeds"];
$privateNetwork = $_POST["privateNetwork"];
$publicNetwork = $_POST["publicNetwork"];
$medium = $_POST["medium"];
$bandwidthNeeds = $_POST["bandwidthNeeds"];

$entryArray = array($demoName, $demoExperience, $conversation, $hardwareFootprint, $counterLength, $touch, $transparent, $curved, $mounted, $tvNeeds, $privateNetwork, $publicNetwork, $medium, $bandwidthNeeds);
$entries = "";
for ($i = 0; $i < count($entryArray);$i++ ) {
	if ($i == 0) {
		$entry = $entryArray[$i];
		$entries = $entries . '"'.$entry.'"' . ",";
	} elseif ($i == 1) {
		$entry = $entryArray[$i];
		$entries = $entries . '"'.$entry.'"';
	} elseif ($i == 5) {
		$entries = $entries . "," . '"'.$touch.','.$transparent.','.$curved.','.$mounted.','.$tvNeeds.'"';
		$i = 9;
	} else {
	$entry = $entryArray[$i];
	$entries = $entries . "," . '"'.$entry.'"';
	}
}
$entries = $entries . "\n";
$file = 'demoGrid.csv';

file_put_contents($file, $entries, FILE_APPEND | LOCK_EX);

echo "succesfully submitted";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

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
        shell_exec('zip -r uploads.zip uploads/');
        shell_exec('mv uploads.zip zips/');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


echo '<table style="width:auto">
	<tr>
		<th colspan="2">Experience</th>
		<th colspan="2">Equipment</th>
                <th colspan="2">Network</th>
	</tr>


	<tr>
		<td>Demo Name</td>
		<td>'; echo $demoName; echo '</td>

		<td>Hardware Footprint</td>
		<td>'; echo $hardwareFootprint; echo '</td>

		<td>Private Network Needed</td>
		<td>'; echo $privateNetwork; echo '</td>

	</tr>


	<tr>
		<td>Demo Experience</td>
		<td>'; echo $demoExperience; echo '</td>

		<td>Demo Counter Length</td>
		<td>'; echo $counterLength; echo '</td>

		<td>Public Network Needed</td>
		<td>'; echo $publicNetwork; echo '</td>

	</tr>


	<tr>
		<td>Conversation</td>
		<td>'; echo $conversation; echo '</td>

		<td>TV or Monitor Needs</td>
		<td>'; echo $touch.",".$transparent.",".$curved.",".$mounted.",".$tvNeeds; echo '</td>

		<td>Wired or Wireless</td>
		<td>'; echo $medium; echo '</td>
	</tr>

	<tr>
		<td style="visibility:hidden;"></td>
		<td style="visibility:hidden;"></td>
		<td style="visibility:hidden;"></td>
		<td style="visibility:hidden;"></td>

		<td>Bandwidth Needs</td>
		<td>'; echo $bandwidthNeeds; echo '</td>
	</tr>
</table>';
?>

</body>
</html>
