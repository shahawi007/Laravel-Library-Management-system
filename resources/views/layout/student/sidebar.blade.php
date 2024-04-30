{{-- <p class="text-center" style="color: white;">welcome, @if (Auth::user()) {{Auth::user()->name}} @endif</p> --}}
<a href="/" class="dash-nav-item"><i class="fas fa-home"></i> Explore Library </a>
<a href="/borrowed-books" class="dash-nav-item"><i class="fas fa-book"></i> Borrowed Books </a>
<a href="{{route('showProfile')}}" class="dash-nav-item"><i class="fas fa-user"></i> My Profile </a>
<a href="/logout" class="dash-nav-item"><i class="fas fa-door-open"></i> Logout </a>