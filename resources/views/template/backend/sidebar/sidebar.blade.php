<style type="text/css">
    .logo-icon { 
       width: 90px !important; margin-right: -12px; 
    }
    #sidebar-wrapper {
       /*Gradient*/
       /*background: linear-gradient(90deg, rgba(0,161,253,1) 0%, rgb(0 173 255) 50%, rgba(0,159,255,1) 100%);*/
       /*Polos*/
       background-color: #263a4e;
    }
    .sidebar-menu>li>a {
       color: rgb(255 255 255 / 0.75);
    }
    .sidebar-menu>li:hover>a, .sidebar-menu>li.active>a {
       color: white;
       background: rgb(0 0 0 / 22%);
    }
    .sidebar-menu .sidebar-submenu>li>a {
       color: rgb(255 255 255 / 0.75);
    }
    .sidebar-menu .sidebar-submenu>li.active>a, .sidebar-menu .sidebar-submenu>li>a:hover {
       color: white;
    }
    .simplebar-track.vertical {
       top: 60px;
    }
</style>
 
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
       @if(Auth::guard('user')->check()) {{-- User --}}
       <a href="{{ route('user.dashboard.warga') }}">
          <img src="{{ asset('assets/img/logo.png') }}" class="logo-icon" alt="logo icon">
          <h5 class="logo-text text-white"></h5>
       </a>
       @elseif(Auth::guard('admin')->check()) {{-- Admin --}}
       <a href="{{ route('admin.dashboard.rt') }}">
          <img src="{{ asset('assets/img/logo.png') }}" class="logo-icon" alt="logo icon">
          <h5 class="logo-text text-white"></h5>
       </a>
       @endif
    </div>
    <ul class="sidebar-menu">
        @if(Auth::guard('user')->check()) {{-- User --}}
            <li>
                <a href="{{route('user.dashboard.warga')}}" class="waves-effect">
                <i class="fa fa-home"></i> <span>Dasboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.testi')}}" class="waves-effect">
                <i class="fa fa-comment"></i> <span>Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.ronda')}}" class="waves-effect">
                <i class="fa fa-calendar"></i> <span>Jadwal Ronda</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.surat')}}" class="waves-effect">
                <i class="fa fa-file"></i> <span>Surat</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.laporan.keuangan')}}" class="waves-effect">
                <i class="fa fa-bar-chart"></i> <span>Laporan Keuangan</span>
                </a>
            </li>
        @elseif(Auth::guard('admin')->check()) {{-- Admin --}}
            <li>
                <a href="{{route('admin.dashboard.rt')}}" class="waves-effect">
                <i class="fa fa-tachometer"></i> <span>Dasboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.document')}}" class="waves-effect">
                <i class="fa fa-file"></i> <span>SURAT</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.ronda')}}" class="waves-effect">
                <i class="fa fa-calendar"></i> <span>Jadwal Ronda</span>
                </a>
            </li>
            <li>
                <a href="javaScript:void();" class="waves-effect">
                <i class="fa fa-map-signs"></i> <span>Master</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.berita') }}">
                            <i class="fa fa-newspaper-o"></i> Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testi') }}">
                            <i class="fa fa-comment"></i> Verifikasi Testimoni
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faq') }}">
                            <i class="fa fa-question"></i> FAQ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user') }}">
                            <i class="fa fa-user-plus"></i> User Management
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.biografi') }}">
                            <i class="fa fa-user"></i> Biografi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.video') }}">
                            <i class="fa fa-play"></i> Last Video
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.organisasi') }}">
                            <i class="fa fa-users"></i> Struktur Organisasi
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.laporan.keuangan')}}" class="waves-effect">
                <i class="fa fa-bar-chart"></i> <span>Laporan Keuangan</span>
                </a>
            </li>
        @endif
    </ul>
</div>