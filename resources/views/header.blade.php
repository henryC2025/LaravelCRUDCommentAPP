{{-- <div class="col-md-12 card-header text-center items-center	" style=display:inline-block>

    <h1 class="header-title1">Comment</h1>

    <img src=" {{URL::asset("/images/icon.png")}}" alt="profile Pic" height="80" width="80">
<h1 class="header-title2">Application</h1>

</div> --}}


<div class="col-md-12 card-header text-center items-center	" style=display:inline-block>

    <a href="/">

        <h1 class="header-title">Comment<img class=inline src=" {{URL::asset("/images/icon.png")}}">Application</h1>

    </a>

</div>

<div class="col-md-12 card-header text-center items-center	">
    @auth
    <h1 CLASS="name-title">LOGGED IN AS {{ strtoupper(auth()->user()->name) }}</h1>
    @endauth
    @guest
    <h1 CLASS="name-title">{{ strtoupper("Guest") }}</h1>
    @endguest
</div>
