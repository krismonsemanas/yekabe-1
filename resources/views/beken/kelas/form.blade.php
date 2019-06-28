{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($kelas))
	{!! Form::hidden('id',$kelas->id) !!}
@endif

<div>
	{!! Form::label('kelas', 'Kelas :', ['class' => 'control-label']) !!}
	{!! Form::text('kelas', null, ['class' => 'form-control']) !!}

  @if($errors->has('kelas'))
    <span><i><b><font color="red">{{$errors->first('kelas')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>