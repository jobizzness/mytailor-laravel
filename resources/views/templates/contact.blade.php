@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="mdl-shadow--2dp dark">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.5143434572506!2d-16.724699685618848!3d13.44236099054827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec29a083f73013d%3A0xe8f413bd08a9e58f!2sSenegambia+Beach+Hotel!5e0!3m2!1sen!2sgm!4v1480378205768" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<main class="mt-row">
		<div class="mdl-card mdl-shadow--2dp pad-1 card--full header_card">
			<p class="title font-large-font-300">
				Get in touch
			</p>
		</div>

		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp pad-1">
				<form action="#" class="contact-form">
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" id="fname">
				    <label class="mdl-textfield__label" for="fname">First Name</label>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" id="lname">
				    <label class="mdl-textfield__label" for="lname">Last Name</label>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="email" id="email">
				    <label class="mdl-textfield__label" for="email">Email</label>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4">
				    <label class="mdl-textfield__label" for="sample4">Phone</label>
				    <span class="mdl-textfield__error">Input is not a number!</span>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield" style="width: 100%;">
				    <textarea class="mdl-textfield__input" type="text" rows= "6" id="sample5" ></textarea>
				    <label class="mdl-textfield__label" for="sample5">Message</label>
				  </div>

				  <center>
					  	<!-- Accent-colored raised button with ripple -->
						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
						  SEND<i class="mdi mdi-send"></i>
						</button>
				  </center>
				</form>		
			</div>
			<div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp">
					<h5 class="">Find us</h5>
					<ul class="footer-link-icons">
						<li>
							<a href="#!" class="grey-text darken-3">
								<i class="mdi mdi-map-marker"></i> 60 Wall St, New York
							</a>
						</li>
						<li>
							<a href="#!" class="grey-text darken-3">
								<i class="mdi mdi-email-outline"></i> info@info.com
							</a>
						</li>
						<li>
							<a href="#!" class="grey-text darken-3">
								<i class="mdi mdi-phone"></i> +333 645 8081
							</a>
						</li>
					</ul><br>
					<h5>Social</h5><br>

					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-facebook colored">
						<img src="/material_concept/images/social/ic_face.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-instagram colored">
						<img src="/material_concept/images/social/ic_insta.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-twitter colored">
						<img src="/material_concept/images/social/ic_twitter.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-google colored">
						<img src="/material_concept/images/social/ic_google.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-youtube colored">
						<img src="/material_concept/images/social/ic_youtube.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-blogger colored">
						<img src="/material_concept/images/social/ic_blogger.png" alt="">
					</a>
					<a href="#!" class="btn waves-effect btn-flat btn-floating btn-social btn-dribbble colored">
						<img src="/material_concept/images/social/ic_dribbble.png" alt="">
					</a>
			</div>
		</div>
	</main>