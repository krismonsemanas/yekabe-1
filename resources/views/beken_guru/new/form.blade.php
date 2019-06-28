{!! csrf_field() !!}
<!-- nama	 -->

{!! Form::hidden('status',1) !!}

<div class="form-row">
	{!! Form::label('nama', 'Nama Lengkap (termasuk gelar) :', ['class' => 'name']) !!}
	{!! Form::text('nama', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('nama'))
    <span><i><b><font color="red">{{$errors->first('nama')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('nip', 'NIP :', ['class' => 'name']) !!}
	{!! Form::text('nip', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('nip'))
    <span><i><b><font color="red">{{$errors->first('nip')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
  {!! Form::label('kelamin', 'Jenis Kelamin :', ['class' => 'name']) !!}
  {!! Form::select('kelamin', ['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'], null, ['class' => 'input--style-6, value', 'placeholder' => '=== Pilih Jenis Kelamin ===']) !!}
</div>
<br>
<div class="form-row">
  {!! Form::label('agama', 'Agama :', ['class' => 'name']) !!}
  {!! Form::select('agama', ['BUDDHA'=>'BUDDHA','HINDU'=>'HINDU','ISLAM'=>'ISLAM','KRISTEN KATOLIK'=>'KRISTEN KATOLIK','KRISTEN KROTESTAN'=>'KRISTEN KROTESTAN','KONG HU CU'=>'KONG HU CU','AGAMA KEPERCAYAAN'=>'AGAMA KEPERCAYAAN'], null, ['class' => 'input--style-6, value', 'placeholder' => '=== Pilih Agama ===']) !!}
</div>
<br>
<div class="form-row">
	{!! Form::label('tempat_lahir', 'Tempat Lahir :', ['class' => 'name']) !!}
	{!! Form::text('tempat_lahir', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('tempat_lahir'))
    <span><i><b><font color="red">{{$errors->first('tempat_lahir')}}</font></b></i></span><br>
  @endif
</div>
<br>
{!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'name']) !!}
<br />
<div class="input-group date">
  <div class="input-group-addon">
    <i class="fa fa-calendar"></i>
  </div>
	{!! Form::text('tanggal_lahir', null, ['class' => 'input--style-6, value pull-right', 'id' => 'datepicker']) !!}

  @if($errors->has('tanggal_lahir'))
    <span><i><b><font color="red">{{$errors->first('tanggal_lahir')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('email', 'Email :', ['class' => 'name']) !!}
	{!! Form::email('email', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('email'))
    <span><i><b><font color="red">{{$errors->first('email')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('phone', 'Nomor HP :', ['class' => 'name']) !!}
	{!! Form::text('phone', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('phone'))
    <span><i><b><font color="red">{{$errors->first('phone')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('alamat', 'Alamat :', ['class' => 'name']) !!}
	{!! Form::text('alamat', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('alamat'))
    <span><i><b><font color="red">{{$errors->first('alamat')}}</font></b></i></span><br>
  @endif
</div>
<br>
@if(isset($karyawan))
  <div class="form-group">
    <label for="">Provinsi</label>
    <select class="input--style-6, value" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}" selected="{{ $karyawan->province_id == $value->province_id ? 'selected' : '' }}" }}>{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten</label>
    <select class="input--style-6, value" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
      @foreach ($city as $key => $value)
        <option value="{{$value->city_id}}" selected="{{ $karyawan->city_id == $value->city_id ? 'selected' : '' }}" }}>{{ $value->city_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan</label>
    <select class="input--style-6, value" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
      @foreach ($district as $key => $value)
        <option value="{{$value->district_id}}" selected="{{ $karyawan->district_id == $value->district_id ? 'selected' : '' }}" }}>{{ $value->district_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan</label>
    <select class="input--style-6, value" name="village_id" id="villages">
      <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
      @foreach ($village as $key => $value)
        <option value="{{$value->village_id}}" selected="{{ $karyawan->village_id == $value->village_id ? 'selected' : '' }}" }}>{{ $value->village_name }}</option>
      @endforeach
    </select>
  </div>
@else
  <div class="form-group">
    <label for="">Provinsi</label>
    <select class="input--style-6, value" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten</label>
    <select class="input--style-6, value" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan</label>
    <select class="input--style-6, value" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan</label>
    <select class="input--style-6, value" name="village_id" id="villages">
      <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
    </select>
  </div>
@endif
<br>
<div class="form-row">
	{!! Form::label('kode_pos', 'Kode Pos :', ['class' => 'name']) !!}
	{!! Form::text('kode_pos', null, ['class' => 'input--style-6, value','id' => 'kode_pos']) !!}

  @if($errors->has('kode_pos'))
    <span><i><b><font color="red">{{$errors->first('kode_pos')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('tmt', 'TMT :', ['class' => 'name']) !!}
	{!! Form::text('tmt', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('tmt'))
    <span><i><b><font color="red">{{$errors->first('tmt')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('sk_pertama', 'SK Pertama :', ['class' => 'name']) !!}
	{!! Form::text('sk_pertama', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('sk_pertama'))
    <span><i><b><font color="red">{{$errors->first('sk_pertama')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('nuptk', 'NUPTK :', ['class' => 'name']) !!}
	{!! Form::text('nuptk', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('nuptk'))
    <span><i><b><font color="red">{{$errors->first('nuptk')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('nrg', 'nrg :', ['class' => 'name']) !!}
	{!! Form::text('nrg', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('nrg'))
    <span><i><b><font color="red">{{$errors->first('nrg')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('sertifikat_pendidik', 'Sertifikat Pendidik :', ['class' => 'name']) !!}
	{!! Form::text('sertifikat_pendidik', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('sertifikat_pendidik'))
    <span><i><b><font color="red">{{$errors->first('sertifikat_pendidik')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('kode_sertifikat_mp', 'Kode Sertifikat MP :', ['class' => 'name']) !!}
	{!! Form::text('kode_sertifikat_mp', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('kode_sertifikat_mp'))
    <span><i><b><font color="red">{{$errors->first('kode_sertifikat_mp')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('ijazah_terakhir', 'Ijazah Terakhir :', ['class' => 'name']) !!}
	{!! Form::text('ijazah_terakhir', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('ijazah_terakhir'))
    <span><i><b><font color="red">{{$errors->first('ijazah_terakhir')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('nomor_ijazah', 'Nomor Ijazah :', ['class' => 'name']) !!}
	{!! Form::text('nomor_ijazah', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('nomor_ijazah'))
    <span><i><b><font color="red">{{$errors->first('nomor_ijazah')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('jurusan', 'Jurusan :', ['class' => 'name']) !!}
	{!! Form::text('jurusan', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('jurusan'))
    <span><i><b><font color="red">{{$errors->first('jurusan')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
	{!! Form::label('program_studi', 'Program Studi :', ['class' => 'name']) !!}
	{!! Form::text('program_studi', null, ['class' => 'input--style-6, value']) !!}

  @if($errors->has('program_studi'))
    <span><i><b><font color="red">{{$errors->first('program_studi')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-row">
  @if($errors->any())
    <div class="form-group {{$errors->has('photo') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group input-group js-input-file">
  @endif
    {!! Form::label('photo','Foto :',['class'=>'name']) !!}
    <input class="input-file" type="file" name="photo" id="file">
  </div>
  @if($errors->has('photo'))
    <span><i><b><font color="red">{{$errors->first('photo')}}</font></b></i></span><br>
  @endif
</div>






<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary input--style-6, value']) !!}
</div>