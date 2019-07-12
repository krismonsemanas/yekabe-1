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
                <div class="col-sm-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pesan Masuk</h3>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>
                                        <i class="icon fa fa-check"></i> Terkirim
                                    </h4>
                                    <p>{{session('success')}}</p>
                                </div>
                            @endif
                        </div>
                        <div class="box-body no-padding">
                            <div class="table-responsive mailbox-messages">
                                <table id="pesan" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Dari</th>
                                            <th>Pesan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pesan as $row)
                                        <tr>
                                                <td>
                                                    @if ($row->user->level == "MURID")
                                                        {{$row->user->siswa->nama}} <div class="label label-warning pull-right">Murid</div>
                                                    @elseif($row->user->level == "ORANG TUA")
                                                        {{$row->user->orangtua->siswa->ibu}} <div class="label label-info pull-right">Orang Tua</div>
                                                    @elseif($row->user->level == "GURU")
                                                        {{$row->user->karyawan->nama}} <div class="label label-success pull-right">Guru</div>
                                                    @endif
                                                </td>
                                                <td>{{$row->message}}</td>
                                                <td class="text-center">
                                                    <a href="/guru/chat/balas/{{$row->from}}" class="btn btn-warning btn-xs"><i class="fa fa-paper-plane-o"></i> Balas</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><small class="text-danger"><i>Belum ada pesan</i></small></td>
                                            </tr>
                                        @endforelse
                                        <tr><td colspan="3"><a href="/guru/chat/baru" class="btn btn-warning btn-block"><i class="fa fa-wechat"></i> Chat Baru</a></td></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">{{$pesan->links()}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
@endsection

