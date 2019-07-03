@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Daftar Kelas Terampu
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
  <div class="box">
    <div style="margin:2rem">
      <form method="GET" action="">
        <div class="form-group">
          <h3>Periode</h3>
          <select id="periode" name="periode">
            @foreach($periode as $periode)
            <option value="{{$periode->id}}">{{$periode->periode()}}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
      <div style="padding:2rem" class="table-responsive">
          <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th class="p-1">Mata Pelajaran</th>
                        <th class="p-1">Kelas</th>
                        <th class="p-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datas as $pengajar)
                    <tr>
                        <td class="p-1">{{$pengajar->mapel->mapel}}</td>
                        <td class="p-1">{{$pengajar->kelas->kelas}}</td>
                        <td class="p-1"><a class="btn btn-primary" href="{{route('guru.siswa.index',[$pengajar->kelas->id,$pengajar->mapel->id,$pengajar->periode->id])}}"><i class="fa fa-arrow-right"></i></a></td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan="3" class="text-center"><h5 style="font-weight:bold">Data tidak ditemukan.</h5></td>
                      </tr>
                    @endforelse
                </tbody>
          </table>
      </div>
  </div>
@endsection

@push('js')
<script src="{{asset('js/select2/select2.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#periode').select2({
      placeholder: 'Pilih Tahun Ajar',
      // width: '75%'
    });
  });
</script>
@endpush
