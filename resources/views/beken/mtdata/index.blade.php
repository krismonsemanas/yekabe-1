@extends('tenpureto.beken.index')

@section('seo-title')
	Manajemen Kelas
@endsection

@section('title')
  <h1>
    Manajemen Kelas
    <small>Manjemen Kelas</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Kelas</a></li>
  <li class="active">Manajemen Kelas</li>
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
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>Kelas</th>
                    <th class='text-center'>Tahun Ajaran</th>
                    <th class='text-center'>Wali Kelas</th>
                    <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                   <?php $count = 0; $countKelas = 0; $countSiswa = 0; $i=0?>
                   @foreach ($jumKelas as $rowKelas)
                        <?php $countKelas = $countKelas+1 ?>
                        <tr>
                            <td class="text-center">{{$loop->index+1}}</td>
                            <td class="text-center">
                                {{$rowKelas->kelas}}
                            </td>
                            <td class="text-center">
                                @foreach ($kelas as $item)
                                    @if ($rowKelas->id == $item->kelas_id)
                                            {{$item->tahun_ajaran}} Semester {{$item->semester}}
                                            <?php $count = $count+1 ?>
                                    @endif
                                @endforeach
                                @if ($countKelas > $count)
                                    <div class="label label-danger">Belum ada periode kelas ini</div>
                                @endif
                            </td>
                            <td>
                                @foreach ($kelas as $item)
                                    @if ($rowKelas->id == $item->kelas_id)
                                            {{$item->nama}}
                                    @endif
                                @endforeach
                                @if ($countKelas > $count)
                                    <div class="label label-danger">Belum ada wali kelas untuk kelas ini</div>
                                @endif
                            </td>
                            <td class="text-center">
                                @foreach ($kelas as $item)
                                    @if ($rowKelas->id == $item->kelas_id)
                                        <a href="" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    @endif
                                @endforeach
                                @if ($countKelas > $count)
                                    <a href="#" data-toggle="modal" data-target="#modalDefault" data-kelas_id="{{$rowKelas->id}}" class="btn btn-primary btn-xs">Tambah Wali</a>
                                @endif
                            </td>
                        </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>Tahun Ajaran</th>
                    <th class='text-center'>Kelas</th>
                    <th class='text-center'>Wali Kelas</th>
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
        <div class="modal fade" id="modalDefault">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah data wali kelas</h4>
                    </div>
                    <form action="/manage/master" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="periode_id">Periode</label>
                                <select name="periode_id" id="periode_id" class="form-control">
                                    <option value="{{$periode->id}}">{{$periode->tahun_ajaran}} Semester {{$periode->semester}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="karyawan_id">Wali Kelas</label>
                                <select name="karyawan_id" id="karyawan_id" class="form-control">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    @foreach ($karyawan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="kelas_id" id="kelas_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
      $('#modalDefault').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('kelas_id');
        $('#kelas_id').val(id)
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
            url: "mapel/delete/" + eventId,
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
