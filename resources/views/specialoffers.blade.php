@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-uppercase">Add special offer banner</h3>
				<form method="post" action="/offers/add" enctype="multipart/form-data">
					<label class="mt-4">Choose Offer Image</label>
					<input type="file" name="offerimg_url" class="show-preview" accept="image/*" data-target="#offer_img" value="">
					<label class="mt-4">Alt text</label>
					<input type="text" class="form-control" name="alt_text" placeholder="Add Alt Text" aria-label="alt_text">
					
					{{csrf_field()}}
					<button class="btn btn-outline-secondary mt-4" type="submit">Add Offer</button>
				</form>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<h3 class="mt-4 text-uppercase">VIEW ALL OFFERS</h3>
				<table class="table mt-4">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($offer as $offers)
							<tr>
								<td>{{$offers->id}}</td>
								<td>{{$offers->image}}</td>
								<td><i class="fa fa-edit" data-toggle="modal" role="button" data-target="#offerModal{{$offers->id}}"></i></td>
							</tr>
							@empty{{''}}
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('modal')
	@forelse($offer as $offers)
		<div class="modal fade" id="offerModal{{$offers->id}}" tabindex="-1" role="dialog" aria-labelledby="offerModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<form action="/offers/update" method="post" class="w-100" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Offers</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="text" name="alt_text" class="form-control" value="{{$offers->alt_text}}">
							<label class="mt-4">Offer Image</label>
							<input type="file" name="offer_img" class="show-preview" accept="image/*" value="">
							<img src="/crm/uploads/{{$offers->image}}" class="w-50">
							<input type="hidden" value="{{$offers->image}}" name="imgname">
							<input type="hidden" name="id" value="{{$offers->id}}">
						</div>
						<div class="modal-footer">
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{url('/offers/delete/'.$offers->id)}}" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		@empty{{''}}
	@endforelse
@endsection