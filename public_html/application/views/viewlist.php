		<?php 
			for ($i = count($notes)-1; $i > -1; $i--) {
				print "<h1><a href='/blog/read/" . $notes[$i]['id'] . "'>" . $notes[$i]['title'] . "</a></h1>";
				print $notes[$i]['content'];
			}
		?>
