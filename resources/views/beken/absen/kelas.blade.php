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
              <h3 class="box-title">Data Siswa Pada Kelas {{$guru->kelas->kelas}} Tahun Ajaran {{$guru->periode->tahun_ajaran}} Semester {{$guru->periode->semester}}</h3>
              <h3>Mata Pelajaran <td class='text-center'>{{$guru->mapel->mapel}}</td></h3>
            </div>
            <div style="margin:10px;">
                <a href="{{ url('/guru/absen/kelas/now/'.$guru->id) }}" class="btn btn-block btn-primary btn-lg">ABSEN HARI INI</a>
              </div>
              <div style="margin:10px;">
                    <a href="{{ url('/guru/absen/kelas/new/'.$guru->id) }}" class="btn btn-block btn-success btn-lg">ABSEN PERORANGAN</a>
                  </div>
              <hr>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>NAMA</th>
                  <th class='text-center'>STATUS</th>
                  <th class='text-center'>KETERANGAN</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($absen as $no => $absen)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$absen->siswa->nama}}</td>
                      <td class='text-center'>{{$absen->status === "I" ? 'IZIN' : ($absen->status === "H" ? 'HADIR' : ($absen->status === "S" ? 'SAKIT' : 'ALPHA'))}}</td>
                      <td class='text-center'>{{$absen->keterangan}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>NAMA</th>
                    <th class='text-center'>STATUS</th>
                    <th class='text-center'>KETERANGAN</th>
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
@endpush
