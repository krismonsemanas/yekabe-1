@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard Guru
@endsection

@section('title')
  <h1>
    Chat
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Chat</a></li>
  <li class="active">Chat</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('main')
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pesan</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{url('/guru/chat')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="to">Penerima</label>
                                    <select name="to" id="to" class="form-control">
                                        <option value="">-- Pilih salah satu --</option>
                                        @forelse ($user as $item)
                                            @if ($item->level == 'MURID')
                                                @if ($item->siswa->stats == 1)
                                                    <option value="{{$item->id}}">{{$item->siswa->nisn}} |{{$item->siswa->nama }} |Murid</option>
                                                @endif
                                            @elseif($item->level == 'ORANG TUA')
                                            <?php $data['ortu'] = DB::table('data_murid')->where('no_hp_ortu_1','=',$item->no_hp)->orWhere('no_hp_ortu_2','=',$item->no_hp)->select('ayah')->get();?>
                                                @foreach ($data['ortu'] as $row)
                                                    <option value="{{$item->id}}">{{$row->ayah}} |Orang Tua Murid</option>
                                                @endforeach
                                            @elseif($item->level == 'GURU')
                                                @if ($item->karyawan->stats == 1)
                                                    <option value="{{$item->id}}">{{$item->karyawan->nama}} |Guru</option>
                                                @endif
                                            @endif
                                        @empty
                                            <small class="text-danger"><i></i> Tidak ada data</small>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                        <label for="message">Pesan Anda</label>
                                        <input type="hidden" name="from" value="{{auth()->user()->id}}">
                                        <textarea class="form-control" placeholder="Ketik pesan anda disini" name="message" id="message" cols="30" rows="3"></textarea>
                                        @error('message') <small class="text-danger">Tidak boleh kosong</small> @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-paper-plane-o"></i> Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
@endsection

