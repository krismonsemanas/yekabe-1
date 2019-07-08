@extends('tenpureto.beken.index')

@section('seo-title')
	Absen Maps
@endsection

@section('title')
  <h1>
    Maps
    <small>Maps</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Maps</a></li>
  <li class="active">Maps</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endpush

@section('main')

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="box box-default">
            <div class="box">
              @if(session('new'))
              <!-- Success Alert -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('new') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('new')}}
              @endif
              @if(session('edit'))
              <!-- Success Alert -->
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('edit') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('edit')}}
              @endif
              @if(session('delete'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('delete') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('delete')}}
              @endif
              @if(session('gagal'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Perhatian</strong></h4>
                    <p>{{ session('gagal') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('gagal')}}
              @endif
            <div class="box-header">
              <h3 class="box-title">Data absen gps</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="googleMaps" style="height: 500px"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
@endsection

@push('js')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAqofo8JH6KXDzx5b6aqnL-Z_nTpz8ybcc"></script>
    <script>
        $(document).ready(function() {
            load_map();
            function load_map(){
                var mapsLayout = document.getElementById('googleMaps');
                let center = {
                    lat: -0.0676774,
                    lng: 109.3709019
                }
                var maps = new google.maps.Map(mapsLayout,
                {
                    zoom: 16,
                    center: center
                });
                // get maps
                $.get('maps/data',function(data) {
                    $(data).each(function (index, item) {
                        // var point 	    = new google.maps.LatLng(parseFloat($(item.lat_absent)),parseFloat(item.lng_absen));
                        // console.log(point)
                       var point = {
                           lat: parseFloat(item.lat_absent),
                           lng: parseFloat(item.lng_absent)
                       }
                       create_marker(point,item.nama,maps,item.photo,item.nisn,item.datetime_absent);
                    })
                });

                function create_marker(point,nama,maps,foto,nisn,tanggal){
                    var tgl = tanggal.substring(0,10);
                    var jam = tanggal.substring(11,20);
                    var contentString = `
                        <div class="box box-widget widget-user-2">
                                <div class="widget-user-header bg-yellow">
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="/photo/student/`+foto+`" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">`+nama+`</h3>
                                    <h5 class="widget-user-desc">`+nisn+`</h5>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="#">Tanggal <span class="pull-right badge bg-blue">`+tgl+`</span></a></li>
                                            <li><a href="#">Jam Absen <span class="pull-right badge bg-red">`+jam+`</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    `;
                    var marker = new google.maps.Marker({
                        position: point,
                        map: maps,
                        animation: google.maps.Animation.DROP,
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    marker.addListener('click',function() {
                        infowindow.open(maps,marker)
                    })
                }
            }
        })
    </script>
@endpush
