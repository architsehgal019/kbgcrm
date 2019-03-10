@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-4">View Destination</h3>
				@foreach($destination as $d)
					<img src="{{$d->bannerimg}}">
				@endforeach	
			</div>
		</div>
	</div>
@endsection