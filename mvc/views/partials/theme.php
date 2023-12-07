<style type="text/css">
	<?php
	// Loop through each element in the $data["GetTheme"] array
	foreach ($data["GetTheme"] as $value) {
		// Echo a CSS class for background color 1
		echo '.bg1{
			background: '.$value['color1'].';
		}
		';
		// Echo a CSS class for background color 2
		echo '.bg2{
			background: '.$value['color2'].';
		}
		';
		// Echo a CSS class for background color 3
		echo '.bg3{
			background: '.$value['color3'].';
		}
		';
		// Echo a CSS class for text color
		echo '.cl{
			color: '.$value['color4'].';
		}';
	}
	?>
</style>