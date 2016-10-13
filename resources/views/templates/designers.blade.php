@section('bg', 'grey60')
@section('sub_header')

    <nav class="mdl-navigation mt-nav-has-border">
        <a class="mdl-navigation__link" href="">Latest</a>
        <a class="mdl-navigation__link" href="">Most viewed</a>
        <a class="mdl-navigation__link red __active" href="">Favorites</a>
        <a class="mdl-navigation__link" href="">Showcase</a>
        <a class="mdl-navigation__link" href="">Local</a>
    </nav>

@endsection

<div class="grid">

    @forelse($designers as $designer)

      <section class="mdl-grid designer-item" id="{{$designer->user['id']}}">
          <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp pad-1 mdl-grid">
            <!-- Designer info section-->
            <div class="mdl-cell mdl-cell--3-col pad-1">
                <a href="#" class="mt-avatar__link"><h3>{{$designer->profile['username']}}<p>Sarasota, FL</p></h3></a>
                <a href="" class="mt-avatar-circle">
                   <img height="175" width="175" src="/uploads/profiles/{{$designer->profile['avatar']}}" alt="{{$designer->profile['username']}}">
                </a>
                <h3 class="mt-title__text">About Me</h3>
                <p class="mt_support__text">{{$designer->profile['bio']}}</p>
            </div>
          </div>
      </section>

    @empty
        <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>
    @endforelse

</div>