<?php
$q = $_REQUEST["q"];
if (file_exists($q)) {
	echo "alreadyExists";
} else {
shell_exec("mkdir $q");
shell_exec("cp -rp defaultUser/* $q");
echo "./$q/";
}
?>
