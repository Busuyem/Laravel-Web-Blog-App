@if(session('create'))

<h4 class = 'alert alert-success ml-100 col-md-8'> {{session('create')}}</h4>

@endif


@if(session('update'))

<h4 class = 'alert alert-success ml-100 col-md-8'> {{session('update')}}</h4>

@endif


@if(session('delete'))

<h4 class = 'alert alert-danger ml-100 col-md-8'> {{session('delete')}}</h4>

@endif

@if(session('error'))

<h4 class = 'alert alert-danger ml-100 col-md-8'> {{session('error')}}</h4>

@endif