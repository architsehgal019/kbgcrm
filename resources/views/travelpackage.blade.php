@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  		<li class="nav-item">
			    		<a class="nav-link active show" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="true">General</a>
			  		</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-inclusion-tab" data-toggle="pill" href="#pills-inclusion" role="tab" aria-controls="pills-inclusion" aria-selected="false">Inclusion</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="pills-exclusion-tab" data-toggle="pill" href="#pills-exclusion" role="tab" aria-controls="pills-exclusion" aria-selected="false">Exclusion</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="pills-hotels-tab" data-toggle="pill" href="#pills-hotels" role="tab" aria-controls="pills-hotels" aria-selected="false">Hotels</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="tab-content" id="pills-tabContent">
		<h3>ADD TRAVEL PACKAGES</h3>
	  	<div class="tab-pane fade show active in" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-12">
	  					<label class="mt-4">Choose Destination</label>
	  					<select class="form-control w-50" name = "destination" id="destination">
							<option value="0">Choose</option>
							@forelse($destinations as $destination)
								<option value="{{$destination->id}}">{{$destination->name}}</option>
								@empty{{''}}
							@endforelse
						</select>

						<label class="mt-4">Choose Subdestination</label>
	  					<select class="form-control w-50" name = "subdestination" id="subdestination">
							<option value="0">Choose</option>
							@forelse($subdestinations as $subdestination)
								<option value="{{$subdestination->id}}">{{$subdestination->subdestination_name}}</option>
								@empty{{''}}
							@endforelse
						</select>
						
						<label class="mt-4">Package Name</label>
						<input type="text" name="package_name" id="package_name" class="form-control" aria-label="package name" placeholder="Package Name">

						<label class="mt-4">Duration</label>
						<div class="row">
							<div class="col-6">
								Days
								<input type="number" name="days" class="form-control" placeholder="Days count" min="0">		
							</div>
							<div class="col-6">
								Nights
								<input type="number" name="nights" class="form-control" placeholder="Night count" min="0">		
							</div>
						</div>

						<label class="mt-4">Price</label>
						<input type="number" name="price" class="form-control w-50" placeholder="Price (Starting @)" min="0">
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="tab-pane fade" id="pills-inclusion" role="tabpanel" aria-labelledby="pills-inclusion-tab">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-12">
	  					<label class="mt-3">Inclusion details</label>
						<textarea class="form-control" rows="20" placeholder="Inclusion" id="ckeditor-1" name="inclusion"></textarea>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="tab-pane fade" id="pills-exclusion" role="tabpanel" aria-labelledby="pills-exclusion-tab">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-12">
				  		<label class="mt-3">Exclusion details</label>
						<textarea class="form-control" rows="20" placeholder="Exclusion" id="ckeditor-2" name="exclusion"></textarea>			
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="tab-pane fade" id="pills-hotels" role="tabpanel" aria-labelledby="pills-hotels-tab">Hotels</div>
	</div>
@endsection
@section('extra-js')
	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
		<script type="text/javascript">
			ClassicEditor
		        .create( document.querySelector( '#ckeditor-1' ) )
		        .catch( error => {
		            console.error( error );
		        } );

		   	ClassicEditor
		        .create( document.querySelector( '#ckeditor-2' ) )
		        .catch( error => {
		            console.error( error );
		        } );
		</script>
@endsection