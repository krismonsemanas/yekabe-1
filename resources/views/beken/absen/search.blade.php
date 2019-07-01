@extends('tenpureto.beken.index')

@section('seo-title')
	Absen
@endsection

@section('title')
  <h1>
    Absen
    <small>Info Siswa</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Absen</a></li>
  <li class="active">Info Siswa</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
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
              <hr>
            <div class="box-header">
                    <div class="table-responsive">

                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Periode</th>
                                        <td>{{$guru->periode->tahun_ajaran}} Semester {{$guru->periode->semester}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{$guru->kelas->kelas}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <td>{{$guru->mapel->mapel}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
              {{-- <h3 class="box-title">Data Siswa Pada Kelas {{$guru->kelas->kelas}} Tahun Ajaran {{$guru->periode->tahun_ajaran}} Semester {{$guru->periode->semester}}</h3>
              <h3>Mata Pelajaran <td class='text-center'>{{$guru->mapel->mapel}}</td></h3> --}}
            </div>
            <div style="margin:10px;">
                <a href="{{ url('/guru/absen/kelas/now/'.$guru->id) }}" class="btn btn-block btn-primary btn-lg">ABSEN HARI INI</a>
              </div>
              <div style="margin:10px;">
                    <a href="{{ url('/guru/absen/kelas/new/'.$guru->id) }}" class="btn btn-block btn-success btn-lg">ABSEN PERORANGAN HARI INI</a>
                  </div>
              <hr>
              <div style="margin:10px;">
                    {!! Form::open(['url' => 'guru/absen/search']) !!}
                    {!! Form::hidden('guru_id',$guru->id) !!}
                    <div class="input-group date">
                        <div class="input-group-addon">
                                <i class="fa fa-calendar"></i> {!! Form::label('jadwal', 'Lihat Absen Pada Tanggal :', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::text('jadwal', $date, ['class' => 'form-control', 'id' => 'datepicker', 'style' => 'width:30%;'],['value' => '{{old(tempat_lahir)}}']) !!}{!! Form::submit('Cari', ['class' => 'btn btn-primary form-control', 'style' => 'width:10%;']) !!}
                    </div>
                    {!! Form::close() !!}
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'  style="width:5%;">NO</th>
                  <th class='text-center'>NAMA</th>
                  <th class='text-center'  style="width:10%;">STATUS</th>
                  <th class='text-center'>KETERANGAN</th>
                  {{-- <th class='text-center'  style="width:10%;">AKSI</th> --}}
                </tr>
                </thead>
                <tbody>
                  @foreach($absen as $no => $absen)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$absen->siswa->nama}}</td>
                      <td class='text-center'>{{$absen->status === "I" ? 'IZIN' : ($absen->status === "H" ? 'HADIR' : ($absen->status === "S" ? 'SAKIT' : 'ALPHA'))}}</td>
                      <td class='text-center'>{{$absen->keterangan}}</td>
                      {{-- <td class='text-center'><button class="delete-data btn btn-danger btn-xs" data-photo-id="{{$absen->id}}"><i class="fa fa-trash"> HAPUS</i></button></td> --}}
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>NAMA</th>
                    <th class='text-center'>STATUS</th>
                    <th class='text-center'>KETERANGAN</th>
                    {{-- <th class='text-center'>AKSI</th> --}}
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
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{asset('tenpureto/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tenpureto/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- SweeAlert -->
    <script src="{{asset('tenpureto/sweetalert/sweetalert.min.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
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
                  url: "/guru/absen/delete/" + eventId,
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
        <script>
            $('#datepicker').datepicker({
            autoclose: true
            })
        </script>

@endpush
