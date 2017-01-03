@section('bg', 'grey60')
@section('sub_header')

    <nav class="mdl-navigation mt-nav-has-border">
        <a class="mdl-navigation__link red __active" href="">Local</a>
        <a class="mdl-navigation__link" href="">Most Viewed</a>
        <a class="mdl-navigation__link" href="">Favorites</a>
        <a class="mdl-navigation__link" href="">Showcase</a>
        <a class="mdl-navigation__link" href="">Latest</a>
    </nav>

@endsection

<section class="mdl-shadow--2dp dark">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.5143434572506!2d-16.724699685618848!3d13.44236099054827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec29a083f73013d%3A0xe8f413bd08a9e58f!2sSenegambia+Beach+Hotel!5e0!3m2!1sen!2sgm!4v1480378205768" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<div class="grid mt-row">
    
      <section class="mdl-grid designer-item center" id="">
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp demo-card-image">
            <!-- The header -->
            <header class="designer-item__header">
                  <a href="#" class="mt-shot-avatar" title="">
                      <img height="40" width="40" ng-src="/uploads/profiles/MyTailor.png" alt="">
                      <h2 class="mt-avatar-name">Afrodapp</h2>
                      <span>@afrodapp</span>
                      <p>Banjul, Gm</p>
                  </a>
             </header>
             <div class="mdl-card__title mdl-card--expand"></div>
             <div class="dimGradient"></div>
        </div>
      </section>

{{--       @forelse($designers as $designer)
    @empty
        <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>
    @endforelse --}}

</div>