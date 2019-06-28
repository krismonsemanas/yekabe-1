@if(Session::has("success"))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{Session::get('success')}}</strong>
</div>
@endif

@if(Session::has("warning"))
<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{Session::get('warning')}}!</strong>
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{Session::has('info')}}</strong>
</div>
@endif

