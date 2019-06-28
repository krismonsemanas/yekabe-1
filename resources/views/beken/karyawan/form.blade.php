{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($karyawan))
	{!! Form::hidden('id',$karyawan->id) !!}
@else
	{!! Form::hidden('status',1) !!}
@endif

<div>
	{!! Form::label('nama', 'Nama :', ['class' => 'control-label']) !!}
	{!! Form::text('nama', null, ['class' => 'form-control']) !!}

  @if($errors->has('nama'))
    <span><i><b><font color="red">{{$errors->first('nama')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nip', 'NIP :', ['class' => 'control-label']) !!}
	{!! Form::text('nip', null, ['class' => 'form-control']) !!}

  @if($errors->has('nip'))
    <span><i><b><font color="red">{{$errors->first('nip')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
  {!! Form::label('kelamin', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
  {!! Form::select('kelamin', ['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Jenis Kelamin ===']) !!}
</div>
<br>
<div>
  {!! Form::label('agama', 'Agama :', ['class' => 'control-label']) !!}
  {!! Form::select('agama', ['BUDDHA'=>'BUDDHA','HINDU'=>'HINDU','ISLAM'=>'ISLAM','KRISTEN KATOLIK'=>'KRISTEN KATOLIK','KRISTEN PROTESTAN'=>'KRISTEN PROTESTAN','KONG HU CU'=>'KONG HU CU','AGAMA KEPERCAYAAN'=>'AGAMA KEPERCAYAAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Agama ===']) !!}
</div>
<br>
<div>
	{!! Form::label('tempat_lahir', 'Tempat Lahir :', ['class' => 'control-label']) !!}
	{!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}

  @if($errors->has('tempat_lahir'))
    <span><i><b><font color="red">{{$errors->first('tempat_lahir')}}</font></b></i></span><br>
  @endif
</div>
<br>
{!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
<br />
<div class="input-group date">
  <div class="input-group-addon">
    <i class="fa fa-calendar"></i>
  </div>
	{!! Form::text('tanggal_lahir', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}

  @if($errors->has('tanggal_lahir'))
    <span><i><b><font color="red">{{$errors->first('tanggal_lahir')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}

  @if($errors->has('email'))
    <span><i><b><font color="red">{{$errors->first('email')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('phone', 'Nomor HP :', ['class' => 'control-label']) !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}

  @if($errors->has('phone'))
    <span><i><b><font color="red">{{$errors->first('phone')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
	{!! Form::text('alamat', null, ['class' => 'form-control']) !!}

  @if($errors->has('alamat'))
    <span><i><b><font color="red">{{$errors->first('alamat')}}</font></b></i></span><br>
  @endif
</div>
<br>
@if(isset($karyawan))
  <div class="form-group">
    <label for="">Provinsi</label>
    <select class="form-control" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}" selected="{{ $karyawan->province_id == $value->province_id ? 'selected' : '' }}" }}>{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten</label>
    <select class="form-control" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
      @foreach ($city as $key => $value)
        <option value="{{$value->city_id}}" selected="{{ $karyawan->city_id == $value->city_id ? 'selected' : '' }}" }}>{{ $value->city_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan</label>
    <select class="form-control" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
      @foreach ($district as $key => $value)
        <option value="{{$value->district_id}}" selected="{{ $karyawan->district_id == $value->district_id ? 'selected' : '' }}" }}>{{ $value->district_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan</label>
    <select class="form-control" name="village_id" id="villages">
      <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
      @foreach ($village as $key => $value)
        <option value="{{$value->village_id}}" selected="{{ $karyawan->village_id == $value->village_id ? 'selected' : '' }}" }}>{{ $value->village_name }}</option>
      @endforeach
    </select>
  </div>
@else
  <div class="form-group">
    <label for="">Provinsi</label>
    <select class="form-control" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten</label>
    <select class="form-control" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan</label>
    <select class="form-control" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan</label>
    <select class="form-control" name="village_id" id="villages">
      <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
    </select>
  </div>
@endif
<br>
<div>
	{!! Form::label('kode_pos', 'Kode Pos :', ['class' => 'control-label']) !!}
	{!! Form::text('kode_pos', null, ['class' => 'form-control','id' => 'kode_pos']) !!}

  @if($errors->has('kode_pos'))
    <span><i><b><font color="red">{{$errors->first('kode_pos')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('tmt', 'TMT :', ['class' => 'control-label']) !!}
	{!! Form::text('tmt', null, ['class' => 'form-control']) !!}

  @if($errors->has('tmt'))
    <span><i><b><font color="red">{{$errors->first('tmt')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('sk_pertama', 'SK Pertama :', ['class' => 'control-label']) !!}
	{!! Form::text('sk_pertama', null, ['class' => 'form-control']) !!}

  @if($errors->has('sk_pertama'))
    <span><i><b><font color="red">{{$errors->first('sk_pertama')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nuptk', 'NUPTK :', ['class' => 'control-label']) !!}
	{!! Form::text('nuptk', null, ['class' => 'form-control']) !!}

  @if($errors->has('nuptk'))
    <span><i><b><font color="red">{{$errors->first('nuptk')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nrg', 'nrg :', ['class' => 'control-label']) !!}
	{!! Form::text('nrg', null, ['class' => 'form-control']) !!}

  @if($errors->has('nrg'))
    <span><i><b><font color="red">{{$errors->first('nrg')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('sertifikat_pendidik', 'Sertifikat Pendidik :', ['class' => 'control-label']) !!}
	{!! Form::text('sertifikat_pendidik', null, ['class' => 'form-control']) !!}

  @if($errors->has('sertifikat_pendidik'))
    <span><i><b><font color="red">{{$errors->first('sertifikat_pendidik')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('kode_sertifikat_mp', 'Kode Sertifikat MP :', ['class' => 'control-label']) !!}
	{!! Form::text('kode_sertifikat_mp', null, ['class' => 'form-control']) !!}

  @if($errors->has('kode_sertifikat_mp'))
    <span><i><b><font color="red">{{$errors->first('kode_sertifikat_mp')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('ijazah_terakhir', 'Ijazah Terakhir :', ['class' => 'control-label']) !!}
	{!! Form::text('ijazah_terakhir', null, ['class' => 'form-control']) !!}

  @if($errors->has('ijazah_terakhir'))
    <span><i><b><font color="red">{{$errors->first('ijazah_terakhir')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nomor_ijazah', 'Nomor Ijazah :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor_ijazah', null, ['class' => 'form-control']) !!}

  @if($errors->has('nomor_ijazah'))
    <span><i><b><font color="red">{{$errors->first('nomor_ijazah')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('jurusan', 'Jurusan :', ['class' => 'control-label']) !!}
	{!! Form::text('jurusan', null, ['class' => 'form-control']) !!}

  @if($errors->has('jurusan'))
    <span><i><b><font color="red">{{$errors->first('jurusan')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('program_studi', 'Program Studi :', ['class' => 'control-label']) !!}
	{!! Form::text('program_studi', null, ['class' => 'form-control']) !!}

  @if($errors->has('program_studi'))
    <span><i><b><font color="red">{{$errors->first('program_studi')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
  @if($errors->any())
    <div class="form-group {{$errors->has('photo') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group">
  @endif
  {!! Form::label('photo','Foto :') !!}
  {!! Form::file('photo') !!}

  @if($errors->has('photo'))
    <span><i><b><font color="red">{{$errors->first('photo')}}</font></b></i></span><br>
  @endif
</div>






<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
