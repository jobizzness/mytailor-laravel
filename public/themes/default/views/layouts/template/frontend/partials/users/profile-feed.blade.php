{{--Box that tells you to post something on their wall --}}

<section class="poster-card mdl-shadow--2dp">
	<div style="width:100%;">
		<div class="mt-post--object flex-center">
			<h1 id="ngdialog1-aria-labelledby">Drag &amp; drop photos or </h1> 
			<!-- Colored FAB button with ripple -->
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
			  Upload
			</button>
		</div>
	</div>
</section>

{{-- Users Posts --}}
@include('layouts.template.frontend.partials.pages.shots-feed')