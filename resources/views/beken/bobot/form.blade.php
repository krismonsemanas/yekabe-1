{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($bobot))
	{!! Form::hidden('id',$bobot->id) !!}
@endif

<div>
	{!! Form::label('nama', 'Nama Bobot :', ['class' => 'control-label']) !!}
	{!! Form::text('nama', null, ['class' => 'form-control']) !!}

  @if($errors->has('nama'))
    <span><i><b><font color="red">{{$errors->first('nama')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
        {!! Form::label('persentase', 'Persentase :', ['class' => 'control-label']) !!}
        {!! Form::text('persentase', null, ['class' => 'form-control']) !!}

      @if($errors->has('persentase'))
        <span><i><b><font color="red">{{$errors->first('persentase')}}</font></b></i></span><br>
      @endif
    </div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
