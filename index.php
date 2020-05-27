<!DOCTYPE html>

<head>
	<title>
		Returning Stronger!
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="animation.css">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=DM+Mono:wght@500&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
	<div class="sign-up-section-background">
		<div class="sign-up-section-overlay">
			<div class='sign-up-section'>
				<h1>
					Returning Stronger!
				</h1>
				<!--TODO-->
				<div class="description">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Fringilla est ullamcorper eget nulla. Rutrum quisque non tellus
					orci ac auctor augue. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue.
				</div>
				<form class="commit-form" action="#">
					<input name="name" type="text" placeholder="Your name" maxlength="25" pattern="^(?:(?:[A-Za-z]+|[A-Za-z]{1,3}\.|(?:[A-Z]\.)+[A-Z]?)[ -]?){1,3}(?: (?:[A-Z]\.)+[A-Z]?)?$" title="That is a made-up name. What is your real name?">
					<input type="submit" value="Commit" class="g-recaptcha" data-sitekey="6LdMevwUAAAAANfXXa4-Sf1MAG3Ty-v0uo7TPbUz" data-callback="commit_submit">
				</form>
				<h2 class="success">You've committed! Great job!</h2>
			</div>
		</div>
	</div>
	<div class="names-section-shadow">
		<div class="names-section">
			<h1>
				Who has committed?
			</h1>
			<div class="names">
				<?php

				$handle = fopen("names.dat", "r");
				if ($handle) {
					while (($line = fgets($handle)) !== false) {
						echo ("<div class='name'>$line</div>\n");
					}

					fclose($handle);
				} else {
					echo ('There has been an error fetching the names.');
				}

				?>
			</div>
		</div>
	</div>
	<div class="am-design-wrapper">
		<img class="am-design" src="am-design.svg" alt="Abraham Murciano Graphic Design" srcset="">
	</div>
	<script src="names.js"></script>
	<script src="form.js"></script>
	<script>
		$(document).ready(function() {
			$("a[href^='https://www.000webhost.com/']").parent().remove();
		});
	</script>
</body>