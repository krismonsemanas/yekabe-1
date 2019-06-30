{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($beasiswa))
	{!! Form::hidden('id',$beasiswa->id) !!}
@else
	{!! Form::hidden('status',1) !!}
@endif
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('judul', 'Judul Beasiswa :', ['class' => 'control-label']) !!}
            {!! Form::text('judul', null, ['class' => 'form-control']) !!}
            @error('judul') <small class="text-danger">Tidak boleh kosong</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::label('isi', 'Isi Pengumuan Beasiswa :', ['class' => 'control-label']) !!}
            {!! Form::textarea('isi', null, ['class' => 'form-control', 'id' => 'isi']) !!}
            @error('isi') <small class="text-danger">Tidak boleh kosong</small> @enderror
        </div>
        {!! Form::label('sampai', 'Tanggal Berakhir Pengumuman Beasiswa :', ['class' => 'control-label']) !!}
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
            {!! Form::text('sampai', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
            @error('sampai') <small class="text-danger">Tidak boleh kosong</small> @enderror
        </div>
        <br>
        <div class="form-group">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>
