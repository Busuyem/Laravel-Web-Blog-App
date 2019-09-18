@if(session('create'))
<div class = 'alert alert-success text text-center pt-2'>
    <h4> {{session('create')}}</h4>
</div>
@endif


@if(session('update'))
<div class="alert alert-success text text-center pt-2">
    <h4> {{session('update')}}</h4>
</div>


@endif


@if(session('delete'))
<div class="alert alert-success text text-center pt-2">
    <h4> {{session('delete')}}</h4>
</div>
@endif

@if(session('error'))
<div class="alert alert-success text text-center pt-2">
    <h4> {{session('error')}}</h4>
</div>
@endif