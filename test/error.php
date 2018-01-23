<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>error</title>
</head>
<style type="text/css">
	*{list-style: none;margin: 0;padding: 0;font-size: 18px;color:#888888;}
	.error{color: #B22222;}
	.warning{color: #EE9A00;}
	.notice{color: #555555;}
	
	.content{width:98%; 
		background-color: #F7F7F7; 
		margin: 0 auto;
		border: 1px solid #e3e3e3;
		border-radius:4px;
		-webkit-box-shadow:3px 3px 3px #f5f5f5;
		-moz-box-shadow:3px 3px 3px #f5f5f5;
		box-shadow:3px 3px 3px #f5f5f5;
	}
	
	.mt5{margin-top: 5px;}
	.mt20{margin-top: 20px;}

	.p10{padding: 10px;}
</style>
<body style="margin-bottom: 100px">
	<div style="margin-top: 30px">
		<div class='content mt20'>
			<div class="p10">
				<span class="<?php echo $type;?>">
					<?php echo $message . '<br>' . $content; ?>	
				</span>
			</div>
		</div>
		<?php if(!empty($trace)): ?>
			<div class='content mt5'>
				<div class="p10">
					<h3>Stack trace:</h3>
					<br>
					<?php echo nl2br(trim($trace)); ?>
				</div>
			</div>
		<?php endif;?>
	</div>
</body>
</html>