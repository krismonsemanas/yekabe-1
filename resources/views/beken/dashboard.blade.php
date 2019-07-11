@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard
@endsection

@section('title')
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
@endsection

@push('css')
@endpush

@section('main')
<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$countkaryawan}}</h3>

          <p>Jumlah Karyawan</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$countsiswa}}</h3>

          <p>Jumlah Siswa</p>
        </div>
        <div class="icon">
          <i class="fa fa-male"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="content" >
        <div class="box box-default">
        <div class="box">
            <br>
            @if(session('edit'))
              <!-- Success Alert -->
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('edit') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('edit')}}
              @endif
              <br>
        <div class="box-header">
          <h3 class="box-title">Data Menunggu Verifikasi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th class='text-center'>NO</th>
              <th class='text-center'>NAMA</th>
              <th class='text-center'>TELEPON</th>
              <th class='text-center'>USERNAME</th>
              <th class='text-center'>EMAIL</th>
              <th class='text-center'>AKSI</th>
            </tr>
            </thead>
            <tbody>
              @foreach($pending as $no => $pending)
                <tr>
                  <td class='text-center'>{{$no+1}}</td>
                  <td class='text-center'>{{$pending->karyawan->nama}}</td>
                  <td class='text-center'>{{$pending->karyawan->phone}}</td>
                  <td class='text-center'>{{$pending->username}}</td>
                  <td class='text-center'>{{$pending->karyawan->email}}</td>
                  <td class='text-center'><button id="info" class="btn bg-purple btn-xs" data-photo-id="{{$pending->id}}" data-toggle="modal" data-target="#modal-default" data-karyawan='{{$pending->karyawan}}' data-user='{{$pending}}' data-tgl='{{date("d F Y", strtotime($pending->karyawan->tanggal_lahir))}}' data-provinsi='{{$pending->karyawan->province->province_name}}' data-kabupaten='{{$pending->karyawan->city->city_name}}' data-kelurahan='{{$pending->karyawan->village->village_name}}' data-kecamatan='{{$pending->karyawan->district->district_name}}'><i class="fa fa-check"> Verifikasi</i></button></td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th class='text-center'>NO</th>
                <th class='text-center'>NAMA</th>
                <th class='text-center'>TELEPON</th>
                <th class='text-center'>USERNAME</th>
                <th class='text-center'>EMAIL</th>
                <th class='text-center'>AKSI</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.box -->
        </div>
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Default Modal</h4>
        </div>
        <div class="modal-body">
          <b>
            <table class="table table-striped">
              <tr>
                <td class="text-center" colspan="3">
                  <div style="padding-left:100px;padding-right:100px;padding-bottom:20px;">
                      <img class="imej" src="" style="width:100%;">
                  </div>
                </td>
              </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td style="width: 65%"><div class="username"></div></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="nama"></div></td>
                </tr>
                <tr>
                  <td>NIP</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="nip"></div></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="kelamin"></div></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="agama"></div></td>
                </tr>
                <tr>
                  <td>Tempat & Taggal Lahir</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="ttl">aswawu</div></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="email">aswawu</div></td>
                </tr>
                <tr>
                  <td>Nomor HP</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="hp">aswawu</div></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="alamat">aswawu</div></td>
                </tr>
                <tr>
                  <td>TMT</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="tmt">aswawu</div></td>
                </tr>
                <tr>
                  <td>Nomor SK Pertama</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="sk">aswawu</div></td>
                </tr>
                <tr>
                  <td>NUPTK</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="nuptk">aswawu</div></td>
                </tr>
                <tr>
                  <td>NRG</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="nrg">aswawu</div></td>
                </tr>
                <tr>
                  <td>Sertifikat Pendidik</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="sertifikat">aswawu</div></td>
                </tr>
                <tr>
                  <td>Kode Sertifikat MP</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="mp">aswawu</div></td>
                </tr>
                <tr>
                  <td>Ijazah Terakhir</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="ijazah">aswawu</div></td>
                </tr>
                <tr>
                  <td>Nomor Ijazah</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="no_ijazah">aswawu</div></td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="jurusan">aswawu</div></td>
                </tr>
                <tr>
                  <td>Program Studi</td>
                  <td>:</td>
                  <td style="width: 65%"><div class="studi">aswawu</div></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <form method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data" class="verif">
                            @csrf
                            <input class="btn btn-primary form-control" type="submit" value="VERIFIKASI">
                        </form>
                    </td>
                </tr>
              </table>
            </b>
        </div>
@endsection

@push('js')
    <script>
        $('#modal-default').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var nama = button.data('karyawan').nama
            var nip = button.data('karyawan').nip
            var kelamin = button.data('karyawan').kelamin
            var agama = button.data('karyawan').agama
            var tempat = button.data('karyawan').tempat_lahir
            var tanggal = button.data('tgl')
            var email = button.data('karyawan').email
            var hp = button.data('karyawan').phone
            var alamat = button.data('karyawan').alamat
            var provinsi = button.data('provinsi')
            var kabupaten = button.data('kabupaten')
            var kecamatan = button.data('kecamatan')
            var kelurahan = button.data('kelurahan')
            var pos = button.data('karyawan').kode_pos
            var tmt = button.data('karyawan').tmt
            var sk = button.data('karyawan').sk_pertama
            var nuptk = button.data('karyawan').nuptk
            var nrg = button.data('karyawan').nrg
            var sertifikat = button.data('karyawan').sertifikat_pendidik
            var mp = button.data('karyawan').kode_sertifikat_mp
            var ijazah = button.data('karyawan').ijazah_terakhir
            var no_ijazah = button.data('karyawan').nomor_ijazah
            var jurusan = button.data('karyawan').jurusan
            var studi = button.data('karyawan').program_studi
            var imej = button.data('karyawan').photo
            var username = button.data('user').username
            var verif = button.data('user').id
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('INFO LENGKAP')
            modal.find('.nama').text(nama)
            modal.find('.nip').text(nip)
            modal.find('.kelamin').text(kelamin)
            modal.find('.agama').text(agama)
            modal.find('.ttl').text(tempat+', '+tanggal)
            modal.find('.email').text(email)
            modal.find('.hp').text(hp)
            modal.find('.alamat').text(alamat+', '+kelurahan+', '+kecamatan+', '+kabupaten+', '+provinsi+', '+pos)
            modal.find('.tmt').text(tmt)
            modal.find('.sk').text(sk)
            modal.find('.nuptk').text(nuptk)
            modal.find('.nrg').text(nrg)
            modal.find('.sertifikat').text(sertifikat)
            modal.find('.mp').text(mp)
            modal.find('.ijazah').text(ijazah)
            modal.find('.no_ijazah').text(no_ijazah)
            modal.find('.jurusan').text(jurusan)
            modal.find('.studi').text(studi)
            modal.find('.imej').attr('src','/photo/teacher/'+imej)
            modal.find('.username').text(username)
            modal.find('.verif').attr('action','/manage/dashboard/verif/'+verif)
        })
  </script>
@endpush
