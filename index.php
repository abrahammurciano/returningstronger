<?php /*header("Location: https://rebrand.ly/ReturningStronger");*/ ?>

<!DOCTYPE html>

<head>
	<title>
		Returning Stronger!
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="animation.css">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=DM+Mono:wght@500&family=Suez+One&display=swap" rel="stylesheet">
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
				<h2 class="hebrew-subtitle">
					ואני ברוב חסדך אבוא ביתך
				</h2>
				<div class="description">
					<span class="highlight">
						Hashem has very kindly given us the merit to return to His Home!
						<br>
						Let's commit בלי נדר for the next 30 days to switch our mobile phones onto flight mode before
						entering the Bet Hakeneset and not converse inside the synagogue.
					</span>
				</div>
				<form class="commit-form" action="#">
					<input name="name" type="text" placeholder="Your name" maxlength="25" required pattern="^(?:(?:[A-Za-z]+|[A-Za-z]{1,3}\.|(?:[A-Z]\.)+[A-Z]?)[ -]?){1,3}(?: (?:[A-Z]\.)+[A-Z]?)?$" title="That is a made-up name. What is your real name?">
					<input type="submit" value="Commit" class="g-recaptcha" data-sitekey="6LdMevwUAAAAANfXXa4-Sf1MAG3Ty-v0uo7TPbUz" data-callback="commit_submit">
				</form>
				<h2 class="success">You've committed! Chazak Ubaruch!</h2>
			</div>
			<div class="photo-credit">Photos credit to Moshe Baruch Gross</div>
		</div>
	</div>
	<div class="names-section-shadow">
		<?php

		$names = "";
		$count = 0;

		$handle = fopen("names.dat", "r");
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				$names .= "<div class='name'>$line</div>\n";
				++$count;
			}
			fclose($handle);
		} else {
			echo ('There has been an error fetching the names.');
		}

		?>
		<div class="names-section">
			<h1>
				<span class="count"><?php echo ($count); ?></span> people have committed!
			</h1>
			<div class="names">
				<?php echo ($names); ?>
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