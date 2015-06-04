<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="stylesheet.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			<!--

			function init(){
				$("#about").click(function(){
					$("#content").html = "";
					<?php //wrong, redo later
						echo "$(\"#content\").html =";
						include "about.php";
					?>
				});
			}

			$(document).ready(function(){
				init();
			});

			// -->
		</script>
	</head>

	<body>
		<?php
			include 'header.php';
		?>
		
		<!-- Content Pane -->
		<div id="content">
			<!-- use ajax -->
		</div>

		<?php
			include 'footer.php';
		?>
	</body>
</html>