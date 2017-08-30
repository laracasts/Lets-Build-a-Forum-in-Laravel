@if (count($errors))
    <div class="alert alert-danger">
	<strong>There are problems with your posting</strong>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
