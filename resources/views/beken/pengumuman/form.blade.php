{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($pengumuman))
	{!! Form::hidden('id',$pengumuman->id) !!}
@else
	{!! Form::hidden('status',1) !!}
@endif

<div>
	{!! Form::label('judul', 'Judul Pengumuman :', ['class' => 'control-label']) !!}
	{!! Form::text('judul', null, ['class' => 'form-control']) !!}

  @if($errors->has('judul'))
    <span><i><b><font color="red">{{$errors->first('judul')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('isi', 'Isi Pengumuman :', ['class' => 'control-label']) !!}
	{!! Form::textarea('isi', null, ['class' => 'form-control', 'id' => 'isi']) !!}

  @if($errors->has('isi'))
    <span><i><b><font color="red">{{$errors->first('isi')}}</font></b></i></span><br>
  @endif
</div>
<br>
{!! Form::label('sampai', 'Tanggal Berakhir Pengumuman :', ['class' => 'control-label']) !!}
<br />
<div class="input-group date">
  <div class="input-group-addon">
    <i class="fa fa-calendar"></i>
  </div>
	{!! Form::text('sampai', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}

  @if($errors->has('sampai'))
    <span><i><b><font color="red">{{$errors->first('sampai')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>