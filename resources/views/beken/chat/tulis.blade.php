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
                                            <option value="{{$item->id}}">
                                                @if ($item->level == "GURU")
                                                    {{$item->karyawan->nama}}
                                                @elseif($item->level == 'MURID')
                                                    {{$item->siswa->nama}}
                                                @elseif($item->level == 'ORANG TUA')
                                                    @if (count($item->orangtua) > 0)
                                                        @if (count($item->orangtua->siswa) > 0)
                                                            {{$item->orangtua->siswa->ayah}} | Orang Tua
                                                        @endif
                                                    @endif
                                                @endif
                                            </option>
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

