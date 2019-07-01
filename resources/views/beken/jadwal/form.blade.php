{!! csrf_field() !!}
<!-- nama	 -->

<div class="row">
    <div class="col-sm-12">
        @if(isset($jadwal))
            {!! Form::hidden('id',$jadwal->id) !!}
        @endif
        <div class="form-group">
            {!! Form::label('periode_id', 'Tahun Ajaran :', ['class' => 'control-label']) !!}
            @if(count($periode)>0)
            {!! Form::select('periode_id', $periode, null, ['class' => 'form-control', 'id' => 'periode_id', 'placeholder' => '=== Pilih Periode ===']) !!}
            @else
                <p>Periode tidak ada. Silahkan menghubungi admin untuk membuat daftar Periode terlebih dahulu.</p>
            @endif
            @error('periode_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::label('kelas_id', 'Kelas :', ['class' => 'control-label']) !!}
            @if(count($kelas)>0)
                {!! Form::select('kelas_id', $kelas, null, ['class' => 'form-control', 'id' => 'kelas_id', 'placeholder' => '=== Pilih Kelas ===']) !!}
            @else
                <p>Kelas tidak ada. Silahkan menghubungi admin untuk membuat daftar Kelas terlebih dahulu.</p>
            @endif
            @error('kelas_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
        </div>
        <div class="form-group">
            {!! Form::label('mapel_id', 'Mata Pelajaran :', ['class' => 'control-label']) !!}
            @if(count($mapel)>0)
            {!! Form::select('mapel_id', $mapel, null, ['class' => 'form-control', 'id' => 'mapel_id', 'placeholder' => '=== Pilih Mata Pelajaran ===']) !!}
            @else
                <p>Mata Pelajaran tidak ada. Silahkan menghubungi admin untuk membuat daftar Mata Pelajaran terlebih dahulu.</p>
            @endif
            @error('mapel_id') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
        </div>
        <div class="form-group">
                {!! Form::label('hari', 'Hari :', ['class' => 'control-label']) !!}
                {!! Form::select('hari', ['Senin'=>'Senin','Selasa'=>'Selasa','Rabu'=>'Rabu','Kamis'=>'Kamis','Jumat'=>'Jumat','Sabtu'=>'Sabtu','Minggu'=>'Minggu'], null, ['class' => 'form-control', 'id' => 'hari', 'placeholder' => '=== Pilih Hari ===']) !!}
                @error('hari') <small class="text-danger">Tidak boleh dikosongkan!</small> @enderror
            </div>


            @if(isset($jadwal))
            <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Jam :</label>

                      <div class="input-group">
                        <input type="text" class="form-control timepicker" name="jam" value="{{$jadwal->jam}}">

                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
            @else
            <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Jam :</label>

                      <div class="input-group">
                        <input type="text" class="form-control timepicker" name="jam">

                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
            @endif




        <div class="form-group">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>
