{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($periode))
	{!! Form::hidden('id',$periode->id) !!}
@endif

<div>
	{!! Form::label('tahun_ajaran', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
    {!! Form::text('tahun_ajaran', null, ['class' => 'form-control']) !!}
    @error('tahun_ajaran') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<br>
<div>
  {!! Form::select('semester', ['GANJIL'=>'GANJIL','GENAP'=>'GENAP'], null, ['class' => 'form-control', 'placeholder' => '=== Pilih SEMESTER ===']) !!}
  @error('semester') <small class="text-danger">{{ $message }}</small> @enderror
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
