{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($karyawan))
	{!! Form::hidden('id',$karyawan->id) !!}
@else
	{!! Form::hidden('status',1) !!}
@endif
@if (!isset($karyawan))
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
        {!! Form::text('nama', null, ['class' => 'form-control'],['value'=> '{{old(nama)}}']) !!}
        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
            {!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control'], ['value'=> '{{old(email)}}']) !!}
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('phone', 'Nomor HP :', ['class' => 'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('nip', 'NIP :', ['class' => 'control-label']) !!}
        {!! Form::text('nip', null, ['class' => 'form-control'],['value'=> '{{old(nip)}}']) !!}
        @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('kelamin', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
        {!! Form::select('kelamin', ['LAKI-LAKI'=>'LAKI-LAKI','PEREMPUAN'=>'PEREMPUAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Jenis Kelamin ===']) !!}
        @error('kelamin') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('agama', 'Agama :', ['class' => 'control-label']) !!}
        {!! Form::select('agama', ['BUDDHA'=>'BUDDHA','HINDU'=>'HINDU','ISLAM'=>'ISLAM','KRISTEN KATOLIK'=>'KRISTEN KATOLIK','KRISTEN PROTESTAN'=>'KRISTEN PROTESTAN','KONG HU CU'=>'KONG HU CU','AGAMA KEPERCAYAAN'=>'AGAMA KEPERCAYAAN'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Agama ===']) !!}
        @error('agama') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('tempat_lahir', 'Tempat Lahir :', ['class' => 'control-label']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control'], ['value' => '{{old(tempat_lahir)}}']) !!}
        @error('tempat_lahir') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::text('tanggal_lahir', null, ['class' => 'form-control pull-right', 'id' => 'datepicker'],['value' => '{{old(tempat_lahir)}}']) !!}
        </div>
        @error('tanggal_lahir') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-6">
        {!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    @if(isset($karyawan))
      <div class="col-sm-3">
        <label for="">Provinsi</label>
        <select class="form-control" name="province_id" id="provinces">
          <option value="0" disable="true" selected="true">=== Pilih Provinsi ===</option>
            @foreach ($province as $key => $value)
              <option value="{{$value->province_id}}" @if($karyawan->province_id == $value->province_id) selected @endif >{{ $value->province_name }}</option>
            @endforeach
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kabupaten</label>
        <select class="form-control" name="city_id" id="regencies">
          <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
          @foreach ($city as $key => $value)
            <option value="{{$value->city_id}}" @if($karyawan->city_id == $value->city_id) selected @endif>{{ $value->city_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kecamatan</label>
        <select class="form-control" name="district_id" id="districts">
          <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
          @foreach ($district as $key => $value)
            <option value="{{$value->district_id}}" @if($karyawan->district_id == $value->district_id) selected @endif >{{ $value->district_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kelurahan</label>
        <select class="form-control" name="village_id" id="villages">
          <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
          @foreach ($village as $key => $value)
            <option value="{{$value->village_id}}" @if($karyawan->village_id == $value->village_id) selected @endif >{{ $value->village_name }}</option>
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
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kabupaten</label>
        <select class="form-control" name="city_id" id="regencies">
          <option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kecamatan</label>
        <select class="form-control" name="district_id" id="districts">
          <option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>
        </select>
      </div>
      <div class="col-sm-3">
        <label for="">Kelurahan</label>
        <select class="form-control" name="village_id" id="villages">
          <option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>
        </select>
      </div>
    @endif
</div>
<div class="form-group row">
    <div class="col-sm-3">
        {!! Form::label('kode_pos', 'Kode Pos :', ['class' => 'control-label']) !!}
        {!! Form::text('kode_pos', null, ['class' => 'form-control','id' => 'kode_pos']) !!}
        @error('kode_pos') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('tmt', 'TMT :', ['class' => 'control-label']) !!}
        {!! Form::text('tmt', null, ['class' => 'form-control'], ['value' => '{{old(tmt)}}']) !!}
        @error('tmt') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('sk_pertama', 'SK Pertama :', ['class' => 'control-label']) !!}
        {!! Form::text('sk_pertama', null, ['class' => 'form-control'],  ['value' => '{{old(sk_pertama)}}']) !!}
        @error('sk_pertama') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('nuptk', 'NUPTK :', ['class' => 'control-label']) !!}
        {!! Form::text('nuptk', null, ['class' => 'form-control'],  ['value' => '{{old(nuptk)}}']) !!}
        @error('nuptk') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        {!! Form::label('nrg', 'nrg :', ['class' => 'control-label']) !!}
        {!! Form::text('nrg', null, ['class' => 'form-control']) !!}
        @error('nrg') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('sertifikat_pendidik', 'Sertifikat Pendidik :', ['class' => 'control-label']) !!}
        {!! Form::text('sertifikat_pendidik', null, ['class' => 'form-control']) !!}
        @error('sertifikat_pendidik') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('kode_sertifikat_mp', 'Kode Sertifikat MP :', ['class' => 'control-label']) !!}
        {!! Form::text('kode_sertifikat_mp', null, ['class' => 'form-control']) !!}
        @error('kode_sertifikat_mp') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('ijazah_terakhir', 'Ijazah Terakhir :', ['class' => 'control-label']) !!}
        {!! Form::text('ijazah_terakhir', null, ['class' => 'form-control']) !!}
        @error('ijazah_terakhir') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3">
        {!! Form::label('nomor_ijazah', 'Nomor Ijazah :', ['class' => 'control-label']) !!}
        {!! Form::text('nomor_ijazah', null, ['class' => 'form-control']) !!}
        @error('nomor_ijazah') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('jurusan', 'Jurusan :', ['class' => 'control-label']) !!}
        {!! Form::text('jurusan', null, ['class' => 'form-control']) !!}
        @error('jurusan') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
        {!! Form::label('program_studi', 'Program Studi :', ['class' => 'control-label']) !!}
        {!! Form::text('program_studi', null, ['class' => 'form-control']) !!}
        @error('program_studi') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-sm-3">
      {!! Form::label('photo','Foto :') !!}
      {!! Form::file('photo') !!}
      @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="form-group row">
	<div class="col-sm-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
