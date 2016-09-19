			<footer class = "footerContainerWrapper dark">
          <section class="mt-load-more-wrapper">
                  <div class="mt-load-bar">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                  </div>
          </section>
			    <ul class="icons">
			      <li><a href="https://twitter.com/MyTailor_Africa" class="mdi mdi-twitter" title="Twitter"><span class="label"></span></a></li>
			      <li><a href="https://www.facebook.com/MyTailorAfrica/" class="mdi mdi-facebook" title="Facebook"><span class="label"></span></a></li>
			      <li><a href="#" class="mdi mdi-instagram"><span class="label"></span></a></li>
			      <li><a href="#" class="mdi mdi-google-plus"><span class="label"></span></a></li>   
			    </ul>
			    <ul class="copyright">
			      <li>&copy; 2016 MyTailor. All rights reserved.</li>
			    </ul>
			</footer>
                <!-- Black Screen -->
                <div class="mt-obfuscator" ng-class="{'show': toggle}" ng-click="toggleSidebar()"></div>
            
            </div> <!-- Page wrapper ends -->
            </div>

        {{-- Material --}}
        <script src="{{ theme('vendor/material-design-lite/material.min.js') }}"></script>
        {{-- Algolia --}}
        <script src="{{ theme('vendor/instantsearch.js/dist/instantsearch.min.js') }}"></script>
        {{-- Site Styles --}}
        <script src="{{ theme('js/frontend.js') }}"></script>
        <script src="{{ theme('js/mysearch.js') }}"></script>
        <script src="{{ theme('js/frontendScript.js') }}"></script>

        @yield('page_scripts')
        <script>
          // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          // ga('create', 'UA-56825866-2', 'auto');
          // ga('send', 'pageview');
        </script>

</body>
</html>
