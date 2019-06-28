@extends('tenpureto.beken.index')

@section('seo-title')
	Ubah Mapel
@endsection

@section('title')
  <h1>
    Mapel
    <small>Ubah Mapel</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Mapel</a></li>
  <li class="active">Ubah Mapel</li>
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
              <h3 class="box-title">Ubah Mapel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::model($mapel, ['method' => 'PATCH', 'action' => ['MapelController@update', $mapel->id]]) !!}
                  @include('beken.mapel.form', ['submitButtonText' => 'Ubah mapel'])
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