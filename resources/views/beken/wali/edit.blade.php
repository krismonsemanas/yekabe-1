@extends('tenpureto.beken.index')

@section('seo-title')
	Ubah Data Wali Kelas
@endsection

@section('title')
  <h1>
    Wali Kelas
    <small>Ubah Data Wali Kelas</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Wali Kelas</a></li>
  <li class="active">Ubah Data Wali Kelas</li>
@endsection

@push('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
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
              <h3 class="box-title">Ubah Data Wali Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::model($wali, ['method' => 'PATCH', 'action' => ['WaliController@update', $wali->id]]) !!}
                  @include('beken.wali.form', ['submitButtonText' => 'Ubah Data Wali Kelas'])
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
  </script>
@endpush