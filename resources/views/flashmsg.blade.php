@if (session('success'))
<div class="alert alert-success alert-block">
    <strong>{{ session('success') }}</strong>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-block">
    <strong>{{ session('error') }}</strong>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-block">
	<strong>{{ session('warning') }}</strong>
</div>
@endif

@if (session('info'))
<div class="alert alert-info alert-block">
	<strong>{{ session('info') }}</strong>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-block">
    <ul>
    @foreach ($errors->all() as $error)
        <li>
            <strong>{{ $error }}</strong>
        </li>
    @endforeach
    </ul>
</div>
@endif
