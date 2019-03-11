@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-uppercase">Add Destination</h3>
				<form method="post" action="/destination/add" enctype="multipart/form-data">
					<div class="input-group mb-3 mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-plus"></i>
							</span>
						</div>
						<input type="text" class="form-control" name="destination_name" placeholder="Add Destination name" aria-label="destination_name" aria-describedby="basic-addon2">
					</div>
					<label class="mt-4">Choose Destination</label>
					<input type="file" name="bannerimg_url" class="show-preview" accept="image/*" data-target="#banner_img" value="">

					{{csrf_field()}}
					<button class="btn btn-outline-secondary mt-4" type="submit">Add</button>
				</form>
			</div>
			<div class="col-12 mt-4">
				<hr class="mt-4">
				<h3 class="mt-4 text-uppercase">Add Subdestination </h3>
				<form method="post" action="/destination/subplaces">
					<label class="mt-4">Choose Destination</label>
					<select class="form-control" name = "subdestination" id="subdestination">
							<option value="0">Choose</option>
							@forelse($destinations as $destination)
								<option value="{{$destination->id}}">{{$destination->name}}</option>
								@empty{{''}}
							@endforelse
					</select>
					<label class="mt-4">Add subdestination name</label>
					<div class="input-group mb-3 mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-plus"></i>
							</span>
						</div>
						<input type="text" name="subdestination_name" id="subdestination_name" class="form-control" aria-label="Subdestination" placeholder="Subdestination name">
					</div>
					{{csrf_field()}}
					<button type="submit" class="btn btn-outline-secondary mt-4" id="btn_add">Add</button>
				</form>
			</div>
			<div class="col-12 mt-4">
				<a href="/destination/view" class="float-right btn btn-outline-primary">View Destinations and Subdestinations</a>
			</div>
		</div>
	</div>
@endsection