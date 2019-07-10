<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        @if(auth()->user()->level == 'ADMIN')
            <div class="pull-left image">
                <img src="{{asset('tenpureto/dist/img/images.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>ADMINISTRATOR</p>
              <a href="#"><i class="fa fa-circle text-success"></i> ADMIN</a>
            </div>
        @endif
        @if(auth()->user()->level == 'GURU')
            <div class="pull-left image">
                <img src="{{asset('/photo/teacher/'.auth()->user()->karyawan->photo )}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->karyawan->nama}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> GURU</a>
            </div>
        @endif

        {{-- <div class="pull-left image">
          <img src="{{asset('tenpureto/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Arif Setiawan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> ADMIN</a>
        </div> --}}

      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(auth()->user()->level == 'ADMIN')
			<li class="{{ Request::is('manage/dashboard') ? 'active' : '' }}">
				<a href="/manage/dashboard">
					<i class="fa fa-dashboard"></i> <span>Beranda</span>
				</a>
			</li>
          <li class="treeview {{ Request::is('manage/wali/*') ? 'active' : '' }}{{ Request::is('manage/wali') ? 'active' : '' }}{{ Request::is('manage/guru/*') ? 'active' : '' }}{{ Request::is('manage/guru') ? 'active' : '' }}{{ Request::is('manage/karyawan/*') ? 'active' : '' }}{{ Request::is('manage/karyawan') ? 'active' : '' }} {{ Request::is('manage/karyawan/new') ? 'active' : '' }} {{ Request::is('manage/karyawan/edit') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-users"></i> <span>Karyawan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('manage/karyawan/*') ? 'active' : '' }}{{ Request::is('manage/karyawan') ? 'active' : '' }} {{ Request::is('manage/karyawan/new') ? 'active' : '' }} {{ Request::is('manage/karyawan/edit') ? 'active' : '' }}"><a href="/manage/karyawan"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
              <li class="{{ Request::is('manage/guru/*') ? 'active' : '' }}{{ Request::is('manage/guru') ? 'active' : '' }}"><a href="/manage/guru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
              <li class="{{ Request::is('manage/wali/*') ? 'active' : '' }}{{ Request::is('manage/wali') ? 'active' : '' }}"><a href="/manage/wali"><i class="fa fa-circle-o"></i> Data Wali Kelas</a></li>
            </ul>
          </li>

          {{-- siswa --}}

          <li class="treeview {{ Request::is('manage/siswa/*') ? 'active' : '' }}{{ Request::is('manage/siswa') ? 'active' : '' }}{{ Request::is('manage/murid') ? 'active' : '' }}{{ Request::is('manage/murid/*') ? 'active' : '' }}">

            <a href="#">
              <i class="fa fa-male"></i> <span>Siswa</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('manage/profil_siswa/*') ? 'active' : '' }}{{ Request::is('manage/profil_siswa') ? 'active' : '' }}"><a href="/manage/profil_siswa"><i class="fa fa-circle-o"></i> Profil Siswa</a></li>
              <li class="{{ Request::is('manage/murid/*') ? 'active' : '' }}{{ Request::is('manage/murid') ? 'active' : '' }} "><a href="/manage/murid"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            </ul>

          </li>
          <li class="{{ Request::is('manage/pengumuman/*') ? 'active' : '' }}{{ Request::is('manage/pengumuman') ? 'active' : '' }}">
            <a href="/manage/pengumuman">
              <i class="fa fa-bullhorn"></i> <span>Pengumuman</span>
            </a>
          </li>
          <li class="{{ Request::is('manage/beasiswa/*') ? 'active' : '' }}{{ Request::is('manage/beasiswa') ? 'active' : '' }}">
            <a href="/manage/beasiswa">
              <i class="fa fa-dollar"></i> <span>Beasiswa</span>
            </a>
          </li>
			@endif
            @if(auth()->user()->level == 'GURU')
                <li class="{{ Request::is('guru') ? 'active' : '' }}">
                    <a href="/guru">
                        <i class="fa fa-dashboard"></i> <span>Beranda</span>
                    </a>
                </li>
				<li class="{{ Request::is('guru/absen/*') ? 'active' : '' }} {{ Request::is('guru/absen') ? 'active' : '' }}">
					<a href="/guru/absen">
						<i class="fa fa-bullhorn"></i> <span>Absen</span>
					</a>
                </li>
                <li class="{{ Request::is('guru/daftar-kelas/*') ? 'active' : '' }} {{ Request::is('guru/daftar-kelas') ? 'active' : '' }}">
					<a href="/guru/daftar-kelas">
						<i class="fa fa-pencil-square-o"></i> <span>Nilai</span>
					</a>
				</li>
			@endif
        <li class="header">PENGATURAN</li>
        @if(auth()->user()->level == 'ADMIN')
            <li class="{{ Request::is('manage/maps/*') ? 'active' : ''}}"><a href="/manage/maps"><i class="fa fa-map text-blue"></i> <span>Maps</span></a></li>
            <li class="{{ Request::is('manage/periode/*') ? 'active' : '' }}{{ Request::is('manage/periode') ? 'active' : '' }} {{ Request::is('manage/periode/new') ? 'active' : '' }} {{ Request::is('manage/periode/edit') ? 'active' : '' }}"><a href="/manage/periode"><i class="fa fa-calendar text-aqua"></i> <span>Periode</span></a></li>
            <li class="{{ Request::is('manage/kelas/*') ? 'active' : '' }} {{ Request::is('manage/kelas') ? 'active' : '' }} {{ Request::is('manage/kelas/new') ? 'active' : '' }} {{ Request::is('manage/kelas/edit') ? 'active' : '' }}"><a href="/manage/kelas"><i class="fa fa-institution text-yellow"></i> <span>Kelas</span></a></li>
            <li class="{{ Request::is('manage/mapel/*') ? 'active' : '' }}{{ Request::is('manage/mapel') ? 'active' : '' }} {{ Request::is('manage/mapel/new') ? 'active' : '' }} {{ Request::is('manage/mapel/edit') ? 'active' : '' }}"><a href="/manage/mapel"><i class="fa fa-book text-green"></i> <span>Mapel</span></a></li>
            <li class="{{ Request::is('manage/bobot/*') ? 'active' : '' }}{{ Request::is('manage/bobot') ? 'active' : '' }} {{ Request::is('manage/bobot/new') ? 'active' : '' }} {{ Request::is('manage/bobot/edit') ? 'active' : '' }}"><a href="/manage/bobot"><i class="fa fa-list text-red"></i> <span>Bobot</span></a></li>
            <li class="{{ Request::is('manage/jadwal/*') ? 'active' : '' }}{{ Request::is('manage/jadwal') ? 'active' : '' }} {{ Request::is('manage/jadwal/new') ? 'active' : '' }} {{ Request::is('manage/jadwal/edit') ? 'active' : '' }}"><a href="/manage/jadwal"><i class="fa fa-calendar-check-o text-purple"></i> <span>Jadwal</span></a></li>
            <li class="{{ Request::is('manage/slider/*') ? 'active' : '' }}{{ Request::is('manage/slider') ? 'active' : '' }} {{ Request::is('manage/slider/new') ? 'active' : '' }} {{ Request::is('manage/slider/edit') ? 'active' : '' }}"><a href="/manage/slider"><i class="fa fa-sliders text-white"></i> <span>Slider</span></a></li>
        @endif
        @if(auth()->user()->level == 'GURU')
            <li class="{{ Request::is('guru/maps/*') ? 'active' : ''}}"><a href="/guru/maps"><i class="fa fa-map text-blue"></i> <span>Maps</span></a></li>
            <li class="{{ Request::is('guru/profil-saya/*') ? 'active' : ''}}{{ Request::is('guru/profil-saya') ? 'active' : ''}}"><a href="{{route('guru.profil.edit')}}"><i class="fa fa-user text-aqua"></i> <span>Profil</span></a></li>
            <li class="{{ Request::is('guru/ubah-password/*') ? 'active' : ''}}{{ Request::is('guru/ubah-password') ? 'active' : ''}}"><a href="{{route('guru.password.edit')}}"><i class="fa fa-lock text-aqua"></i> <span>Ubah Password</span></a></li>
        @endif

        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-reply"></i> <span>LOGOUT | KELUAR</span></a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
