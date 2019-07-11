@extends('tenpureto.beken.index')

@section('seo-title')
	Pengumuman
@endsection

@section('title')
  <h1>
    Pengumuman
    <small>Info Pengumuman</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Pengumuman</a></li>
  <li class="active">Info Pengumuman</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
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
              <div style="margin:10px;">
                <a href="/manage/pengumuman/new" class="btn btn-block btn-primary btn-lg">Tambah Pengumuman</a>
              </div>
              <hr>
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Pengumuman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>JUDUL</th>
                  <th class='text-center'>ISI</th>
                  <th class='text-center'>STATUS</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pengumuman as $no => $pengumuman)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td>
                        {{$pengumuman->judul}}
                        <br />
                        <small><i>Dibuat pada {{$pengumuman->created_at->format('d M Y')}}</i></small>
                      </td>
                      <td>{!!$pengumuman->isi!!}</td>
                      @if($pengumuman->status == 1)
                        <td class='text-center'>Aktif</td>
                      @else
                        <td class='text-center'>Tidak Aktif</td>
                      @endif
                      <td class='text-center'>
                        <!-- <a target="_blank" href="{{ url('artikel/'.$pengumuman->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat </a> -->
                        <a href="{{ url('manage/pengumuman/'.$pengumuman->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="delete-pengumuman btn btn-danger btn-xs" data-photo-id="{{$pengumuman->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>JUDUL</th>
                  <th class='text-center'>ISI</th>
                  <th class='text-center'>STATUS</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </tfoot>
              </table>
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
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
    <script>
      $('button.delete-pengumuman').click(function() {
        var eventId = $(this).attr("data-photo-id");
        deleteEvent(eventId);
      });
      function deleteEvent(eventId) {
        swal({
          title: "Apakah anda yakin?",
          text: "Apakah anda yakin ingin menghapus?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Ya",
          confirmButtonColor: "#ec6c62"
        }, function() {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
          $.ajax({
            url: "pengumuman/delete/" + eventId,
            type: "post"
          })
          .done(function(data) {
            swal("SUKSES!", "Data Berhasil Dihapus", "success");
            setTimeout(function () {
              location.reload();
            }, 1500);

          })
          .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
          });
        });
      }
    </script>
@endpush
