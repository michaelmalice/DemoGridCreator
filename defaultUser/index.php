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

<input type="text" name="eventName" id="eventName">
<button onclick="createNewEvent()" id="button">Create Event</button>
<button onclick="deleteEvent()" id="deleteButton">Delete Event</button>
</br>
<p id="confirmation"></p>
<a id="link"></a>
<script>


function createNewEvent() {
        if (document.getElementById("eventName").value.length == 0) {
                document.getElementById("confirmation").innerHTML = "Text Field Cannot Be Blank";
        } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                if (this.responseText === "alreadyExists") {
                                        document.getElementById("confirmation").innerHTML = "Event already exists. Please try again.";
                                } else {
                                        document.getElementById("confirmation").innerHTML = "New event grid created for " + document.getElementById("eventName").value;
                                        document.getElementById("link").setAttribute('href', this.responseText);
                                        document.getElementById("link").innerHTML = document.getElementById("eventName").value;
                                }
                        }
                };
                xmlhttp.open("GET", "eventCreator.php?q=" + document.getElementById("eventName").value, true);
                xmlhttp.send();
        }
}

function deleteEvent() {
	if (document.getElementById("eventName").value.length == 0) {
		document.getElementById("confirmation").innerHTML = "Text Field Cannot Be Blank";
	} else if (document.getElementById("eventName").value == "defaultEvent") {
		document.getElementById("confirmation").innerHTML = "Invalid event name. Please try again.";
	}  else {
		var response = confirm("Press OK to delete event " + document.getElementById("eventName").value + " or Cancel to cancel");
		if (response == true) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if (this.responseText === "doesntExist") {
						document.getElementById("confirmation").innerHTML = "Event doesn't exist. Please try again.";

					} else if (this.responseText === "succesful") {
						document.getElementById("confirmation").innerHTML = "Event " + document.getElementById("eventName").value + " has been deleted";
					}
				}
			};
			xmlhttp.open("GET", "eventDeletor.php?q=" + document.getElementById("eventName").value, true);
			xmlhttp.send();
		}
	}
}

document.getElementById("eventName").addEventListener("keyup", function(event) {
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

foreach (new DirectoryIterator('./') as $event) {
	if (!$event->isDot() and $event->isDir() and $event != "defaultEvent") {
		echo "
		<h2> $event </h2>
		<ul>
		<li><a href=\"./$event/grid.php\">Grid Submission Page</a></li>
		<li><a href=\"./$event/fullgrid.php\">Full Grid</a></li>
		</ul>
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
