<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

      <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

      <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Kasatmata</title>
  </head>
  <body>
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-target="#main-navbar">
            <span></span>
        </a>
      </div>
      <div class="side-inner">
        <div class="profile">
          <img src="{{ asset('images/person_profile.jpg') }}" alt="Image" class="img-fluid">
          <h3 class="name">Kasat Mata</h3>
          @guest
                @if (Route::has('login'))
                <a class="" href="{{ route('login') }}">
                    <span class="country"><strong> Login |</strong></span>
                </a>
                @endif
                @if (Route::has('register'))
                <a class="" href="{{ route('register') }}">
                    <span class="country"><strong>  Register</strong></span>
                </a>
                @endif
          @else
                @if (auth()->user()->level==1)
                <strong>
                    <span class="country">{{ Auth::user()->name }}</span>
                </strong>
                @else
                <strong>
                    <span class="country">{{ Auth::user()->name }}</span>
                </strong>
                @endif
          @endguest
        </div>
        <div class="nav-menu">
          <ul>
            <li><a href="{{ url('/home') }}"><span class="icon-home mr-3"></span>Home</a></li>
            <li><a href="{{ url('/product') }}"><span class="icon-tag mr-3"></span>Product</a></li>
            @if (Auth::user())
            @if (auth()->user()->level==1)
            <li><a href="{{ url('/add') }}"><span class="icon-plus mr-3"></span> Tambah Barang</a></li>
            @endif
            @endif
            @if (Auth::user())
            <li>
                <?php
                $keranjang_total = \App\Models\Keranjang::where('id_users', Auth::user()->id)->where('status', 0)->first();
                if (!empty($keranjang_total))
                {
                    $notif = \App\Models\Pembayaran::where('id_keranjangs', $keranjang_total->id)->count();
                }
                ?>
                <a href="{{ url('/keranjang') }}">
                    <i class="icon-shopping-cart mr-2"></i>
                    @if (!empty($notif))
                    <span class="badge badge-danger">{{$notif}}</span>
                    @endif
                    Keranjang
                </a>
            </li>
            @endif
            <li><a href="{{ url('/send') }}"><span class="icon-phone mr-3"></span>Contact Us</a></li>
            @if (Auth::user())
            @if (auth()->user()->level==1)
            <li>
                <?php
                $pesan_masuk = \App\Models\Contactus::first();
                if (!empty($pesan_masuk))
                {
                    $notif2 = \App\Models\Contactus::count();
                }
                ?>
                <a href="{{ url('/receive') }}">
                    <i class="icon-envelope mr-2"></i>
                    @if (!empty($notif2))
                    <span class="badge badge-danger">{{$notif2}}</span>
                    @endif
                    Pesan Masuk
                </a>
            @endif
            </li>
            <div>
                <li>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <span class="icon-sign-out mr-3"></span>Logout</a>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li>
            </div>
            @endif
          </ul>
        </div>
      </div>
    </aside>
    <main class="">
        @yield('content')
    </main>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
