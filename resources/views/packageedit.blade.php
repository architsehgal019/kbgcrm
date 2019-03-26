@extends('layouts.app')
@section('content')
	<form method="POST" action="/travelpackages/update" enctype="multipart/form-data">
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
			<h3>EDIT TRAVEL PACKAGE</h3>
		  	<div class="tab-pane fade show active in" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-12">
		  					@forelse($package as $pack)
			  					<label class="mt-4">Choose Destination</label>
			  					<select class="form-control w-50" name = "destination" id="destination">
									<option value="0">Choose</option>
									@forelse($destinations as $destination)
										<option value="{{$destination->id}}" {{($pack->destination_id == $destination->id)?'selected':''}}>{{$destination->name}}</option>
										@empty{{''}}
									@endforelse
								</select>

								<label class="mt-4">Choose Subdestination</label>
			  					<select class="form-control w-50" name = "subdestination" id="subdestination">
									<option value="0">Choose</option>
									@forelse($subdestinations as $subdestination)
										<option value="{{$subdestination->id}}" {{($pack->subdestination_id == $subdestination->id)?'selected':''}}>{{$subdestination->subdestination_name}}</option>
										@empty{{''}}
									@endforelse
								</select>
								
								<label class="mt-4">Package Name</label>
								<input type="text" name="package_name" id="package_name" class="form-control" aria-label="package name" placeholder="Package Name" value="{{$pack->package_name}}">

								<label class="mt-4">Duration</label>
								<div class="row">
									<div class="col-6">
										Days
										<select class="form-control w-50" name="days" id="days">
											<option value="0">Choose</option>
											@for($i = 1; $i<=10; $i++)
												<option value="{{$i}}" {{($pack->days == $i)?'selected':''}}>{{$i}}</option>
											@endfor
										</select>		
									</div>
									<div class="col-6">
										Nights
										<input type="number" name="nights" class="form-control" placeholder="Night count" min="0" value="{{$pack->nights}}">		
									</div>
								</div>

								<label class="mt-4">Price</label>
								<input type="number" name="price" class="form-control w-50" placeholder="Price (Starting @)" min="0" value="{{$pack->price}}">

								<label class="mt-4">Package Image</label>
								<input type="file" name="img_url" class="show-preview" accept="image/*" data-target="#package_img" value="">

								<input type="text" name="alt_txt" class="form-control mt-2" placeholder="Alt Text" value="{{$pack->alt_text}}">

								<div class="form-check mt-4 mb-4">
									<input type="checkbox" name="honeymoon_package" class="form-check-input" id="honeymoon_package" value="1" {{$pack->honeymoon_package == '1'?'checked':''}}>
									<label class="form-check-label ml-4" for="popular_destination">Add to Honeymoon Package</label>
								</div>

								<input type="hidden" value="{{$pack->days}}" id="hidden" name="hidden">

								<div class="row">
									<div class="col-12" id="duration_description">
										@php $j = 1;
										@endphp
										@forelse($itinerary as $itin)
											<label class="mt-3">Day {{$j}} </label>
											<input type="text" class="form-control" id = "day{{$j}}" placeholder="Itinerary Title" name="day{{$j}}" value="{{$itin->itinerary_title}}">
											<textarea class="form-control mt-2" rows="10" placeholder="Itinerary Description" id="" name="daydesc{{$j}}">{{$itin->itinerary_description}}</textarea>
											@php 
												$j++;
											@endphp
											@empty{{'no result found'}}
										@endforelse
									</div>
								</div>
								@empty{{'no result found'}}
							@endforelse
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="tab-pane fade" id="pills-inclusion" role="tabpanel" aria-labelledby="pills-inclusion-tab">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-12">
		  					@forelse($inclusion as $inclu)
			  					<label class="mt-3">Inclusion details</label>
								<textarea class="form-control" rows="20" placeholder="Inclusion" id="ckeditor-1" name="inclusion">{{$inclu->inclusion}}</textarea>
		  						@empty{{'no result found'}}
		  					@endforelse
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="tab-pane fade" id="pills-exclusion" role="tabpanel" aria-labelledby="pills-exclusion-tab">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-12">
		  					@forelse($exclusion as $exclu)
						  		<label class="mt-3">Exclusion details</label>
								<textarea class="form-control" rows="20" placeholder="Exclusion" id="ckeditor-2" name="exclusion">{{$exclu->exclusion}}</textarea>			
		  						@empty{{''}}
		  					@endforelse
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="tab-pane fade" id="pills-hotels" role="tabpanel" aria-labelledby="pills-hotels-tab">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-12" id="hotel_fields">
		  					<label class="mt-3">Select no of rows</label>
		  					<select class="form-control w-50" name="days" id="hotel_rows">
										<option value="0">Choose</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
							</select>
							<input type="hidden" value="" id="hidden_hotel" name="hidden_hotel">
							<label class="mt-3">Enter hotel data in table</label>
							<table class="table mt-4">
								<thead class="thead-dark">
									<tr>
										<th>No. of Nights</th>
										<th>Destination</th>
										<th>Standard Hotel</th>
										<th>Deluxe Hotel</th>
										<th>Premium Hotel</th>
										<th>Luxury Hotel</th>
									</tr>
								</thead>
								<tbody id = "tbl_body">
									@php 
										$m = 1;
										$k = 1;
									@endphp

									@forelse($hotel as $hotels)
										<tr>
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter no. of nights" value="{{$hotels->no_of_nights}}"></td>
											@php $k++; @endphp
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter Destination" value="{{$hotels->hotel_destination}}"></td>
											@php $k++; @endphp
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter hotel" value="{{$hotels->standard_hotel}}"></td>
											@php $k++; @endphp
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter hotel" value="{{$hotels->deluxe_hotel}}"></td>
											@php $k++; @endphp
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter hotel" value="{{$hotels->premium_hotel}}"></td>
											@php $k++; @endphp
											<td><input type="text" name="hotel{{$m}}a{{$k}}" class="form-control" placeholder="Enter hotel" value="{{$hotels->luxury_hotel}}"></td>
											@php $m++; @endphp
										</tr>
										@empty{{'no result found'}}
									@endforelse
								</tbody>
							</table>		
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  	{{csrf_field()}}
			<button class="btn btn-outline-secondary mt-4" type="submit">Update Package</button>
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

		    $('#hotel_rows').change(function(){
		    	$('#tbl_body').empty();
		    	var j = $('#hotel_rows').val();
		    	$('#hidden_hotel').val(j);

		    	for(var m = 1; m<=j; m++)
		    	{
		    		var k = 0;
		    		$('#tbl_body').append('<tr>');
		    		++k;
		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter no. of nights" value=""></td>');
		    		++k;
		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter Destination" value=""></td>');
		    		++k;
		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter hotel" value=""></td>');
		    		++k;
		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter hotel" value=""></td>');
		    		++k;

		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter hotel" value=""></td>');
		    		++k;
		    		
		    		$('#tbl_body').append('<td><input type="text" name="hotel'+m+'a'+k+'" class="form-control" placeholder="Enter hotel" value=""></td></tr>');
		    		
		    	}

		    });

		</script>
	</script>
@endsection