<!DOCTYPE html>
<html>
<head>
<title>Index</title>
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

	ul, li {
		text-align: center;
		list-style-position: inside;
		margin-left: auto;
	}


</style>
</head>
<body>

<h1 style="background-image:url(../intel.jpg);background-repeat: no-repeat;background-position: center;height: 352px;width: 1500px;margin:auto"></h1>

</br></br></br></br></br>

<input type="text" name="userName" id="userName">
<button onclick="createNewUser()" id="button">Create User</button>
<button onclick="deleteUser()" id ="deleteButton">Delete User</button>
</br>
<p id="confirmation"></p>
<a id="link"></a>
<script>


function createNewUser() {
        if (document.getElementById("userName").value.length == 0) {
                document.getElementById("confirmation").innerHTML = "Text Field Cannot Be Blank";
        } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                if (this.responseText === "alreadyExists") {
                                        document.getElementById("confirmation").innerHTML = "User already exists. Please try again.";
                                } else {
                                        document.getElementById("confirmation").innerHTML = "New user created for " + document.getElementById("userName").value;
                                        document.getElementById("link").setAttribute('href', this.responseText);
                                        document.getElementById("link").innerHTML = document.getElementById("userName").value;
                                }
                        }
                };
                xmlhttp.open("GET", "userCreator.php?q=" + document.getElementById("userName").value, true);
                xmlhttp.send();
        }
}

function deleteUser() {
        if (document.getElementById("userName").value.length == 0) {
                document.getElementById("confirmation").innerHTML = "Text Field Cannot Be Blank";
         } else if (document.getElementById("userName").value == "defaultUser") {
		document.getElementById("confirmation").innerHTML = "Invalid Username. Try again.";
	}

	 else {
                var response = confirm("Press OK to delete user " + document.getElementById("userName").value + " or Cancel to cancel");
                if (response == true) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                        if (this.responseText === "doesntExist") {
                                                document.getElementById("confirmation").innerHTML = "User doesn't exist. Please try again.";

                                        } else if (this.responseText === "succesful") {
                                                document.getElementById("confirmation").innerHTML = "User " + document.getElementById("userName").value + " has been deleted";
                                        }
                                }
                        };
                        xmlhttp.open("GET", "userDeletor.php?q=" + document.getElementById("userName").value, true);
                        xmlhttp.send();
                }
        }
}


document.getElementById("userName").addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode == 13) {
                document.getElementById("button").click();
        }
});
</script>


<?php
echo "
<h1>";echo basename(__DIR__); echo " Index</h1>
";

//loop through folders to show events and links to different event pages

foreach (new DirectoryIterator('./') as $user) {
	if (!$user->isDot() and $user->isDir() and $user != "defaultUser") {
		echo "
		<h2><a href=\"./$user/\">$user</a></h2>
		";
	}
}


/*
<ul>
	<li><a href="./grid.php">Grid Submission Form</a></li>
	<li><a href="./fullgrid.php">Full Grid</a></li>
</ul>
*/
?>
</body>
</html>
