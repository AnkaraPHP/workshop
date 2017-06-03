@extends("layout.master")

@section("body")
    <header class="app-header navbar">
        <button type="button" class="navbar-toggler mobile-sidebar-toggler d-lg-none">☰</button><a href="{{ route('team.show', [$team->slug]) }}" class="navbar-brand"></a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item"><a href="#" class="nav-link navbar-toggler sidebar-toggler">☰</a></li>
            <li class="nav-item px-3 active"><a href="{{ route('team.show', [$team->slug]) }}" class="nav-link">{{ $team->name }}</a></li>
        </ul>
        <ul class="nav navbar-nav ml-auto px-1">
            <li class="nav-item dropdown"><a data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle nav-link"><img src="https://api.adorable.io/avatars/50/{{ auth()->user()->email }}.png" alt="{{ auth()->user()->email }}" class="img-avatar"><span class="d-md-down-none">{{ auth()->user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center"><strong>AnkaraPHP Takım</strong></div><a href="#" class="dropdown-item"><i class="fa fa-users"></i> Kişiler<span class="badge badge-success">5</span></a><a href="#" class="dropdown-item"><i class="fa fa-wrench"></i> Ayarlar</a>
                    <div class="dropdown-header text-center"><strong>Hesap</strong></div><a href="#" class="dropdown-item"><i class="fa fa-user"></i> Profil Bilgileri</a><a href="#" class="dropdown-item"><i class="fa fa-wrench"></i> Ayarlar</a>
                    <div class="divider"></div><a href="#" class="dropdown-item"><i class="fa fa-shield"></i> Kilitle</a><a href="{{ route('auth.logout') }}" class="dropdown-item"><i class="fa fa-lock"></i> Çıkış Yap</a>
                </div>
            </li>
        </ul>
    </header>
    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item"><a href="{{ route('team.show', [$team->slug]) }}" class="nav-link"><i class="icon-chart"></i> Pano</a></li>
                    <li class="nav-title">PROJE YÖNETİMİ</li>
                    <li class="nav-item"><a href="{{ route('team.project.index', [$team->slug]) }}" class="nav-link"><i class="icon-book-open"></i> Projeler<span class="badge badge-danger">5</span></a></li>
                    <li class="nav-item"><a href="customers.html" class="nav-link"><i class="icon-user"></i> Müşteriler<span class="badge badge-info">8</span></a></li>
                    <li class="nav-item"><a href="files.html" class="nav-link"><i class="icon-share"></i> Dosya Merkezi<span class="badge badge-danger">98%</span></a></li>
                    <li class="nav-item"><a href="passwords.html" class="nav-link"><i class="icon-lock-open"></i> Şifre Yöneticisi<span class="badge badge-default">8</span></a></li>
                    <li class="divider"></li>
                    <li class="nav-title">TAKIM</li>
                    <li class="nav-item"><a href="team.html" class="nav-link"><i class="icon-people"></i> Ekip<span class="badge badge-warning">2</span></a></li>
                </ul>
            </nav>
        </div>
        <main class="main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">FPMS</li>
                <li class="breadcrumb-item"><a href="index.html">AnkaraPHP Takım</a></li>
                <li class="breadcrumb-item active">Pano</li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-inverse card-danger">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4"><i class="icon-book-open"></i></div>
                                    <div class="h4 mb-0">{{ $team->projects()->count() }}</div><small class="text-muted text-uppercase font-weight-bold">PROJE</small>
                                    <div class="progress progress-white progress-xs mt-3">
                                        <div role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-inverse card-info">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4"><i class="icon-user"></i></div>
                                    <div class="h4 mb-0">{{ $team->customers()->count() }}</div><small class="text-muted text-uppercase font-weight-bold">MÜŞTERİ</small>
                                    <div class="progress progress-white progress-xs mt-3">
                                        <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-inverse card-warning">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4"><i class="icon-share"></i></div>
                                    <div class="h4 mb-0">{{ $team->files()->count() }} Dosya</div><small class="text-muted text-uppercase font-weight-bold">DOSYA MERKEZİ</small>
                                    <div class="progress progress-white progress-xs mt-3">
                                        <div role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-inverse card-secondary">
                                <div class="card-block">
                                    <div class="h1 text-muted text-right mb-4"><i class="icon-lock"></i></div>
                                    <div class="h4 mb-0">{{ $team->passwords()->count() }}</div><small class="text-muted text-uppercase font-weight-bold">ŞİFRE</small>
                                    <div class="progress progress-white progress-xs mt-3">
                                        <div role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="app-footer"><a href="http://ankaraphp.github.io">FPMS</a> © 2017 AnkaraPHP Topluluğu.<span class="float-right">Baked with&nbsp;<a href="http://laravel.com">Laravel</a>&nbsp;and&nbsp;<i class="fa fa-heart love-from-ankaraphp"></i></span></footer>
@stop