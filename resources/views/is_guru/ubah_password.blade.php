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
  <li><a href="#"><i class="fa fa-bullhorn"></i>Guru</a></li>
  <li class="active">Ubah Password</li>
@endsection


@section('main')
  <div class="row">
    <section class="content">
      @include('tenpureto.beken.slice.alerts')
      <div class="box box-default">
        <div class="box-header">
          <h3>Ubah Password Akun</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12">
              <form action="" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PATCH">
                  <div class="form-group {{$errors->has('old_password') ? 'has-error' : ''}}">
                    <label for="old_password">Password Lama</label>
                    <input type="password" id="old_password" name="old_password" class="form-control"  required/>
                    @if ($errors->has('old_password'))
                    <span class="help-block">{{ $errors->first('old_password') }}</span>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('new_password') ? 'has-error' : ''}}">
                    <label for="new_password">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" class="form-control"  required/>
                    @if ($errors->has('new_password'))
                    <span class="help-block"> {{ $errors->first('new_password') }} </span>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('new_password_confirmation') ? 'has-error' : ''}}">
                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control"  required/>
                    @if ($errors->has('new_password_confirmation'))
                    <span class="help-block"> {{ $errors->first('new_password_confirmation') }} </span>
                    @endif
                  </div>

                  <button class="pull-right btn btn-primary" type="submit"><i class="fa fa-arrow-right"></i> Submit</button>
                  <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection