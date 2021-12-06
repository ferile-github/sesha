
<div class="bs-docs-section mb-5">

<h1 class="bs-docs-title"  id="swatches">Swatches</h1>

<div class="d-flex swatches flex-wrap mb-3">

<?php
foreach ($GLOBALS['theme_colors'] as $key => $value) {
	$var = 'var(--sb-'.strtolower($key).')';
	$text = '#fff';
	if($value === '#ffffff' || $value === '#fff') {
		$text = '#000';
	}
	echo '<div class="swatch" style="background-color: '.$var.'; color :'.$text.'">'
		.$key.
		'<span class="swatch-label"  style="background-color: '.$var.'; color :'.$text.'">'.$value.'</span>
	</div>';
}
?>
</div>


<style>
	.swatches {
		gap: 2rem .5rem;
	}
		.swatch {
			flex: 1 100px;
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
			color: white;
			padding: .8rem 1.2rem;
			border: solid 1px silver;
			cursor: help;
		}
			.swatch-label {
				position: absolute;
				display: block;
				left: 0;
				right: 0;
				bottom: calc(100% + 2px);
				text-align: center;
				opacity: 0;
				transition: 200ms linear all;
				transform: translateY(20px);
			}
			.swatch:hover .swatch-label {
				opacity: 1;
				transform: translateY(0);
			}

</style>

</div>