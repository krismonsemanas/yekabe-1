@extends('tenpureto.beken.index')

@section('seo-title')
	Jadwal
@endsection

@section('title')
  <h1>
    Jadwal
    <small>Info Jadwal</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Jadwal</a></li>
  <li class="active">Info Jadwal</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <style>
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn){
            width: 100%;
        }
    </style>
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
              @if(session('error'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Perhatian</strong></h4>
                    <p>{{ session('error') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('error')}}
              @endif
              <div style="margin:10px;">
                <a href="/manage/jadwal/new" class="btn btn-block btn-primary btn-lg">Tambah Jadwal</a>
              </div>
              <hr>
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center' style="width:30%;">TAHUN AJARAN</th>
                  <th class='text-center'>KELAS</th>
                  <th class='text-center'>MATA PELAJARAN</th>
                  <th class='text-center'>HARI</th>
                  <th class='text-center'>JAM</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($jadwal as $no => $jadwal)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$jadwal->periode->tahun_ajaran}} Semester {{$jadwal->periode->semester}}</td>
                      <td class='text-center'>{{$jadwal->kelas->kelas}}</td>
                      <td class='text-center'>{{$jadwal->mapel->mapel}}</td>
                      <td class='text-center'>{{$jadwal->hari}}</td>
                      <td class='text-center'>{{$jadwal->jam}}</td>
                      <td class='text-center'>
                        <!-- <a target="_blank" href="{{ url('manage/'.$jadwal->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat </a> -->
                        <a href="{{ url('manage/jadwal/'.$jadwal->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="delete-data btn btn-danger btn-xs" data-photo-id="{{$jadwal->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>TAHUN AJARAN</th>
                    <th class='text-center'>KELAS</th>
                    <th class='text-center'>MATA PELAJARAN</th>
                    <th class='text-center'>HARI</th>
                    <th class='text-center'>JAM</th>
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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        // $(function () {
        //     $('#example1').DataTable()
        // })

        $('#example thead tr th').on("click", function(event) {
            if ($(event.target).is("button")) {
                table.column(1).orderable(false).draw();//dummy to disable sorting
            }
        });

        var table = $('#example1').DataTable({
            initComplete: function() {
                this.api().columns([1]).every(function() {
                var column = this;
                var select = $('<select class="selectpicker" data-show-content="false" data-none-selected-text="Tahun Ajaran" multiple><option value="" >Show All</option></select>')
                    .appendTo($(column.header()).empty())//use $(column.footer() to append it to the table footer instead
                    .on('changed.bs.select', function(e) {
                    var val = $(this).val();
                    var fVal = val.join("|")
                    column
                        .search(fVal, true, false)
                        .draw();
                    }); //select

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                }); //column.data
                }); //this.api
                this.api().columns([2]).every(function() {
                var column = this;
                var select = $('<select class="selectpicker" data-show-content="false" data-none-selected-text="Kelas" multiple><option value="" >Show All</option></select>')
                    .appendTo($(column.header()).empty())//use $(column.footer() to append it to the table footer instead
                    .on('changed.bs.select', function(e) {
                    var val = $(this).val();
                    var fVal = val.join("|")
                    column
                        .search(fVal, true, false)
                        .draw();
                    }); //select

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                }); //column.data
                }); //this.api
                this.api().columns([3]).every(function() {
                var column = this;
                var select = $('<select class="selectpicker" data-show-content="false" data-none-selected-text="Mata Pelajaran" multiple><option value="" >Show All</option></select>')
                    .appendTo($(column.header()).empty())//use $(column.footer() to append it to the table footer instead
                    .on('changed.bs.select', function(e) {
                    var val = $(this).val();
                    var fVal = val.join("|")
                    column
                        .search(fVal, true, false)
                        .draw();
                    }); //select

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                }); //column.data
                }); //this.api

                this.api().columns([4]).every(function() {
                var column = this;
                var select = $('<select class="selectpicker" data-show-content="false" data-none-selected-text="Hari" multiple><option value="" >Show All</option></select>')
                    .appendTo($(column.header()).empty())//use $(column.footer() to append it to the table footer instead
                    .on('changed.bs.select', function(e) {
                    var val = $(this).val();
                    var fVal = val.join("|")
                    column
                        .search(fVal, true, false)
                        .draw();
                    }); //select

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                }); //column.data
                }); //this.api

            } //initComplete
        });
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
            url: "jadwal/delete/" + eventId,
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
