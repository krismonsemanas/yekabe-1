@extends('tenpureto.beken.index')

@section('seo-title')
	Siswa
@endsection

@section('title')
  <h1>
    Siswa
    <small>Data Siswa</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Siswa</a></li>
  <li class="active">Data Siswa</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endpush

@section('main')

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="box box-default">
            <div class="box">
            @if(session('new'))
              <!-- Success Alert -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('new') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('new')}}
              @endif
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
              @if(session('delete'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('delete') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('delete')}}
              @endif
              <div style="margin:10px;">
                <a href="/manage/profil_siswa/new" class="btn btn-block btn-primary btn-lg">Tambah Data</a>
              </div>  
              <hr>
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>NISN</th>
                  <th class='text-center'>NAMA</th>
                  <th class='text-center'>JENIS KELAMIN</th>
                  <th class='text-center'>EMAIL</th>
                  <th class='text-center'>TELEPON</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($siswa as $no => $siswa)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$siswa->nisn}}</td>
                      <td>{{$siswa->nama}}</td>
                      <td class='text-center'>{{$siswa->kelamin}}</td>
                      <td class='text-center'>{{$siswa->email}}</td>
                      <td class='text-center'>{{$siswa->phone}}</td>
                      <td class='text-center'>
                      <button id="info" class="btn bg-purple btn-xs" data-photo-id="{{$siswa->id}}" data-toggle="modal" data-target="#modal-default" data-karyawan='{{$siswa}}' data-tgl='{{date("d F Y", strtotime($siswa->tanggal_lahir))}}' data-provinsi='{{$siswa->province->province_name}}' data-kabupaten='{{$siswa->city->city_name}}' data-kelurahan='{{$siswa->village->village_name}}' data-kecamatan='{{$siswa->district->district_name}}'><i class="fa fa-eye"></i></button>
                        <a href="{{ url('manage/profil_siswa/'.$siswa->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="delete-data btn btn-danger btn-xs" data-photo-id="{{$siswa->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>NISN</th>
                  <th class='text-center'>NAMA</th>
                  <th class='text-center'>JENIS KELAMIN</th>
                  <th class='text-center'>EMAIL</th>
                  <th class='text-center'>TELEPON</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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
                      <td>Nama</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="nama"></div></td>
                    </tr>
                    <tr>
                      <td>NISN</td>
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
                      <td>Nama Ayah</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="tmt">aswawu</div></td>
                    </tr>
                    <tr>
                      <td>Nama Ibu</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="sk">aswawu</div></td>
                    </tr>
                  </table>
                </b>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{asset('tenpureto/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tenpureto/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    {{-- sweetalert --}}
    <script src="{{asset('tenpureto/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
    <script>
      $('#modal-default').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var nama = button.data('karyawan').nama
        var nip = button.data('karyawan').nisn
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
        var tmt = button.data('karyawan').ayah
        var sk = button.data('karyawan').ibu
        var imej = button.data('karyawan').photo
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
        modal.find('.imej').attr('src','/photo/student/'+imej)
      })
    </script>
    <script>
        $('button.delete-data').click(function() {
          var eventId = $(this).attr("data-photo-id");
          deleteEvent(eventId);
        });
        function deleteEvent(eventId) {
          swal({
            title: "Apakah anda yakin?", 
            text: "Apakah anda yakin ingin menghapus?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Ya",
            confirmButtonColor: "#ec6c62"
          }, function() {
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
            $.ajax({
              url: "profil_siswa/delete/" + eventId,
              type: "post"
            })
            .done(function(data) {
              swal("SUKSES!", "Data Berhasil Dihapus", "success");
              setTimeout(function () {
                location.reload();
              }, 1500);
              
            })
            .error(function(data) {
              swal("Oops", "Kami Tidak Dapat Terhubung Ke Server !", "error");
            });
          });
        }
      </script>
@endpush