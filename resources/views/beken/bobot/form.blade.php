{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($periode))
	{!! Form::hidden('id',$periode->id) !!}
@endif

<div>
	{!! Form::label('tahun_ajaran', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
	{!! Form::text('tahun_ajaran', null, ['class' => 'form-control']) !!}

  @if($errors->has('tahun_ajaran'))
    <span><i><b><font color="red">{{$errors->first('tahun_ajaran')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
  {!! Form::select('semester', ['GANJIL'=>'GANJIL','GENAP'=>'GENAP'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih SEMESTER ===']) !!}

  @if($errors->has('semester'))
    <span><i><b><font color="red">{{$errors->first('semester')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>