<section id="mt-search-container" style="
    background: #eee;
    position: relative;
    top: 0px;
    width: 100%; display: none;">

    <section class="mt-sub-header mdl-layout__header-row">
    	<div class='mdl-list' id="tags" style="opacity: 0;"></div>
	    <nav class="mdl-navigation mt-nav-has-border">
	        <a class="mdl-navigation__link" href="">Brands</a>
	        <a class="mdl-navigation__link" href="">People</a>
	        <a class="mdl-navigation__link red __active" href="">Shots</a>
	        <a class="mdl-navigation__link" href="">Designers</a>
	        <a class="mdl-navigation__link" href="">Events</a>
	    </nav>

	    <button id="search-menu-right"
	        class="icon-round mdl-button mdl-js-button mdl-button--icon top-menu-right">
	            <i class="icon-center mdi mdi-dots-vertical"></i>
	    </button>

	   <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="search-menu-right" id="category"></ul>

</section>
{{-- 	<div class="mdl-grid">

	    <div class="mdl-cell mdl-cell--12-col mt-grid grid" id="hits-container">
	    	<script type="text/html" id="hit-template">
				      <figure>
				            <a href="/shot/@{{name}}" class="mt-grid___link">
				                <div class="mt-image-holder">
				                    <img src="/uploads/@{{file_name}}" alt="@{{name}}">
				                </div>
				                <div class="dimOverlay"></div>
				                <figcaption>
				                    <span><img src="{{theme('images/icons/search67.svg')}}"></span>
				                </figcaption>
				            </a>
				      </figure>
			</script>
		    
	    </div>
	</div> --}}
</section>



{{-- <script type="text/html" id="no-results-template">
  <div id="no-results-message">
    <p>We didn't find any results for the search <em>"@{{query}}"</em>.</p>
    <a href="." class="clear-all">Clear search</a>
  </div>
</script> --}}