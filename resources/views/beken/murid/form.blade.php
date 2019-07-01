{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($murid))
	{!! Form::hidden('id',$murid->id) !!}
@endif

<div>
	{!! Form::label('periode_id', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
	@if(count($periode)>0)
    {!! Form::select('periode_id', $periode, null, ['class' => 'form-control', 'id' => 'periode_id', 'placeholder' => '=== Pilih Periode ===']) !!}
  @else
    <p>Periode tidak ada. Silahkan menghubungi admin untuk membuat daftar Periode terlebih dahulu.</p>
  @endif
  @error('periode_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
</div>
<br>
<div>
	{!! Form::label('kelas_id', 'Kelas :', ['class' => 'control-label']) !!}
	@if(count($kelas)>0)
    {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control', 'id' => 'kelas_id', 'placeholder' => '=== Pilih Kelas ===']) !!}
  @else
    <p>Kelas tidak ada. Silahkan menghubungi admin untuk membuat daftar Kelas terlebih dahulu.</p>
  @endif
  @error('kelas_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
</div>
<br>
<div>
	{!! Form::label('mapel_id', 'Mata Pelajaran :', ['class' => 'control-label']) !!}
	@if(count($mapel)>0)
    {!! Form::select('mapel_id', $mapel, null, ['class' => 'form-control', 'id' => 'mapel_id', 'placeholder' => '=== Pilih Mata Pelajaran ===']) !!}
  @else
    <p>Mata Pelajaran tidak ada. Silahkan menghubungi admin untuk membuat daftar Mata Pelajaran terlebih dahulu.</p>
  @endif
  @error('mapel_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
</div>
<br>
<div>
	{!! Form::label('siswa_id', 'Siswa :', ['class' => 'control-label']) !!}
	@if(count($siswa)>0)
    {!! Form::select('siswa_id', $siswa, null, ['class' => 'form-control', 'id' => 'siswa_id', 'placeholder' => '=== Pilih Siswa ===']) !!}
  @else
    <p>Data Siswa tidak ada. Silahkan menghubungi admin untuk membuat daftar Siswa terlebih dahulu.</p>
  @endif
  @error('siswa_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
</div>
    <input type="hidden" name="active" value="1">
<br>

<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
