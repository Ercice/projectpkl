<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>
    
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">Aplikasi Izin Cuti</a>
                <a class="navbar-brand hidden" href="">A</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href=" {{ url('/home') }}"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    {{-- <h3 class="menu-title">Data</h3> --}}
                    <!-- /.menu-title -->

                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-th"></i>Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if (auth()->user()->level=="admin")
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('datapegawai') }}">Pegawai</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izincuti') }} ">Izin Cuti Tahunan</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinbelajar') }} ">Izin Cuti Belajar/Kuliah</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinsakit') }} ">Izin Cuti Sakit</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinpenting') }} ">Izin Cuti Penting</a></li>
                            @elseif (auth()->user()->level=="operator")
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izincuti') }} ">Izin Cuti Tahunan</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinbelajar') }} ">Izin Cuti Belajar/Kuliah</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinsakit') }} ">Izin Cuti Sakit</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('izinpenting') }} ">Izin Cuti Penting</a></li>
                            @elseif (auth()->user()->level=="user")
                            <li><i class="menu-icon fa fa-th"></i><a href=" {{ url('datapegawai') }} ">Pegawai</a></li>
                            @endif
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            <i class="menu-icon fa fa-file"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if (auth()->user()->level=="admin")
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('datapegawai/cetak') }}"  target="_blank">Data Pegawai</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izincuti/cetak') }}"  target="_blank">Data Izin Cuti Tahunan</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinbelajar/cetak') }}"  target="_blank">Data Izin Cuti Belajar/Kuliah</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinsakit/cetak') }}" target="_blank">Data Izin Cuti Sakit</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinpenting/cetak') }}"  target="_blank">Data Izin Cuti Penting</a></li>
                            @elseif (auth()->user()->level=="operator")
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izincuti/cetak') }}"  target="_blank">Data Izin Cuti Tahunan</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinbelajar/cetak') }}"  target="_blank">Data Izin Cuti Belajar/Kuliah</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinsakit/cetak') }}" target="_blank">Data Izin Cuti Sakit</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a href=" {{ url('izinpenting/cetak') }}"  target="_blank">Data Izin Cuti Penting</a></li>
                            @endif
                        </ul>

                    <li>
                        <a href=" {{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> <i class="menu-icon fa fa-sign-out" class="dropdown-item"></i>
                        {{ __('Logout') }} 
                    </a>     
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    </li>
                   
                    {{-- <li>
                        <a href=""> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon fa fa-puzzle-piece"></i>Data Pegawai </a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon fa fa-puzzle-piece"></i>Data Izin Cuti Tahunan </a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon fa fa-puzzle-piece"></i>Data Izin Cuti Belajar / Kuliah </a>
                    </li>
                    <li>
                        <a href=""> <i class="menu-icon fa fa-puzzle-piece"></i>Data Kenaikan Gaji </a>
                    </li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            
            <div class="header-menu">
                
                <div class="col-sm-7">
                    
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    
                    <p style="font-size: 20pt" style="text-align: center">KEJAKSAAN TINGGI KALIMANTAN SELATAN</p>
                    <div class="header-left">
                        {{-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form> --}}
                        </div>
                        {{-- <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                          </div>
                        </div> --}}
                    {{-- </div> --}}
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}"> --}}
                            
                                <i class="menu-icon fa fa-user" a href="#" class="d-block"> {{auth()->user()->name}} / {{auth()->user()->level}}</i>  </a>
                            
                        </a>
                        {{-- <div class="user-menu dropdown-menu">
                            {{-- <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> --}}
                            {{-- <a href="#" class="d-block">{{auth()->user()->name}}</a> --}}
                            {{-- <a class="nav-link" href=""><i class="fa fa-power -off"></i>Logout</a> --}}
                        {{-- </div> --}}
                        
                    </div>

                    {{-- <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-jp"></i>
                            </div>
                        </div>
                    </div> --}}

                </div>
                
            </div>

        </header><!-- /header -->

        @yield('breadcrumbs')

        @yield('content')

    </div>    

    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
</body>
</html>