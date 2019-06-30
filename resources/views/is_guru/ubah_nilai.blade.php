@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Perubahan Nilai {{$siswa->nama}}
  </h1>
@endsection

@section('breadcrumb')
<li><a href="{{route('guru.nilai.siswa',$murid->id)}}"><i class="fa fa-bullhorn"></i>Nilai Murid</a></li>
<li><a href="{{route('dashboard.guru')}}">Guru</a></li>
<li class="active">Dashboard</li>
@endsection

@section('main')
@if(Session::has('success'))
<div style="margin-bottom:1rem" class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    {{Session::get('success')}}
</div>
@endif
  <div style="padding:2rem" class="box">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <h3>Keterangan</h3>
                    <tbody>
                        <tr>
                            <th>Periode</th>
                            <td>{{$nilai->periode->periode()}}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{$nilai->kelas->kelas}}</td>
                        </tr>
                        <tr>
                            <th>Mapel</th>
                            <td>{{$nilai->mapel->mapel}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Nilai Sebelum</h3>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Jenis</th>
                            <td>{{$nilai->bobot->nama}}</td>
                        </tr>
                        <tr>
                            <th>Skor</th>
                            <td>{{$nilai->nilai}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h3>Ubah Nilai</h3>
            <form action="" method="POST">
                @csrf
                <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
                    <label for="nilai">Nilai</label>
                    <input type="text" id="nilai" name="nilai" value="{{old('nilai') ?? $nilai->nilai}}" class="form-control" required/>
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
                    <button class="btn btn-primary">Simpan <i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection