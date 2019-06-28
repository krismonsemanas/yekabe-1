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
  <li class="active">Profile</li>
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
            @include('tenpureto.beken.slice.alerts')
            <div class="box box-default">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Karyawan Baru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <form method="POST" action="{{route('guru.profil.update')}}">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="col-md-6">

                      <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{old('nama') ?? $user->karyawan->nama}}" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" />
                        @if ($errors->has('nama'))
                        <span class="help-block" role="alert">
                          {{ $errors->first('nama') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group  {{$errors->has('nip') ? 'has-error' : ''}}">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" value="{{old('nip') ?? $user->karyawan->nip}}" class="form-control" />
                        @if ($errors->has('nip'))
                        <span class="help-block">
                         {{ $errors->first('nip') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('kelamin') ? 'has-error' : ''}}">
                        <label for="kelamin">Kelamin</label>
                        <select name="kelamin" id="kelamin" class="form-control">
                          <option value="LAKI-LAKI">Laki laki</option>
                          <option value="PEREMPUAN">Perempuan</option>
                        </select>
                        @if ($errors->has('kelamin'))
                          <p class="text-danger">{{ $errors->first('kelamin') }}</p>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                          <option value="ISLAM">Islam</option>
                          <option value="KRISTEN KATOLIK">Kristen Katolik</option>
                          <option value="KRISTEN PROTESTAN">Kristen Protestan</option>
                          <option value="BUDDHA">BUDDHA</option>
                          <option value="HINDU">HINDU</option>
                          <option value="KONG HU CU">Kong Hu Cu</option>
                          <option value="AGAMA KEPERCAYAAN">Agama Kepercayaan</option>
                        </select>
                        @if ($errors->has('agama'))
                          <p class="text-danger">{{ $errors->first('agama') }}</p>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') ?? $user->karyawan->tempat_lahir}}" class="form-control" />
                        @if ($errors->has('tempat_lahir'))
                        <span class="help-block">
                          {{ $errors->first('tempat_lahir') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group  {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') ?? $user->karyawan->tanggal_lahir}}" class="form-control datepicker" />
                        @if ($errors->has('tanggal_lahir'))
                        <span class="help-block">
                          {{ $errors->first('tanggal_lahir') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email" value="{{old('email') ?? $user->karyawan->email}}" class="form-control" />
                        @if ($errors->has('email'))
                        <span class="help-block">
                          {{ $errors->first('email') }}
                        </span>
                        @endif
                      </div>

                      {{-- start province selection --}}

                      <div class="form-group {{$errors->has('province_id') ? 'has-error' : ''}}">
                        <label for="">Provinsi</label>
                        <select class="form-control" name="province_id" id="provinces"  required>
                          <option disabled  requiredselected="true">=== Pilih Provinsi ===</option>
                            @foreach ($province as $key => $value)
                              <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('province_id'))
                        <span class="help-block">
                          {{ $errors->first('province_id') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('city_id') ? 'has-error' : ''}}">
                        <label for="">Kabupaten</label>
                        <select class="form-control" name="city_id" id="regencies" required>
                          <option disabled>=== Pilih Kabupaten ===</option>
                        </select>
                        @if ($errors->has('city_id'))
                        <span class="help-block">
                          {{ $errors->first('city_id') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group  {{$errors->has('district_id') ? 'has-error' : ''}}">
                        <label for="">Kecamatan</label>
                        <select class="form-control" name="district_id" id="districts" required>
                          <option disabled>=== Pilih Kecamatan ===</option>
                        </select>
                        @if ($errors->has('district_id'))
                        <span class="help-block">
                          {{ $errors->first('district_id') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group  {{$errors->has('village_id') ? 'has-error' : ''}}">
                        <label for="">Kelurahan</label>
                        <select class="form-control" name="village_id" id="villages" required>
                          <option disabled>=== Pilih Kelurahan ===</option>
                        </select>
                        @if ($errors->has('village_id'))
                        <span class="help-block">
                          {{ $errors->first('village_id') }}
                        </span>
                        @endif
                      </div>

                      {{-- end province selection --}}

                    </div>
                <!-- column separator -->
                    <div class="col-md-6">

                      <div class="form-group {{$errors->has('kode_pos') ? 'has-error' : ''}}">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos" value="{{old('kode_pos') ?? $user->karyawan->kode_pos}}" class="form-control" />
                        @if ($errors->has('kode_pos'))
                        <span class="help-block">
                          {{ $errors->first('kode_pos') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{old('alamat') ?? $user->karyawan->alamat}}" class="form-control "/>
                        @if ($errors->has('alamat'))
                        <span class="help-block">
                          {{ $errors->first('alamat') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{old('phone') ?? $user->karyawan->phone}}" class="form-control"/>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                          {{ $errors->first('phone') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('tmt') ? 'has-error' : ''}}">
                        <label for="tmt">TMT</label>
                        <input type="text" id="tmt" name="tmt" value="{{old('tmt') ?? $user->karyawan->tmt}}" class="form-control"/>
                        @if ($errors->has('tmt'))
                        <span class="help-block">
                          {{ $errors->first('tmt') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('sk_pertama') ? 'help-block' : ''}}">
                        <label for="sk_pertama">SK Pertama</label>
                        <input type="text" id="sk_pertama" name="sk_pertama" value="{{old('sk_pertama') ?? $user->karyawan->sk_pertama}}" class="form-control" />
                        @if ($errors->has('sk_pertama'))
                        <span class="help-block">
                          <strong>{{ $errors->first('sk_pertama') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('nuptk') ? 'has-error' : ''}}">
                        <label for="nuptk">NUPTK</label>
                        <input type="text" id="nuptk" name="nuptk" value="{{old('nuptk') ?? $user->karyawan->nuptk}}" class="form-control"/>
                        @if ($errors->has('nuptk'))
                        <span class="help-block">
                          {{ $errors->first('nuptk') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('nrg') ? 'has-error' : ''}}">
                        <label for="nrg">NRG</label>
                        <input type="text" id="nrg" name="nrg" value="{{old('nrg') ?? $user->karyawan->nrg}}" class="form-control "/>
                        @if ($errors->has('nrg'))
                        <span class="help-block">
                          {{ $errors->first('nrg') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('sertifikat_pendidik') ? 'has-error' : ''}}">
                        <label for="sertifikat_pendidik">Sertifikat Pendidik</label>
                        <input type="text" id="sertifikat_pendidik" name="sertifikat_pendidik" value="{{old('sertifikat_pendidik') ?? $user->karyawan->sertifikat_pendidik}}" class="form-control {{$errors->has('sertifikat_pendidik') ? 'is-invalid' : ''}}" />
                        @if ($errors->has('sertifikat_pendidik'))
                        <span class="help-block">
                          {{ $errors->first('sertifikat_pendidik') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('kode_sertifikat_mp') ? 'has-error' : ''}}">
                        <label for="kode_sertifikat_mp">Kode  Sertifikat MP</label>
                        <input type="text" id="kode_sertifikat_mp" name="kode_sertifikat_mp" value="{{old('kode_sertifikat_mp') ?? $user->karyawan->kode_sertifikat_mp}}" class="form-control" />
                        @if ($errors->has('kode_sertifikat_mp'))
                        <span class="help-block">
                          {{ $errors->first('kode_sertifikat_mp') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('ijazah_terakhir') ? 'has-error' : ''}}">
                        <label for="ijazah_terakhir">Ijazah Terakhir</label>
                        <input type="text" id="ijazah_terakhir" name="ijazah_terakhir" value="{{old('ijazah_terakhir') ?? $user->karyawan->ijazah_terakhir}}" class="form-control" />
                        @if ($errors->has('ijazah_terakhir'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('ijazah_terakhir') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('nomor_ijazah') ? 'has-error' : ''}}">
                        <label for="nomor_ijazah">Nomor Ijazah</label>
                        <input type="text" id="nomor_ijazah" name="nomor_ijazah" value="{{old('nomor_ijazah') ?? $user->karyawan->nomor_ijazah}}" class="form-control" />
                        @if ($errors->has('nomor_ijazah'))
                        <span class="help-block">
                          {{ $errors->first('nomor_ijazah') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('jurusan') ? 'has-error' : ''}}">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" value="{{old('jurusan') ?? $user->karyawan->jurusan}}" class="form-control" />
                        @if ($errors->has('jurusan'))
                        <span class="help-block">
                          {{ $errors->first('jurusan') }}
                        </span>
                        @endif
                      </div>

                      <div class="form-group {{$errors->has('program_studi') ? 'has-error' : ''}}">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" id="program_studi" name="program_studi" value="{{old('program_studi') ?? $user->karyawan->program_studi}}" class="form-control"/>
                        @if ($errors->has('program_studi'))
                        <span class="help-block">
                          {{ $errors->first('program_studi') }}
                        </span>
                        @endif
                      </div>

                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-primary pull-right"><i class="fa fa-arrow-right"></i> Submit</button>
                      <div class="clearfix"></div>
                    </div>

                  </form>
                </div>
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
    $('.datepicker').datepicker({
      autoclose: true,
      format : "yyyy-mm-dd",
    })
  </script>
  <script>
      $('#provinces').on('change', function(e){
        console.log("test");
        var province_id = e.target.value;
        $.get('/manage/json-regencies?province_id=' + province_id,function(data) {
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
        $.get('/manage/json-districts?regencies_id=' + regencies_id,function(data) {
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
        $.get('/manage/json-village?districts_id=' + districts_id,function(data) {
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
        $.get('/manage/json-pos?villages_id=' + villages_id,function(data) {
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