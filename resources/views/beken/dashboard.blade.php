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

@endsection

@push('js')
@endpush
