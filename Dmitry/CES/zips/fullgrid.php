<!DOCTYPE html>
<html>
<head>
<title>Full Grid</title>
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

<table>
<?php
$csv = fopen("demoGrid.csv", "r");
$csvContents = fgetcsv($csv);
echo '<tr>';
foreach ($csvContents as $headerColumn) {
	echo "<th>$headerColumn</th>";
}
echo '</tr>';
while (($line = fgetcsv($csv)) !== false) {
	echo '<tr>';
	foreach ($line as $data) {
		echo "<td>$data</td>";
	}
	echo'</tr>';
}
fclose($csv);
?>

</table>

<h3>Click here for download</h3>

<a href="./demoGrid.csv" download>
<img border="0" src="./csv.png" width="104" height="100">
</a>

<a href="./zips/uploads.zip" download>
<img border="0" src="./zip.png" width="104" height="103">
</a>


</br>
<button onclick="clearCSV()">Clear CSV</button>
</br>
<script>
function clearCSV() {
        var response = confirm("Press OK to clear CSV or Cancel to cancel");
        if (response == true) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("demo").innerHTML = this.responseText;
                        }
                };
                xmlhttp.open("GET", "clearCSV.php", true);
                xmlhttp.send();
        }
}
</script>



</br>
<button onclick="clearUploads()">Clear Uploads</button>
</br>
<script>
function clearUploads() {
        var response = confirm("Press OK to clear Uploads folder or Cancel to cancel");
        if (response == true) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("demo").innerHTML = this.responseText;
                        }
                };
                xmlhttp.open("GET", "clearUploads.php", true);
                xmlhttp.send();
        }
}
</script>

<p id="demo"></p>


</body>
</html>
