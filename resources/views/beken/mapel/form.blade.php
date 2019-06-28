{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($mapel))
	{!! Form::hidden('id',$mapel->id) !!}
@endif

<div>
	{!! Form::label('mapel', 'Mata Pelajaran :', ['class' => 'control-label']) !!}
	{!! Form::text('mapel', null, ['class' => 'form-control']) !!}

  @if($errors->has('mapel'))
    <span><i><b><font color="red">{{$errors->first('mapel')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>