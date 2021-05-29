@if(Session::has('message'))
<div class="alert">
    <p>{{Session::get('message')}}</p>
</div>
@elseif(Session::has('success'))
<div class="alert success">
    <p>{{Session::get('success')}}</p>
</div>
@elseif(Session::has('error'))
<div class="alert error">
    <p>{{Session::get('error')}}</p>
</div>
@endif