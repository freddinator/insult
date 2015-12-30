<?php
require_once 'includes.php';

if (!isset($_GET["f"]) || !isset($_GET["s"]) || !isset($_GET["t"])) {
	$data = getInsult();
} else {
	$data= getInsult($_GET["f"], $_GET["s"], $_GET["t"]);
}

$words = $data[0];
$numbers = $data[1];

$indefArt = GetIndefArt($words[0]);

$copyInsult = "Thou art $indefArt $words[0] $words[1] $words[2]"

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Insult Generator</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style>
		body {
			/*padding-top: 50px;*/
			margin-bottom: 120px;
		}
		.starter-template {
			padding: 40px 15px;
			text-align: center;
			white-space: pre-wrap;
		}

		.buttons {
			padding-top:30px;
		}

		html {
			position: relative;
			min-height: 100%;
		}
		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			/* Set the fixed height of the footer here */
			height: 120px;
			line-height: 60px; /* Vertically center the text there */
			text-align: center;
		}

	</style>


	

</head>

<body>
	<div class="container">

		<div class="starter-template">
			<h1 class="display-1">Thou art <? echo $indefArt;?> <br> <span class="define" title="<?php echo defineWord($words[0]);?>" data-toggle="tooltip" data-placement="bottom"><?echo $words[0];?></span> <span class="define" title="<?php echo defineWord($words[1]);?>" data-toggle="tooltip" data-placement="bottom"><?echo $words[1];?></span> <span class="define" title="<?php echo defineWord($words[2]);?>" data-toggle="tooltip" data-placement="bottom" ><?echo $words[2];?></span></h1>
		</div>

	</div><!-- /.container -->

	<footer class="footer">
		<div class="container">
			<h4 class="buttons"><a href="./"><i class="fa fa-refresh"></i></a> &bull; <a href="?f=<?php echo $numbers[0];?>&s=<?php echo $numbers[1];?>&t=<?php echo $numbers[2];?>"><i class="fa fa-link"></i></a> &bull; <a href="#" id="copy-button" title="Copied!" data-clipboard-text="<?php echo $copyInsult; ?>"><i class="fa fa-clipboard"></i></a></h4>
			<small>Words from <a href="http://imgur.com/E1R5fo4" target="_blank">this imgur post</a> &bull; 122500 combinations &bull; Hover for definitions &bull; <a href="https://github.com/freddinator/insult"><i class="fa fa-github"></i></a></small>
		</div>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.1.1/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.2/clipboard.min.js"></script>

	<script type="text/javascript">
		new Clipboard('#copy-button');

		$( "#copy-button" ).click(function() {
			$('#copy-button').tooltip({
				'placement': 'bottom',
				'trigger': 'manual'

			}).tooltip('show');

			$('#copy-button').blur();

			setTimeout(function(){
				$('#copy-button').tooltip('hide');
			}, 800);
		});

		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		});
	</script>

</body>
</html>
