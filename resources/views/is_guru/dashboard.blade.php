@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Karyawan
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Guru</a></li>
  <li class="active">Dashboard</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('main')
<div class="row">
        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$countkelas}}</h3>

              <p>Jumlah Kelas Yang Diajar</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{$countmapel}}</h3>

                    <p>Jumlah Mata Pelajaran Yang Diampu</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                </div>
              </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$countmurid}}</h3>

              <p>Jumlah Siswa Yang Diajar</p>
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
              <h3 class="box-title">Jadwal Mengajar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>KELAS</th>
                  <th class='text-center'>MATA PELAJARAN</th>
                  <th class='text-center'>HARI</th>
                  <th class='text-center'>JAM</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $no => $jadwal)
                        <tr>
                        <td class='text-center'>{{$no+1}}</td>
                        <td class='text-center'>{{$jadwal->kelas->kelas}}</td>
                        <td class='text-center'>{{$jadwal->mapel->mapel}}</td>
                        <td class='text-center'>{{$jadwal->hari}}</td>
                        <td class='text-center'>{{$jadwal->jam}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>KELAS</th>
                    <th class='text-center'>MATA PELAJARAN</th>
                    <th class='text-center'>HARI</th>
                    <th class='text-center'>JAM</th>
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
@endsection
