@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Add Destination</h3>
				<form method="post" action="/destination/add">
					<div class="input-group mb-3 mt-3">
						<input type="text" class="form-control" name="destination_name" placeholder="Add Destination name" aria-label="destination_name" aria-describedby="basic-addon2">
						<div class="input-group-append">
							{{csrf_field()}}
						    <button class="btn btn-outline-secondary" type="submit">Add</button>
						 </div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection