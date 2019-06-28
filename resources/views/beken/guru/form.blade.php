{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($guru))
	{!! Form::hidden('id',$guru->id) !!}
@endif

<div>
	{!! Form::label('periode_id', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
	@if(count($periode)>0)
    {!! Form::select('periode_id', $periode, null, ['class' => 'form-control', 'id' => 'periode_id', 'placeholder' => '=== Pilih Periode ===']) !!}
  @else
    <p>Periode tidak ada. Silahkan menghubungi admin untuk membuat daftar Periode terlebih dahulu.</p>
  @endif

  @if($errors->has('periode_id'))
    <span><i><b><font color="red">{{$errors->first('periode_id')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('kelas_id', 'Kelas :', ['class' => 'control-label']) !!}
	@if(count($kelas)>0)
    {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control', 'id' => 'kelas_id', 'placeholder' => '=== Pilih Kelas ===']) !!}
  @else
    <p>Kelas tidak ada. Silahkan menghubungi admin untuk membuat daftar Kelas terlebih dahulu.</p>
  @endif

  @if($errors->has('kelas_id'))
    <span><i><b><font color="red">{{$errors->first('kelas_id')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('mapel_id', 'Mata Pelajaran :', ['class' => 'control-label']) !!}
	@if(count($mapel)>0)
    {!! Form::select('mapel_id', $mapel, null, ['class' => 'form-control', 'id' => 'mapel_id', 'placeholder' => '=== Pilih Mata Pelajaran ===']) !!}
  @else
    <p>Mata Pelajaran tidak ada. Silahkan menghubungi admin untuk membuat daftar Mata Pelajaran terlebih dahulu.</p>
  @endif

  @if($errors->has('mapel_id'))
    <span><i><b><font color="red">{{$errors->first('mapel_id')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('karyawan_id', 'Guru :', ['class' => 'control-label']) !!}
	@if(count($karyawan)>0)
    {!! Form::select('karyawan_id', $karyawan, null, ['class' => 'form-control', 'id' => 'karyawan_id', 'placeholder' => '=== Pilih Guru Yang Mengajar ===']) !!}
  @else
    <p>Data Karyawan tidak ada. Silahkan menghubungi admin untuk membuat daftar Karyawan terlebih dahulu.</p>
  @endif

  @if($errors->has('karyawan_id'))
    <span><i><b><font color="red">{{$errors->first('karyawan_id')}}</font></b></i></span><br>
  @endif
</div>
<br>

<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>