@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crmCustomer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-customers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

				<div class="col-lg-8 col-md-8">

					<div id="fillin">

							<form method="POST" action="{{ route("admin.crm-customers.store") }}" enctype="multipart/form-data">
							    @csrf
								
								<div class="row">

									<div class="col-md-6">

										<div class="form-group firstnameSection addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.salesperson') }}</label>

											 <select class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="salesperson" id="salesperson" required>
														 @foreach($users as $id => $user)
															<option value="{{ $id }}" {{ Auth::id() == $id ? 'selected' : '' }}>{{ $user }}</option>
														@endforeach
											</select>

										</div>

									</div>
									
									<div class="col-md-6 salutSection addReqClass">

											<label class="required" for="date_time">{{ trans('cruds.crmCustomer.fields.date_time') }}</label>
											<input class="form-control datetime {{ $errors->has('date_time') ? 'is-invalid' : '' }}" type="text" name="date_time" id="date_time" value="{{ old('date_time') }}" required>
											<span class="help-block">{{ trans('cruds.crmCustomer.fields.date_time_helper') }}</span>

									</div>

									

									 

								</div>
							<fieldset>
								
							<legend>Customer Details</legend>

								<div class="row">

									<div class="col-md-2 salutSection addReqClass">

									<label>{{ trans('cruds.crmCustomer.fields.title') }}</label>

										<select id="title" name="title"  class="form-control addRequiredClass" required>

											<option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
											@foreach(App\CrmCustomer::TITLE_SELECT as $key => $label)
												<option value="{{ $key }}" {{ old('title', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
											@endforeach

										</select><br>

									</div>

									<div class="col-md-5">

										<div class="form-group firstnameSection addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.first_name') }}</label>

											<input type="text" pattern="[a-zA-Z0-9 \x27\x2d]+" class="form-control addRequiredClass" name="first_name" id="first_name" placeholder="*Firstname*" required>

										</div>

									</div>

									<div class="col-md-5">

										<div class="form-group surnameSection addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.last_name') }}</label>

											<input type="text" pattern="[a-zA-Z0-9 \x27\x2d]+" class="form-control addRequiredClass" name="last_name" id="last_name" placeholder="*Surname*" required>

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-sm-6">

										<div class="form-group phoneSection addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.phone') }}</label>

											<input type="text" class="form-control addReqClass" name="phone" id="phone" placeholder="*Phone*" required>

										</div>

									</div>

									<div class="col-sm-6">

										<div class="form-group">

										<label>{{ trans('cruds.crmCustomer.fields.email') }}</label>

											<input type="email" class="form-control" name="email" id="email" placeholder="*Email*">

										</div>

									</div>

								</div>	

							</fieldset>

							<fieldset>

							<legend>Location</legend>

								<div class="row">

									<div class="col-md-6">

										<div class="form-group">

											<div id="postcode_lookup_field"></div>

										</div>		

									</div>	

									<div class="col-md-6">

										<div class="form-group">

											<div id="lookup_field"></div>

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-sm-3">

										<div class="form-group">

											<label>Postcode Search</label>

											<input type="text" class="form-control" name="postcodesearch" id="postcodesearch" required>

											

										</div>	

									</div>	

									<div class="col-sm-3">

										<button name="btnPostcodeSearch" id="btnPostcodeSearch" value="Search" onclick="return false;" class="btn btn-success btn-lg  btn-block">Search</button>

									</div>	

									

									<div class="col-sm-6">

										<div class="form-group">

											<label>Select Address</label>

											<select class="form-control" name="address" id="addressSelection" required>

												<option> - Select - </option>

											</select>

											

										</div>

										<span id="mapsLink"></span>

									</div>

								</div>
								
								<div class="row">

								

									<div class="col-md-6">

										<div class="form-group addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.address_postcode') }}</label>

											<input type="text" class="form-control" name="address_postcode" id="postcode" required>

										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group addReqClass">
												<label class="required" for="hsnum">House Number/Name</label>
												<input class="form-control {{ $errors->has('hsnum') ? 'is-invalid' : '' }}" type="text" name="hsnum" id="hsnum" value="{{ old('hsnum', '') }}" required>

										</div>

									</div>

								</div>	

								<div class="row">

								

									<div class="col-md-6">

										<div class="form-group addReqClass">

										<label>Address Road</label>

											<input type="text" class="form-control" name="road" id="road" required>

										</div>

									</div>


									<div class="col-md-6">

										<div class="form-group addReqClass">
												 
												<label>{{ trans('cruds.crmCustomer.fields.address_town') }}</label>

												<input type="text" class="form-control" name="address_town" id="town" required>
										</div>

									</div>

								</div>	

								

								<div class="form-group">

								<label>{{ trans('cruds.crmCustomer.fields.address_country') }}</label>

									<input type="text" class="form-control" name="address_country" id="address_country" >

								</div>

							

							</fieldset>



							<div class="form-group">
								<label for="instagram">{{ trans('cruds.crmCustomer.fields.instagram') }}</label>
								<input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
								@if($errors->has('instagram'))
									<div class="invalid-feedback">
										{{ $errors->first('instagram') }}
									</div>
								@endif
								<span class="help-block">{{ trans('cruds.crmCustomer.fields.instagram_helper') }}</span>
							</div>
							<div class="form-group">
								<label for="facebook">{{ trans('cruds.crmCustomer.fields.facebook') }}</label>
								<input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
								@if($errors->has('facebook'))
									<div class="invalid-feedback">
										{{ $errors->first('facebook') }}
									</div>
								@endif
								<span class="help-block">{{ trans('cruds.crmCustomer.fields.facebook_helper') }}</span>
							</div>
							<div class="form-group">
								<label for="social_other">{{ trans('cruds.crmCustomer.fields.social_other') }}</label>
								<input class="form-control {{ $errors->has('social_other') ? 'is-invalid' : '' }}" type="text" name="social_other" id="social_other" value="{{ old('social_other', '') }}">
								@if($errors->has('social_other'))
									<div class="invalid-feedback">
										{{ $errors->first('social_other') }}
									</div>
								@endif
								<span class="help-block">{{ trans('cruds.crmCustomer.fields.social_other_helper') }}</span>
							</div>
							 


							<fieldset>

							<legend>Vehicle</legend>

							

								<div class="row">

									<div class="col-md-6">

										<div class="form-group">

										<label>Registration Search</label>

											<input type="text" class="form-control" name="vehicle_reg" id="regSearch" placeholder="Reg Lookup" required>

										</div>

									</div>

									<div class="col-md-6">

										<button name="registrationSearch" id="registrationSearch" value="Search" onclick="return false;" class="btn btn-success btn-lg  btn-block">Search Registration</button>

									</div>

								</div>


								<div class="row">

									<div class="col-sm-3">

										<div class="form-group addReqClass">

										<label>{{ trans('cruds.crmCustomer.fields.vehicle_make') }}</label>

											<input type="text" class="form-control addRequiredClass" name="vehicle_make" id="make" placeholder="*Make*" required>

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group addReqClass">

										<label>Vehicle Model</label>

											<input type="text" class="form-control addRequiredClass" name="vehicle_model" id="model" placeholder="*Model*" required>

										</div>

									</div>
									
									<div class="col-sm-3">

										<div class="form-group addReqClass">

										<label>Vehicle Age</label>

											<input type="text" class="form-control addRequiredClass" name="vehicle_age" id="vehicle_age" placeholder="*Age*" required>

										</div>

									</div>
									
									<div class="col-sm-3">

										<div class="form-group addReqClass">

										<label>Vehicle Colour</label>

											<input type="text" class="form-control addRequiredClass" name="vehicle_colour" id="vehicleColour" placeholder="*Colour*" required>

										</div>

									</div>

								</div>	

								
							</fieldset>
							
							
							<div class="row">

								<div class="col-md-3 col-sm-6">

									<div class="form-group">
										<label class="required" for="status_id">{{ trans('cruds.crmCustomer.fields.status') }}</label>
										<select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
											@foreach($statuses as $id => $status)
												<option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
											@endforeach
										</select>
										@if($errors->has('status'))
											<div class="invalid-feedback">
												{{ $errors->first('status') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.crmCustomer.fields.status_helper') }}</span>
									</div>									

								</div>

								 

							</div>

							<div class="row">

								<div class="col-md-3 col-sm-6">

								<button class="btn btn-danger" type="submit">
										{{ trans('global.save') }}
								</button>
									

								</div>

								 

							</div>


							


						</form>

						<br>

						

					</div><!--end fillin-->

				</div>

			</div>

        </form>
    </div>
</div>



@endsection
