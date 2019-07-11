@extends('tenpureto.beken.index')

@section('seo-title')
	Absen
@endsection

@section('title')
  <h1>
    Absen
    <small>Info Absen</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Absen</a></li>
  <li class="active">Info Absen</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
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
              <hr>
            <div class="box-header table-responsive">
              <h3 class="box-title">Data Seluruh Mata Kuliah Yang Diampu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>TAHUN AJARAN</th>
                  <th class='text-center'>KELAS</th>
                  <th class='text-center'>MATA PELAJARAN</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($guru as $no => $guru)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$guru->periode->tahun_ajaran}} Semester {{$guru->periode->semester}}</td>
                      <td class='text-center'>{{$guru->kelas->kelas}}</td>
                      <td class='text-center'>{{$guru->mapel->mapel}}</td>
                      <td class='text-center'>
                        <a href="{{ url('guru/absen/kelas/'.$guru->id) }}" class="btn btn-warning btn-xs">LIHAT KELAS</a>
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

            } //initComplete
        });
    </script>
@endpush
