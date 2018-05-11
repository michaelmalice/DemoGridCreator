<!DOCTYPE html>
<html>
<head>
<title>Demo Grid</title>
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

	td:empty {
		visibility: hidden;
	}


</style>
</head>

<body>

<h1 style="background-image:url(../intel.jpg);background-repeat: no-repeat;background-position: center;height: 352px;width: 1500px;margin:auto"></h1>

</br></br></br></br>
<form action="./action_page.php" method="post" enctype="multipart/form-data">
<table style="width:auto">
	<tr>
		<th colspan="2">Experience</th>
		<th colspan="2">Equipment</th>
		<th colspan="2">Network</th>
	</tr>


	<tr>

		<td>Demo Name</td>
		<td>
		<input type="text" name="demoName">
		</td>

		<td>Hardware Footprint</td>
		<td>
		<input type="text" name="footprint" placeholder="PC, Monitor, etc.">
		</td>

		<td>Private Network Needed</td>
		<td><select name="privateNetwork">
		<option value='Y'>Yes</option>
		<option value='N'>No</option>
		</select></td>

	</tr>


	<tr>

		<td>Demo Experience</td>
		<td>
		<textarea rows="5" cols="50" name="demoExperience"></textarea>
		</td>

		<td>Demo Counter Length</td>
		<td><select name="counterLength">
		<option value='NA'>N/A</option>
		<option value='4-6ft'>4 to 6 feet</option>
		<option value='6-8ft'>6 to 8 feet</option>
		<option value='8-10ft'>8 to 10 feet</option>
		</select></td>

		<td>Public Network Needed</td>
		<td><select name="publicNetwork">
		<option value='Y'>Yes</option>
		<option value='N'>No</option>
		</select></td>

	</tr>


	<tr>
		<td>Conversation</td>
		<td><select name="conversation">
		<option value='AD'>AD</option>
		<option value='AI'>AI</option>
		<option value='VR'>VR</option>
		<option value='5G'>5G</option>
		</select></td>

		<td>TV or Monitor Needs</td>
		<td>
			<input type="checkbox" id="touch" name="touch" value="touch">
			<label for="touch">Touch</label>

			<input type="checkbox" id="transparent" name="transparent" value="transparent">
                        <label for="transparent">Transparent</label>

			<input type="checkbox" id="curved" name="curved" value="curved">
                        <label for="curved">Curved</label>

			<input type="checkbox" id="mounted" name="mounted" value="mounted">
                        <label for="mounted">Mounted</label>

			</br>
			<select name="tvNeeds">
			<option value='N'>N/A</option>
			<option value='24 inch'>24 inch</option>
                        <option value='27 inch'>27 inch</option>
                        <option value='32 inch'>32 inch</option>
                        <option value='43 inch'>43 inch</option>
                        <option value='50 inch'>50 inch</option>
                        <option value='55 inch'>55 inch</option>
                        <option value='65 inch'>65 inch</option>
			</select>
		</td>

		<td>Wired or Wireless</td>
			<td>
			<input type="radio" id="wired" name="medium" value="wired">
			<label for="wired">Wired</label>

			<input type="radio" id="wireless" name="medium" value="wireless">
			<label for="wireless">Wireless</label>

			<input type="radio" id="both" name="medium" value="both">
			<label for="both">Both</label>
		</td>


	</tr>


	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Bandwidth Needed</td>

		<td>
			<select name="bandwidthNeeds">
			<option value='N/A'>N/A</option>
			<option value='5Mb'>5 Mb</option>
			<option value='10Mb'>10 Mb</option>
			<option value='15Mb'>15 Mb</option>
			<option value='20Mb'>20 Mb</option>
			<option value='25Mb'>25 Mb</option>
			<option value='50Mb'>50 Mb</option>
			<option value='100Mb'>100 Mb</option>
			<option value='500Mb'>500 Mb</option>
			<option value='1Gb'>1 Gb</option>
			</select>
		</td>
	</tr>
</table>
</br></br>
Select file to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit">
</form>
<?php
/*
<p>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</p>
*/?>
</body>

</html>
