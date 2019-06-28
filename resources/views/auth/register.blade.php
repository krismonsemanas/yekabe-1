
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{'tenpureto/bower_components/font-awesome/css/font-awesome.css'}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('tenpureto/reg.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register</h1>
              </div>
              <form class="user" action="{{route('register')}}" enctype="multipart/form-data" method="POST">
                  @csrf
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" name="username" class="form-control form-control-user"  placeholder="Username Anda">
                        @error('username') <small class=" text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="email" placeholder="Email anda">
                        @error('email') <small class=" text-danger">{{ $message }}</small> @enderror
                      </div>
                      <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="phone" placeholder="No Hp anda">
                        @error('phone') <small class=" text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3 mb-1 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    @error('password') <small class=" text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-sm-3">
                    <input type="password" name="password_conf" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        <select class="form-control" name="province_id" id="provinces">
                            <option value="" disable="true" selected="true">-- Pilih Provinsi --</option>
                                @foreach ($province as $key => $value)
                                <option value="{{$value->province_id}}">{{ $value->province_name }}</option>
                                @endforeach
                        </select>
                        @error('province_id') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        <select class="form-control" name="city_id" id="regencies">
                            <option value="" disable="true" selected="true">-- Pilih Kabupaten --</option>
                        </select>
                        @error('city_id') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-1 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama anda (beserta gelar)">
                        @error('nama') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        <select class="form-control" name="district_id" id="districts">
                            <option value="0" disable="true" selected="true">-- Pilih Kecamatan --</option>
                        </select>
                        @error('district_id') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        <select class="form-control" name="village_id" id="villages">
                                <option value="0" disable="true" selected="true">-- Pilih Kelurahan --</option>
                        </select>
                        @error('village_id') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-1 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="nip" placeholder="Nip anda">
                    @error('nip') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        {!! Form::text('kode_pos', null, ['class' => 'form-control form-control-user','id' => 'kode_pos','placeholder'=>'Kode Pos']) !!}
                        @error('kode_pos') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" name="tmt" class="form-control form-control-user" placeholder="TMT">
                        @error('tmt') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-1 mb-sm-0">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" value="LAKI-LAKI" name="kelamin" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" value="PEREMPUAN" name="kelamin" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                        </div>
                        @error('kelamin') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                      <input type="text" name="sk_pertama" placeholder="SK Pertama" class="form-control form-control-user">
                      @error('sk_pertama') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                  <div class="col-sm-3 mb-1 mb-sm-0">
                      <input type="text" name="nuptk" placeholder="NUPTK" class="form-control form-control-user">
                      @error('nuptk') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-1 mb-sm-0">
                        <select class="form-control" name="agama">
                            <option value="" selected="true">-- Pilih Salah Satu --</option>
                            <option value="ISLAM">Islam</option>
                            <option value="KRISTEN KATOLIK">Kristen Katolik</option>
                            <option value="KRISTEN PROTESTAN">Kristen Protestan</option>
                            <option value="HINDU">Hindu</option>
                            <option value="BUDDHA">Budha</option>
                            <option value="KONG HU CU">Kong Hu Cu</option>
                            <option value="AGAMA KEPERCAYAAN">Kepercayaan</option>
                        </select>
                        @error('agama') <small class=" text-danger">{{ $message }}</small> @enderror
                  </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" name="nrg" placeholder="NRG" class="form-control form-control-user">
                        @error('nrg') <small class=" text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" name="sertifikat_pendidik" placeholder="Sertifikat Pendidik" class="form-control form-control-user">
                        @error('sertifikat_pendidik') <small class=" text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="tempat_lahir" placeholder="Tempat Lahir">
                        @error('tempat_lahir') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="date" class="form-control form-control-user" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        @error('tanggal_lahir') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" name="kode_sertifikat_mp" placeholder="Kode Serifikat MP" class="form-control form-control-user">
                        @error('kode_sertifikat_mp') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-3 mb-1 mb-sm-0">
                        <input type="text" name="ijazah_terakhir" placeholder="Ijazah Terakhir" class="form-control form-control-user">
                        @error('ijazah_terakhir') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <textarea name="alamat" cols="30" rows="1" class="form-control form-control-user" placeholder="Alamat anda"></textarea>
                        @error('alamat') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-6 mb-1 mb-sm-0">
                        <input type="text" name="nomor_ijazah" placeholder="Nomor Ijazah" class="form-control form-control-user">
                        @error('nomor_ijazah') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-1 mb-sm-3">
                        <input type="text" name="jurusan" class="form-control form-control-user" placeholder="Jurusan">
                        @error('jurusan') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-6 mb-1 mb-sm-3">
                        <input type="text" name="program_studi" class="form-control form-control-user" placeholder="Program Studi">
                        @error('program_studi') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-1 mb-sm-0">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" class="form-control-file form-control-user" name="photo">
                        @error('photo') <small class="text-10 text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-sm-6 mb-1 mt-5 mb-sm-0">
                        <button type="submit" name="btnRegis" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </div>
                <hr>
              </form>
              <div class="text-center">
                <a class="small" href="/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- jQuery 3 -->
<script src="{{asset('tenpureto/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script>
        $('#provinces').on('change', function(e){
          console.log("test");
          var province_id = e.target.value;
          $.get('/json-regencies?province_id=' + province_id,function(data) {
            console.log(data);
            $('#regencies').empty();
            $('#regencies').append('<option value="0" disable="true" selected="true">=== Pilih Kabupaten ===</option>');

            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

            $.each(data, function(index, regenciesObj){
              $('#regencies').append('<option value="'+ regenciesObj.city_id +'">'+ regenciesObj.city_name +'</option>');
            })
          });
        });

        $('#regencies').on('change', function(e){
          console.log(e);
          var regencies_id = e.target.value;
          $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
            console.log(data);
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');


            $.each(data, function(index, districtsObj){
              $('#districts').append('<option value="'+ districtsObj.district_id +'">'+ districtsObj.district_name +'</option>');
            })
          });
        });

        $('#districts').on('change', function(e){
          console.log(e);
          var districts_id = e.target.value;
          $.get('/json-village?districts_id=' + districts_id,function(data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

            $.each(data, function(index, villagesObj){
              $('#villages').append('<option value="'+ villagesObj.village_id +'">'+ villagesObj.village_name +'</option>');
            })
          });
        });

        $('#villages').on('change', function(e){
          console.log(e);
          var villages_id = e.target.value;
          $.get('/json-pos?villages_id=' + villages_id,function(data) {
            console.log(data);
            $('#kode_pos').empty();
            $('#kode_pos').append('');

            $.each(data, function(index, posObj){
              $('#kode_pos').val(posObj.village_postcode);
            })
          });
        });
    </script>
</body>
</html>
