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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<style>
		body {
			padding-top: 50px;
		}
		.starter-template {
			padding: 40px 15px;
			text-align: center;
		}

		.buttons {
			padding-top:30px;
		}
	</style>


	

</head>

<body>
	<div class="container">

		<div class="starter-template">
			<h1 class="copytext">Thou art <? echo $indefArt;?> <br> <span class="define" title="<?php echo defineWord($words[0]);?>" data-toggle="tooltip" data-placement="bottom"><?echo $words[0];?></span> <span class="define" title="<?php echo defineWord($words[1]);?>" data-toggle="tooltip" data-placement="bottom"><?echo $words[1];?></span> <span class="define" title="<?php echo defineWord($words[2]);?>" data-toggle="tooltip" data-placement="bottom" ><?echo $words[2];?></span></h1>
			<h4 class="buttons"><a href="./"><i class="fa fa-refresh"></i></a> &bull; <a href="?f=<?php echo $numbers[0];?>&s=<?php echo $numbers[1];?>&t=<?php echo $numbers[2];?>"><i class="fa fa-link"></i></a> &bull; <a href="#" id="copy-button" title="Copied!" data-clipboard-text="<?php echo $copyInsult; ?>"><i class="fa fa-clipboard"></i></a></h4>
			<small>Words from <a href="http://imgur.com/E1R5fo4" target="_blank">this imgur post</a> &bull; 122500 combinations &bull; Hover for definitions</small>
		</div>

	</div><!-- /.container -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
