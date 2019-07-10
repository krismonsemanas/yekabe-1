@extends('tenpureto.beken.index')

@section('seo-title')
	Buat Siswa Aktif Baru
@endsection

@section('title')
  <h1>
    Siswa
    <small>Buat Data Siswa Aktif Baru</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-bullhorn"></i>Siswa</a></li>
  <li class="active">Buat Data Siswa Aktif Baru</li>
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
              <h3 class="box-title">Buat Data Siswa Aktif Baru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(['url' => 'manage/murid']) !!}
                  @include('beken.murid.form', ['submitButtonText' => 'Tambah Siswa Aktif Baru'])
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
  <script src="{{asset('tenpureto/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tenpureto/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('tenpureto/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- CK Editor -->
  <script src="{{asset('tenpureto/bower_components/ckeditor/ckeditor.js')}}"></script>
  <script>
    $('#all').change(function() {
        if(this.checked){
            $('.siswa').each(function() {
                this.checked = true;
            })
        }else{
            $('.siswa').each(function() {
                this.checked = false;
            })
        }
    });
    $('#allMapel').change(function() {
        if(this.checked){
            $('.mapel').each(function() {
                this.checked = true;
            })
        }else{
            $('.mapel').each(function() {
                this.checked = false;
            })
        }
    });
    $('#siswa').DataTable();
    $('#periode_id').change(function() {
        if($(this).val() == 0){
            $('#kelas').hide();
        }else{
            $('#kelas').show();
        }
    })
    $('#kelas_id').change(function() {
        if($(this).val() == 0){
            $('#mapel').hide();
            $('#data-siswa').hide()
        }else{
            $('#mapel').show();
            $('#data-siswa').show();
        }
    })
    $()
  </script>
@endpush
