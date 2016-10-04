var elixir = require('laravel-elixir');
 	htmlmin = require('gulp-htmlmin'),
 	gulp = require('gulp'),


		/*
		 |--------------------------------------------------------------------------
		 | Elixir Asset Management
		 |--------------------------------------------------------------------------
		 |
		 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
		 | for your Laravel application. By default, we are compiling the Sass
		 | file for our application, as well as publishing vendor resources.
		 |
		 */
			gulp.task('compress', function() {
				var opts = {
					collapseWhitespace:    true,
					removeAttributeQuotes: true,
					removeComments:        true,
					minifyJS:              true
				};

				return gulp.src('./storage/framework/views/*')
						.pipe(htmlmin(opts))
						.pipe(gulp.dest('./storage/framework/views/'));
			});

			//var ngmin = require('gulp-ngmin');
            //
			//gulp.task('jsmin', function () {
			//	return gulp.src('./public/theme/default/assets/js/frontend.js')
			//		.pipe(ngmin({dynamic: true}))
			//		.pipe(gulp.dest('./public/theme/default/assets/js'));
			//});
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.assetsPath = 'vendor/bower_components';
elixir.config.publicPath = 'public/themes/default/assets';




	elixir(function(mix) {
        //mix main sass for our app
		mix.sass('../../../public/themes/default/assets/sass/admin.scss');
        mix.sass('../../../public/themes/default/assets/sass/frontend.scss');

         //This will mix vendor scripts
        //mix.scripts(
			//[
			//	'../jquery/dist/jquery.min.js',
			//    '../angular/angular.min.js',
			//    '../angular-animate/angular-animate.min.js',
			//    '../angular-messages/angular-messages.min.js',
			//   	'../angular-sanitize/angular-sanitize.min.js',
			//	'../mustache.js/mustache.min.js',
			//    '../Waves/dist/waves.min.js',
			//	'../ng-dialog/js/ngDialog.min.js',
        //        //'../jquery-infinite-scroll/jquery.infinitescroll.js',
			//	'../angular-ui-select/dist/select.min.js',
			//	'../wow/dist/wow.min.js',
			//	//	Custom Scrollbars
			//	//'../malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
			//	//'../jquery-mousewheel/jquery.mousewheel.min.js',
			//		//Pusher
			//	'../pusher-js-3.2.1/dist/web/pusher.min.js',
			//		'../pusher-angular-0.1.9/lib/pusher-angular.min.js',
			//	'../ng-scrollbars/dist/scrollbars.min.js',
			//	'../infinite-scroll/ng-infinite-scroll.min.js',
			//		'../angulargrid/angulargrid.min.js'
        //
        //
			//   ], 	 'public/themes/default/assets/js/vendor.js');

		// Frontend Scripts
		mix.scripts(
				[
					'../../../public/themes/default/assets/js/controllers/frontend/app.js',
					'../../../public/themes/default/assets/js/controllers/frontend/mainController.js',
					'../../../public/themes/default/assets/js/controllers/frontend/shotsController.js',
					'../../../public/themes/default/assets/js/controllers/frontend/ovalController.js',
					'../../../public/themes/default/assets/js/controllers/frontend/designersController.js',
					'../../../public/themes/default/assets/js/services/frontend/shot.js',
                    '../../../public/themes/default/assets/js/services/frontend/shots.js'
				],		'public/themes/default/assets/js/frontend.js');

		// Backend Scripts
		mix.scripts(
				[
					'../../../public/themes/default/assets/js/controllers/backend/app.js',
					'../../../public/themes/default/assets/js/controllers/backend/mainController.js',
					'../../../public/themes/default/assets/js/controllers/backend/shotsController.js',
					'../../../public/themes/default/assets/js/controllers/backend/pagesController.js',
					'../../../public/themes/default/assets/js/controllers/backend/dashboardController.js',
					'../../../public/themes/default/assets/js/services/backend/shot.js',
					'../../../public/themes/default/assets/js/services/backend/pages.js',
					'../../../public/themes/default/assets/js/services/backend/analytics.js'
				],		'public/themes/default/assets/js/backend.js');

	});
/*
 |--------------------------------------------------------------------------
 | Versioning & Caching
 |--------------------------------------------------------------------------*/

elixir(function(mix) {
	mix.version(['public/themes/default/assets/css/frontend.css']);
});