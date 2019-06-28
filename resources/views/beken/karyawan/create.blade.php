@extends('tenpureto.beken.index')

@section('seo-title')
	Data Karyawan Baru
@endsection

@section('title')
  <h1>
    Karyawan
    <small>Data Karyawan Baru</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Karyawan</a></li>
  <li class="active">Data Karyawan Baru</li>
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
              <h3 class="box-title">Data Karyawan Baru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['url' => 'manage/karyawan', 'files' => true]) !!}
                  @include('beken.karyawan.form', ['submitButtonText' => 'Tambah Karyawan Baru'])
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
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>
  <script>
      $('#provinces').on('change', function(e){
        console.log("test");
        var province_id = e.target.value;
        $.get('/json-regencies?province_id=' + province_id,function(data) {
          console.log(data);
          $('#regencies').empty();
          $('#regencies').append('<option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>');

          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, regenciesObj){
            $('#regencies').append('<option value="'+ regenciesObj.city_id +'">'+ regenciesObj.city_name +'</option>');
          })
        });
      });

      $('#regencies').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
          console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');


          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.district_id +'">'+ districtsObj.district_name +'</option>');
          })
        });
      });

      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.village_id +'">'+ villagesObj.village_name +'</option>');
          })
        });
      });

      $('#villages').on('change', function(e){
        console.log(e);
        var villages_id = e.target.value;
        $.get('/json-pos?villages_id=' + villages_id,function(data) {
          console.log(data);
          $('#kode_pos').empty();
          $('#kode_pos').append('');

          $.each(data, function(index, posObj){
            $('#kode_pos').val(posObj.village_postcode);
          })
        });
      });
  </script>
@endpush
