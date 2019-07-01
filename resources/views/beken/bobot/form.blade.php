{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($bobot))
	{!! Form::hidden('id',$bobot->id) !!}
@endif

<div>
	{!! Form::label('nama', 'Nama Bobot :', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<br>
<div>
        {!! Form::label('persentase', 'Persentase :', ['class' => 'control-label']) !!}
        {!! Form::text('persentase', null, ['class' => 'form-control']) !!}
        @error('persentase') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
