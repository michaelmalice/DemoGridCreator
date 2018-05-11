<?php
$q = $_REQUEST["q"];
if (file_exists($q) && is_dir($q)) {
        shell_exec("rm -r $q");
	echo "succesful";
} else {
	echo "doesntExist";
}
?>
