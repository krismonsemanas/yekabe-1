@extends('tenpureto.beken.index')

@section('seo-title')
	Absen Hari Ini
@endsection

@section('title')
  <h1>
    Absen Hari Ini
    <small>Info Siswa</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Absen Hari Ini</a></li>
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
              <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        {!! Form::open(['url' => 'guru/absen/kelas/'.$guru->id]) !!}
                        {!! Form::hidden('id_guru',$guru->id) !!}
                        @csrf
                        <table class="table table-striped">
                            <tbody><tr>
                            <th style="width: 10px" class='text-center'>No</th>
                            <th class='text-center'>Nama</th>
                            <th class='text-center' style="width:5%;">Hadir</th>
                            <th class='text-center' style="width:5%;">Izin</th>
                            <th class='text-center' style="width:5%;">Sakit</th>
                            <th class='text-center' style="width:5%;">Alpha</th>
                            <th class='text-center'>Keterangan</th>
                            </tr>
                            @foreach($kelas as $no => $kelas)
                                <tr>
                                    <td class="text-center">{{$no+1}}</td>
                                    <td>
                                        {{$kelas->nama}}
                                        {!! Form::hidden('id_siswa['.$no.']',$kelas->id) !!}
                                    </td>
                                    <td class="text-center"><label><input type="radio" value="H" id="reguler" name="{{ 'status['.$no.']' }}"></label></td>
                                    <td class="text-center"><label><input type="radio" value="I" id="reguler" name="{{ 'status['.$no.']' }}"></label></td>
                                    <td class="text-center"><label><input type="radio" value="S" id="reguler" name="{{ 'status['.$no.']' }}"></label></td>
                                    <td class="text-center"><label><input type="radio" value="A" id="reguler" name="{{ 'status['.$no.']' }}"></label></td>
                                    <td class="text-center"><input type="text" name="{{ 'keterangan['.$no.']' }}" class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody></table>
                        {!! Form::submit('Simpan Absen', ['class' => 'btn btn-primary form-control']) !!}
                      {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                  </div>
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
