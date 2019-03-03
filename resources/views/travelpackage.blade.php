@extends('layouts.app')
@section('content')
	<form method="POST" action="/travelpackages/add" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				  		<li class="nav-item">
				    		<a class="nav-link active show" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="true">Itinerary</a>
				  		</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-inclusion-tab" data-toggle="pill" href="#pills-inclusion" role="tab" aria-controls="pills-inclusion" aria-selected="false">Inclusions</a>
						</li>
						<li class="nav-item">
						    <a class="nav-link" id="pills-exclusion-tab" data-toggle="pill" href="#pills-exclusion" role="tab" aria-controls="pills-exclusion" aria-selected="false">Exclusions</a>
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
									<select class="form-control w-50" name="days" id="days">
										<option value="0">Choose</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>		
								</div>
								<div class="col-6">
									Nights
									<input type="number" name="nights" class="form-control" placeholder="Night count" min="0">		
								</div>
							</div>

							<label class="mt-4">Price</label>
							<input type="number" name="price" class="form-control w-50" placeholder="Price (Starting @)" min="0">

							<label class="mt-4">Package Image</label>
							<input type="file" name="img_url" class="show-preview" accept="image/*" data-target="#package_img" value="">

							<input type="text" name="alt_txt" class="form-control mt-2" placeholder="Alt Text" value="">
							<input type="hidden" value="" id="hidden" name="hidden">

							<div class="row">
								<div class="col-12" id="duration_description">

								</div>
							</div>
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
		  	{{csrf_field()}}
			<button class="btn btn-outline-secondary mt-4" type="submit">Save Package</button>
		</div>
	</form>
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


		    $('#days').change(function(){
		    		$('#duration_description').empty();
		    		var i = $('#days').val();

		    		$('#hidden').val(i);
		    		for(var n = 1; n<=i; n++)
			    	{	
			    		$('#duration_description').append('<label class="mt-3">Day '+n+'</label>');
			    		$('#duration_description').append('<input type="text" class="form-control" id = day"'+n+'" placeholder="Itinerary Title" name="day'+n+'">');
			    		$('#duration_description').append('<textarea class="form-control mt-2" rows="10" placeholder="Itinerary Description" id="ckeditor-'+n+'" name="daydesc'+n+'"></textarea>');
			    	}
		    });
		</script>
@endsection