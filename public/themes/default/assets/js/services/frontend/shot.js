	app.factory('shotFactory', ['$http', function($http){

			// will return object of a single shot
			this.show = function (name) {
			  	return $http.get("/api/shot/" + name);
			};

			this.viewed = function(name){
				return $http.post("/api/shot/viewed/" + name);
			};

			this.getParmalinks = function(){
				var data = [
					{name:'Type', dropElements: [

						{link: '/explore/african-prints-shirts', text: 'Shirt'}, {link: '/explore/african-fashion-dress', text: 'Dresses'},
						{link: '/explore/african-fashion-blazers', text: 'Blazers'}, {link: '/explore/african-fashion-outfits', text: 'Outfits'},
						{link: '/explore/african-fashion-jackets', text: 'Jackets'}, {link: '/explore/african-fashion-prints-women', text: 'Women'},
						{link: '/explore/african-prints-pants', text: 'Pants'}, {link: '/explore/african-fashion-prints-bikini', text: 'Bikini'},
						{link: '/explore/african-prints-swimwear', text: 'Swimwear'}, {link: '/explore/african-fashion-prints-tops', text: 'Tops'},
						{link: '/explore/african-prints-skirts', text: 'Skirts'}, {link: '/explore/african-fashion-prints-hijab', text: 'Hijab'},
						{link: '/explore/african-fashion-prints-men', text: 'For Men'}, {link: '/explore/african-fashion-prints-summer-wears', text: 'summer'},
						{link: '/explore/african-prints-shorts', text: 'Shorts'}
					]},

					{name:'Style', dropElements: [

						{link: '/explore/african-fashion-prints', text: 'Prints'}, {link: '/explore/african-fashion-classic-wears', text: 'Classic'},
						{link: '/explore/african-prints-modern', text: 'Modern'}, {link: '/explore/african-fashion-classic-wears', text: 'Classic'},
						{link: '/explore/african-fashion-prints-ankara', text: 'Ankara'}, {link: '/explore/african-prints-kitenge', text: 'Kitenge'},
						{link: '/explore/african-fashion-prints-leather', text: 'Leather'}, {link: '/explore/african-fashion-prints-ankara', text: 'Ankara'},
						{link: '/explore/african-prints-lace', text: 'Lace'}, {link: '/explore/african-fashion-prints-dashiki', text: 'Dashiki'}
					]},

					{name:'Accessories', dropElements: [

						{link: '/explore/african-prints-necklace', text: 'Necklaces'}, {link: '/explore/african-prints-headwrap', text: 'Head wrap'}
					]},

					{name:'Occassional', dropElements: [

						{link: '/explore/african-prints-wedding', text: 'Wedding'}, {link: '/explore/african-prints-work-wears', text: 'work'},
						{link: '/explore/african-prints-party-wear', text: 'Party'}, {link: '/explore/african-prints-special', text: 'special'}
					]},
				];
				return data;
			}

			// this.update = function(id, shot){
			// 	return $http.put('/admin/shots/' + id, shot);
			// };

			// this.destroy = function(name){
			// 	return $http.delete('/admin/shots/' + name);
			// };

			return this;
	}]);
