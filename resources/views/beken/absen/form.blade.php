{!! csrf_field() !!}
<!-- nama	 -->

{{-- @if(isset($siswa))
	{!! Form::hidden('id',$siswa->id) !!}
@endif --}}
{!! Form::hidden('guru_id',$guru->id) !!}
{{-- {!! Form::hidden('siswa_id',$kelas->id) !!} --}}
<div>
        {{-- {!! Form::label('data_murid_id', 'Nama Siswa :', ['class' => 'control-label']) !!} --}}
        @if(count($siswa)>0)
        {!! Form::label('data_murid_id', 'Siswa :', ['class' => 'control-label']) !!}
        {!! Form::select('data_murid_id', $siswa, null, ['class' => 'form-control', 'id' => 'data_murid_id', 'placeholder' => '=== Pilih Siswa ===']) !!}
      @else
        <p>Data Siswa Tidak Ada. Silahkan menghubungi admin untuk membuat Data Siswa terlebih dahulu.</p>
      @endif

      @if($errors->has('data_murid_id'))
        <span><i><b><font color="red">{{$errors->first('data_murid_id')}}</font></b></i></span><br>
      @endif
    </div>
<br>
<div>
        {!! Form::label('status', 'Status :', ['class' => 'control-label']) !!}
  {!! Form::select('status', ['H'=>'Hadir','I'=>'Izin','S'=>'Sakit','A'=>'Alpha'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih Status ===']) !!}

  @if($errors->has('status'))
    <span><i><b><font color="red">{{$errors->first('status')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
        {!! Form::label('keterangan', 'Keterangan :', ['class' => 'control-label']) !!}
        {!! Form::text('keterangan', null, ['class' => 'form-control','placeholder' => '=== Keterangan ===']) !!}
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
