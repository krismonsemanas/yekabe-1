{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($kelas))
	{!! Form::hidden('id',$kelas->id) !!}
@endif

<div>
	{!! Form::label('kelas', 'Kelas :', ['class' => 'control-label']) !!}
	{!! Form::text('kelas', null, ['class' => 'form-control']) !!}
    @error('kelas') <small class="text-danger">Inputan tidak boleh kosong!</small> @enderror()
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
