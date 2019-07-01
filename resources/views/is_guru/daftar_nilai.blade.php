@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Daftar Nilai {{$murid->siswa->nama}}
  </h1>
@endsection

@section('breadcrumb')
<li><a href="{{route('dashboard.guru')}}"><i class="fa fa-bullhorn"></i>Dashboard</a></li>
<li><a href="{{route('guru.nilai.index')}}">Daftar Kelas</a></li>
<li><a href="{{route('guru.siswa.index',[$murid->kelas->id,$murid->mapel->id,$murid->periode->id])}}">Daftar Siswa</a></li>
<li class="active">Daftar Nilai</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('js/select2/select2.min.css')}}">
@endpush

@section('main')
@if(Session::has('success'))
<div style="margin-bottom:1rem" class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  {{Session::get('success')}}
</div>
@endif
<div class="box">
    <div style="padding:2rem" class="table-responsive">        
        <table class="table table-bordered">
            <tr>
                <th>Periode</th>
                <td>{{$murid->periode->periode()}}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{$murid->kelas->kelas}}</td>
            </tr>
            <tr>
                <th>Mata Pelajaran</th>
                <td>{{$murid->mapel->mapel}}</td>
            </tr>
        </table>
    </div>
    <div style="padding:2rem" class="table-responsive">
        <h2>Daftar Nilai </h2>
        <div style="padding:1rem" class="text-right">
            <button data-toggle="modal" data-target="#tambah-nilai" type="button" class="btn btn-primary">Tambah Nilai <i class="fa fa-plus"></i></button>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
              <th>Bobot</th>
              <th>Skor</th>
              <th>Tanggal Input</th>
              <th>Aksi</th>
            </thead>
            @forelse ($daftarNilai as $nilai)
                <tr>
                    <th>{{$nilai->nama}}</th>
                    <td>{{$nilai->nilai}}</td>
                    <td>{{$nilai->tanggalInput()}}</td>
                    <td>
                      <button data-url="{{route('guru.nilai.siswa.delete',[$nilai->id])}}" type="button" class="btn btn-danger btn-sm btn-delete">Hapus <i class="fa fa-trash"></i></button>
                      <a href="{{route('guru.nilai.siswa.edit',[$nilai->id])}}" class="btn btn-sm btn-info">Ubah <i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="4" class="text-center">Data Kosong</th>
                </tr>
            @endforelse
        </table>
        {{$daftarNilai->links()}}
    </div>
</div>

<form id="form-delete" method="POST">@csrf</form>

<!-- Modal -->
<div id="tambah-nilai" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Nilai</h4>
      </div>
      <div class="modal-body">
        <form method="POST">
            @csrf
            <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
                <label for="nilai">Nilai</label>
                <input type="text" id="nilai" name="nilai" value="{{old('nilai')}}" class="form-control" required/>
                @if ($errors->has('nilai'))
                <span class="help-block"> {{ $errors->first('nilai') }} </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('bobot_id') ? 'has-error' : ''}}">
                <label for="bobot">Bobot</label>
                <select class="form-control" name="bobot_id" id="bobot">
                  @foreach($bobot as $value)
                    <option value="{{$value->id}}">{{$value->nama .' - '.$value->persentase}}</option>
                  @endforeach
                </select>
                @if ($errors->has('nilai'))
                <span class="help-block"> {{ $errors->first('bobot_id') }} </span>
                @endif
            </div>
            <div class="d-block text-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-times"></i></button>              
                <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-check"></i></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
  <script src="{{asset('js/sweetalert2/sweetalert.min.js')}}"></script>
  <script>
    $('.btn-delete').click(function(){
      url = $(this).data('url');
      swal({
        title: "Hapus Nilai?",
        text: "Nilai yang dihapus tidak dapat dikembalikan !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#form-delete').attr('action',url).submit();
        }
      });
    });
  </script>
@endpush