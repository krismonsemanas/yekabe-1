@extends('tenpureto.beken.index')

@section('seo-title')
	Buat Jadwal Baru
@endsection

@section('title')
  <h1>
    Jadwal
    <small>Buat Jadwal Baru</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Jadwal</a></li>
  <li class="active">Buat Jadwal Baru</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('tenpureto/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endpush

@section('main')

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="box box-default">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Buat Jadwal Baru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['url' => 'manage/jadwal']) !!}
                  @include('beken.jadwal.form', ['submitButtonText' => 'Tambah Jadwal Baru'])
                {!! Form::close() !!}
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
  <!-- bootstrap datepicker -->
  <script src="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- CK Editor -->
  <script src="{{asset('tenpureto/bower_components/ckeditor/ckeditor.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{asset('tenpureto/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <script>
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('isi')
    })
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    //   use24hours: true
        // timeFormat: 'H:mm:ss'
    })
  </script>
@endpush
