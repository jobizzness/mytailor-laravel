@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="mdl-shadow--2dp dark">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.5143434572506!2d-16.724699685618848!3d13.44236099054827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec29a083f73013d%3A0xe8f413bd08a9e58f!2sSenegambia+Beach+Hotel!5e0!3m2!1sen!2sgm!4v1480378205768" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<main class="mt-row">
		<div class="mdl-card mdl-shadow--2dp pad-1 card--full header_card center">
			<h2 class="mt-heading red">Need Something ?</h2>
			<p>
				Huh ! What took you so long <img class="img" aria-hidden="1" height="16" src="https://www.facebook.com/images/emoji.php/v6/f52/1/16/1f648.png" width="16" alt="">. We've been waiting.
			</p>
		</div>

		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp pad-1">
				<form action="#" class="contact-form">
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" id="fname">
				    <label class="mdl-textfield__label" for="fname">Name</label>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="email" id="email">
				    <label class="mdl-textfield__label" for="email">Email</label>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield" style="width: 100%;">
				    <textarea class="mdl-textfield__input" type="text" rows= "6" id="sample5" ></textarea>
				    <label class="mdl-textfield__label" for="sample5">Message</label>
				  </div>

				  <center>
					  	<!-- Accent-colored raised button with ripple -->
						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
						  SEND
						</button>
				  </center>
				</form>		
			</div>
			<div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp pad-1 contact-info">
					<h5 class="title">Contact Detail</h5>
					<ul class="contact-links">
						<li class="contact-link">
								<i class="mdi mdi-map-marker"></i> Jalan 3/149e, Taman Sri Endah, 57000 Kuala Lumpur
						</li>
						<li class="contact-link">
							<a href="#" class="">
								<i class="mdi mdi-email-outline"></i> afrodapp@gmail.com
							</a>
						</li>
						<li class="contact-link">
							<i class="mdi mdi-phone"></i> +60 1153 371 748
						</li>
					</ul><br>
			</div>
		</div>
	</main>