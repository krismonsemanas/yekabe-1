{!! csrf_field() !!}
<!-- nama	 -->
<div class="row">
    <div class="col-sm-12">
        @if(isset($slider))
            {!! Form::hidden('id',$slider->id) !!}
        @endif
        <div class="form-group row">
           <div class="col-sm-6">
                <label for="foto">Foto Slider</label>
                <input type="file" name="foto" id="foto" >
                @error('foto') <small class="text-danger"> {{$message}} </small> @enderror
           </div>
           @if (isset($slider))
            <div class="col-sm-6">
                    <p>Foto Lama</p>
                    <img src="/photo/sliders/{{$slider->foto}}" alt="{{$slider->foto}}" class="img-serponsive" width="200" height="200">
            </div>
           @endif
        </div>
        <div class="form-group">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>

