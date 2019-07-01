@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Daftar Siswa Kelas
  </h1>
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard.guru')}}"><i class="fa fa-bullhorn"></i>Dashboard</a></li>
<li><a href="{{route('guru.nilai.index')}}">Daftar Kelas</a></li>
<li class="active">Daftar Siswa</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/select2/select2.min.css')}}">
@endpush

@section('main')
<div class="">
    <div style="padding:2rem" class="box">
        <div class="table-responsive">
            
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Periode</th>
                        <td>{{$periode->periode()}}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{$kelas->kelas}}</td>
                    </tr>
                    <tr>
                        <th>Mata Pelajar</th>
                        <td>{{$mapel->mapel}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <h3>Data Siswa</h3>
            <table class="table table-striped">
                <thead>
                    <th>Nama Siswa</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($daftarMurid as $siswa)
                    <tr>
                        <td>{{$siswa->nama}}</td>
                        <td><a href="{{route('guru.nilai.siswa',[$siswa->id])}}" class="btn btn-sm btn-info">Nilai <i class="fa fa-arrow-right"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection