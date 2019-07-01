{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($wali))
	{!! Form::hidden('id',$wali->id) !!}
@endif
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('periode_id', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
            @if(count($periode)>0)
            {!! Form::select('periode_id', $periode, null, ['class' => 'form-control', 'id' => 'periode_id', 'placeholder' => '=== Pilih Periode ===']) !!}
          @else
            <p>Periode tidak ada. Silahkan menghubungi admin untuk membuat daftar Periode terlebih dahulu.</p>
          @endif
          @error('periode_id') <small class="text-danger">Inputan tidak boleh kosong</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::label('karyawan_id', 'Guru :', ['class' => 'control-label']) !!}
            @if(count($guru)>0)
            {!! Form::select('karyawan_id', $guru, null, ['class' => 'form-control', 'id' => 'karyawan_id', 'placeholder' => '=== Pilih Guru ===']) !!}
          @else
            <p>Data Guru tidak ada. Silahkan menghubungi admin untuk membuat daftar Guru terlebih dahulu.</p>
          @endif
          @error('karyawan_id') <small class="text-danger">Inputan tidak boleh kosong</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::label('kelas_id', 'Kelas :', ['class' => 'control-label']) !!}
            @if(count($kelas)>0)
            {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control', 'id' => 'kelas_id', 'placeholder' => '=== Pilih Kelas ===']) !!}
          @else
            <p>Kelas tidak ada. Silahkan menghubungi admin untuk membuat daftar Kelas terlebih dahulu.</p>
          @endif
          @error('kelas_id') <small class="text-danger">Inputan tidak boleh kosong</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>
