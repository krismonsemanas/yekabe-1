{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($siswa))
	{!! Form::hidden('id',$siswa->id) !!}
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
	{!! Form::label('nisn', 'NISN :', ['class' => 'control-label']) !!}
	{!! Form::text('nisn', null, ['class' => 'form-control']) !!}

  @if($errors->has('nisn'))
    <span><i><b><font color="red">{{$errors->first('nisn')}}</font></b></i></span><br>
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
  {!! Form::select('agama', ['BUDDHA'=>'BUDDHA','HINDU'=>'HINDU','ISLAM'=>'ISLAM','KRISTEN KATOLIK'=>'KRISTEN KATOLIK','KRISTEN KROTESTAN'=>'KRISTEN KROTESTAN','KONG HU CU'=>'KONG HU CU','AGAMA KEPERCAYAAN'=>'AGAMA KEPERCAYAAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Agama ===']) !!}
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

{{-- nama ayah --}}

<div>
	{!! Form::label('ayah', 'Ayah :', ['class' => 'control-label']) !!}
	{!! Form::text('ayah', null, ['class' => 'form-control']) !!}

  @if($errors->has('ayah'))
    <span><i><b><font color="red">{{$errors->first('ayah')}}</font></b></i></span><br>
  @endif
</div>
<br>

{{-- nama ibu --}}

<div>
	{!! Form::label('ibu', 'Ibu :', ['class' => 'control-label']) !!}
	{!! Form::text('ibu', null, ['class' => 'form-control']) !!}

  @if($errors->has('ibu'))
    <span><i><b><font color="red">{{$errors->first('ibu')}}</font></b></i></span><br>
  @endif
</div>
<br>

{{-- nama alamat --}}

<div>
	{!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
	{!! Form::text('alamat', null, ['class' => 'form-control']) !!}

  @if($errors->has('alamat'))
    <span><i><b><font color="red">{{$errors->first('alamat')}}</font></b></i></span><br>
  @endif
</div>
<br>

{{-- provinsi --}}
@if(isset($siswa))
  <div class="form-group">
    <label for="">Provinsi :</label>
    <select class="form-control" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}" selected="{{ $siswa->province_id == $value->province_id ? 'selected' : '' }}" }}>{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten :</label>
    <select class="form-control" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
      @foreach ($city as $key => $value)
        <option value="{{$value->city_id}}" selected="{{ $siswa->city_id == $value->city_id ? 'selected' : '' }}" }}>{{ $value->city_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan :</label>
    <select class="form-control" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
      @foreach ($district as $key => $value)
        <option value="{{$value->district_id}}" selected="{{ $siswa->district_id == $value->district_id ? 'selected' : '' }}" }}>{{ $value->district_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan :</label>
    <select class="form-control" name="village_id" id="villages">
      <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
      @foreach ($village as $key => $value)
        <option value="{{$value->village_id}}" selected="{{ $siswa->village_id == $value->village_id ? 'selected' : '' }}" }}>{{ $value->village_name }}</option>
      @endforeach
    </select>
  </div>
@else
  <div class="form-group">
    <label for="">Provinsi :</label>
    <select class="form-control" name="province_id" id="provinces">
      <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
        @foreach ($province as $key => $value)
          <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="">Kabupaten :</label>
    <select class="form-control" name="city_id" id="regencies">
      <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kecamatan :</label>
    <select class="form-control" name="district_id" id="districts">
      <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Kelurahan :</label>
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

{{-- tombol submit --}}

<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>