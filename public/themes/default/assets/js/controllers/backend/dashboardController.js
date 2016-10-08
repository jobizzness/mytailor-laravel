(function () {
   'use strict';


	app.controller("DashboardController", ["$scope","maFactory", "$timeout",

		function($scope, maFactory, $timeout) {

			// $scope.users_count = $scope.users.new_users.itemsPerPage;

			/**
			 * shows data about a single shot.s
			 *
			 * @param id
			 *
             */
			$scope.ma_get_users = function(id){
			 		 maFactory.ma_get_users().then(function(response){
			 				loadCharts(response.data);

			 		});
			 	};

			$timeout(function(){

			 		 	$scope.ma_get_users();    

			 		 }, 500);

				var loadCharts = function($data){

					$scope.ma = $data;

					/**
					* Page Views Chart
					*
					*/
					$scope.chart = c3.generate({
			                bindto: '#chart1',
			                data: {
			                    columns: [
				                    $data.pageViewsAndVisitors.pageViews,
				                    $data.pageViewsAndVisitors.visitors
			                  	]
			                },
		                	color: {
				                pattern: ['#fff', '#e91e63']
				            },
				            axis: {
				            	x: {show: false},
				            	y: {show:false}
				            }
			            });

					/**
					* New vs Returning Chart
					*
					*/
					$scope.chart = c3.generate({
			                bindto: '#pie1',
			                data: {
				                columns: [
						            ['New', $data.nvr_session.new],
						            ['Returning', $data.nvr_session.returning],
						        ],
						        type : 'pie'
					    	},
					    	size: {
								height: 220,
								width: 200
							},
							 color: {
							 	pattern:['#03a9f4', '#259b24']
							  },

			            });


		            }; 


			 }]);


})();