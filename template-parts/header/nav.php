<nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
	<div class="container">
		<?php
			if (function_exists( 'the_custom_logo' )) {
				the_custom_logo();
			}
		?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		</div>
	</div>
</nav>