@extends('tenpureto.beken.index')

@section('seo-title')
	Wali Kelas
@endsection

@section('title')
  <h1>
    Wali Kelas
    <small>Info Wali Kelas</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Wali Kelas</a></li>
  <li class="active">Info Wali Kelas</li>
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
              @if(session('gagal'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Perhatian</strong></h4>
                    <p>{{ session('gagal') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('gagal')}}
              @endif
              <div style="margin:10px;">
                <a href="/manage/wali/new" class="btn btn-block btn-primary btn-lg">Tambah Wali Kelas Pada Tahun Ajaran Tertentu</a>
              </div>
              <hr>
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Wali Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>TAHUN AJARAN</th>
                  <th class='text-center'>KELAS</th>
                  <th class='text-center'>GURU</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($wali as $no => $wali)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>
                        {{$wali->periode->tahun_ajaran}} Semester {{$wali->periode->semester}}
                        <br />
                        <small><i>Dibuat pada {{$wali->created_at->format('d M Y')}}</i></small>
                      </td>
                      <td class='text-center'>{{$wali->kelas->kelas}}</td>
                      <td class='text-center'>{{$wali->karyawan->nama}}</td>
                      <td class='text-center'>
                        <!-- <a target="_blank" href="{{ url('manage/'.$wali->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat </a> -->
                        <a href="{{ url('manage/wali/'.$wali->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="delete-data btn btn-danger btn-xs" data-photo-id="{{$wali->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>TAHUN AJARAN</th>
                  <th class='text-center'>KELAS</th>
                  <th class='text-center'>GURU</th>
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
      $('button.delete-data').click(function() {
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
            url: "wali/delete/" + eventId,
            type: "post"
          })
          .done(function(data) {
            swal("SUKSES!", "Data Berhasil Dihapus", "success");
            setTimeout(function () {
              location.reload();
            }, 1500);

          })
          .error(function(data) {
            swal("Oops", "Kami Tidak Dapat Terhubung Ke Server !", "error");
          });
        });
      }
    </script>
@endpush
