        //========== Instant Search JS ==========

    var options = {
          appId : 'RQO4LL16TO',
          apiKey : '53a754b22aa63d7a38a04c9ee76f596a',
          indexName : 'shots',
          urlSync: true
        }


        search = instantsearch(options);

          search.addWidget(
            instantsearch.widgets.searchBox({
              container: '#search-box',
              placeholder: 'search for items like men, women, shirts, shoes and more ...',

            })
          ); 

          search.addWidget(
            instantsearch.widgets.hits({
              container: '#hits-container',
              hitsPerPage: 10,
              templates: {
                item: getTemplate('hit'),
                empty: getTemplate('no-results')
              },
              cssClasses: {
                item: 'grid-item'
              }
            })
          );

          search.on('render', function(){

              //$('.grid>.ais-hits').masonry();
            });


                               // angular.element($target).injector().invoke(function($compile){
                               //  var $scope = angular.element($target).scope();
                               //      $compile($newElems)($scope);
                               //      $scope.$apply();

                               // });
                        //$newElems.show();





        search.addWidget(
          instantsearch.widgets.refinementList({
            container: '#tags',
            attributeName: 'tags.tag_name',
            limit: 10,
            sortBy: ['isRefined', 'count:desc', 'name:asc'],
            operator: 'or',
            cssClasses: {
            },
            templates: {
            }
          })
        );

        search.addWidget(
          instantsearch.widgets.menu({
            container: '#category',
            attributeName: 'category',
            limit: 10,
            // sortBy: ['isRefined', 'count:desc', 'name:asc'],
            templates: {
              item:'<a class="ais-menu--link" href="{{url}}">{{name}} <span class="ais-menu--count" style="font-weight: 100;">({{count}})</span></a>'
            }
          })
        );

        function getTemplate(templateName) {
          return document.getElementById(templateName + '-template').innerHTML;
        }
          search.start();