@section('navigation', 'content')
<div class="row">

    <div class="col-md-12 card-header text-center font-weight-bold navbar">

        {{-- <button class="btn btn-nav" onclick="document.location='/'">Home</button>
        <button class="btn btn-nav" onclick="document.location='/ajax-all-comments-crud'">View All Comments</button>
        <button class="btn btn-nav" onclick="document.location='/ajax-results-crud'">Add Results</button>
        <button class="btn btn-nav" onclick="document.location='/ajax-terminology-crud'">Add Terminology</button>
        <button class="btn btn-nav" onclick="document.location='/ajax-validate-crud'">Validate Comments</button>
        <button class="btn btn-nav" onclick="document.location='/ajax-edit-crud'">Edit Comments</button> --}}

        <nav>
            <a class="nav-link nav-link-ltr" href="/ajax-all-comments-crud">View All Comments</a>
            <a class="nav-link nav-link-ltr" href="/ajax-results-crud">Add Results</a>
            <a class="nav-link nav-link-ltr" href="/ajax-terminology-crud">Add Terminology</a>
            <a class="nav-link nav-link-ltr" href="/ajax-validate-crud">Validate Comments</a>
            <a class="nav-link nav-link-ltr" href="/ajax-edit-crud">Edit Comments</a>
            @guest
            <a class="nav-link nav-link-ltr" href="/login">Log-in</a>
            <a class="nav-link nav-link-ltr" href="/register">Register</a>

            @endguest

            @if(auth()->check())
            <a class="nav-link nav-link-ltr" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
        </nav>

    </div>
</div>
