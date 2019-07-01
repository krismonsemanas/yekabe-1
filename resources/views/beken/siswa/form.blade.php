{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($siswa))
	{!! Form::hidden('id',$siswa->id) !!}
@else
	{!! Form::hidden('status',1) !!}
@endif
@if (!isset($siswa))
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('username', 'Username :', ['class' => 'control-label']) !!}
        {!! Form::text('username', null, ['class' => 'form-control'],['value'=> '{{old(username)}}']) !!}
        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" class="form-control">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        <label for="password_conf">Konfirmasi Password : </label>
        <input type="password" name="password_conf" id="password_conf" class="form-control">
        @error('password_conf') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
@endif
<div class="form-group row">
	<div class="col-sm-6">
        {!! Form::label('nama', 'Nama :', ['class' => 'control-label']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control'],['value' => '{{old(nama)}}']) !!}
        @error('nama') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('nisn', 'NISN :', ['class' => 'control-label']) !!}
        {!! Form::text('nisn', null, ['class' => 'form-control'],['value' => '{{old(nisn)}}']) !!}
        @error('nisn') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('kelamin', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
        {!! Form::select('kelamin', ['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Jenis Kelamin ===']) !!}
        @error('kelamin') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('agama', 'Agama :', ['class' => 'control-label']) !!}
        {!! Form::select('agama', ['BUDDHA'=>'BUDDHA','HINDU'=>'HINDU','ISLAM'=>'ISLAM','KRISTEN KATOLIK'=>'KRISTEN KATOLIK','KRISTEN PROTESTAN'=>'KRISTEN PROTESTAN','KONG HU CU'=>'KONG HU CU','AGAMA KEPERCAYAAN'=>'AGAMA KEPERCAYAAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Agama ===']) !!}
        @error('agama') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
<div class="form-group row">
	<div class="col-sm-6">
        {!! Form::label('tempat_lahir', 'Tempat Lahir :', ['class' => 'control-label']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
        @error('tempat_lahir') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
        <br />
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::text('tanggal_lahir', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
        </div>
        @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        @error('email') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('phone', 'Nomor HP :', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        @error('phone') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
<div class="form-group row">
    {{-- nama ayah --}}
    <div class="col-sm-6">
        {!! Form::label('ayah', 'Ayah :', ['class' => 'control-label']) !!}
        {!! Form::text('ayah', null, ['class' => 'form-control']) !!}
        @error('ayah') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
    {{-- nama ibu --}}
    <div class="col-sm-6">
        {!! Form::label('ibu', 'Ibu :', ['class' => 'control-label']) !!}
        {!! Form::text('ibu', null, ['class' => 'form-control']) !!}
        @error('ibu') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
{{-- nama alamat --}}
<div class="form-group row">
    <div class="col-sm-12">
        {!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        @error('alamat') <small class="text-danger">{{ $message }}</small>  @enderror
    </div>
</div>
<div class="form-group row">
    @if(isset($siswa))
        <div class="col-sm-3">
        <label for="">Provinsi</label>
        <select class="form-control" name="province_id" id="provinces">
            <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
            @foreach ($province as $key => $value)
                <option value="{{$value->province_id}}" @if($siswa->province_id == $value->province_id) selected @endif >{{ $value->province_name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm-3">
        <label for="">Kabupaten</label>
        <select class="form-control" name="city_id" id="regencies">
            <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
            @foreach ($city as $key => $value)
            <option value="{{$value->city_id}}" @if($siswa->city_id == $value->city_id) selected @endif>{{ $value->city_name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm-3">
        <label for="">Kecamatan</label>
        <select class="form-control" name="district_id" id="districts">
            <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
            @foreach ($district as $key => $value)
            <option value="{{$value->district_id}}" @if($siswa->district_id == $value->district_id) selected @endif >{{ $value->district_name }}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm-3">
        <label for="">Kelurahan</label>
        <select class="form-control" name="village_id" id="villages">
            <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
            @foreach ($village as $key => $value)
            <option value="{{$value->village_id}}" @if($siswa->village_id == $value->village_id) selected @endif >{{ $value->village_name }}</option>
            @endforeach
        </select>
        </div>
    @else
        <div class="col-sm-3">
        <label for="">Provinsi</label>
        <select class="form-control" name="province_id" id="provinces">
            <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
            @foreach ($province as $key => $value)
                <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
            @endforeach
            @error('province_id') <small class="text-danger">Inputan tidak boleh kosong!</small> @enderror
        </select>
        </div>
        <div class="col-sm-3">
            <label for="">Kabupaten</label>
            <select class="form-control" name="city_id" id="regencies">
                <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
            </select>
            @error('city_id') <small class="text-danger">Inputan tidak boleh kosong!</small> @enderror
        </div>
        <div class="col-sm-3">
            <label for="">Kecamatan</label>
            <select class="form-control" name="district_id" id="districts">
                <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
            </select>
            @error('district_id') <small class="text-danger">Inputan tidak boleh kosong!</small> @enderror
        </div>
        <div class="col-sm-3">
            <label for="">Kelurahan</label>
            <select class="form-control" name="village_id" id="villages">
                <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
            </select>
            @error('village_id') <small class="text-danger">Inputan tidak boleh kosong!</small> @enderror
        </div>
    @endif
</div>
<div class="form-group row">
	<div class="col-sm-6">
        {!! Form::label('kode_pos', 'Kode Pos :', ['class' => 'control-label']) !!}
        {!! Form::text('kode_pos', null, ['class' => 'form-control','id' => 'kode_pos']) !!}
        @error('kode_pos') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
	<div class="col-sm-6">
        {!! Form::label('photo','Foto :') !!}
        {!! Form::file('photo') !!}
        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
{{-- tombol submit --}}
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
