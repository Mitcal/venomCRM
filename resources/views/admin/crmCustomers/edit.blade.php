@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.crmCustomer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-customers.update", [$crmCustomer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date_time">{{ trans('cruds.crmCustomer.fields.date_time') }}</label>
                <input class="form-control datetime {{ $errors->has('date_time') ? 'is-invalid' : '' }}" type="text" name="date_time" id="date_time" value="{{ old('date_time', $crmCustomer->date_time) }}" required>
                @if($errors->has('date_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.date_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salesperson">{{ trans('cruds.crmCustomer.fields.salesperson') }}</label>
                <input class="form-control {{ $errors->has('salesperson') ? 'is-invalid' : '' }}" type="text" name="salesperson" id="salesperson" value="{{ old('salesperson', $crmCustomer->salesperson) }}" required>
                @if($errors->has('salesperson'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salesperson') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.salesperson_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.crmCustomer.fields.title') }}</label>
                <select class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title">
                    <option value disabled {{ old('title', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\CrmCustomer::TITLE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('title', $crmCustomer->title) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.crmCustomer.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $crmCustomer->first_name) }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.crmCustomer.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $crmCustomer->last_name) }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.crmCustomer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $crmCustomer->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.crmCustomer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $crmCustomer->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.crmCustomer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $crmCustomer->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.crmCustomer.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', $crmCustomer->address_2) }}">
                @if($errors->has('address_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_3">{{ trans('cruds.crmCustomer.fields.address_3') }}</label>
                <input class="form-control {{ $errors->has('address_3') ? 'is-invalid' : '' }}" type="text" name="address_3" id="address_3" value="{{ old('address_3', $crmCustomer->address_3) }}">
                @if($errors->has('address_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_town">{{ trans('cruds.crmCustomer.fields.address_town') }}</label>
                <input class="form-control {{ $errors->has('address_town') ? 'is-invalid' : '' }}" type="text" name="address_town" id="address_town" value="{{ old('address_town', $crmCustomer->address_town) }}">
                @if($errors->has('address_town'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_town') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_town_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_city">{{ trans('cruds.crmCustomer.fields.address_city') }}</label>
                <input class="form-control {{ $errors->has('address_city') ? 'is-invalid' : '' }}" type="text" name="address_city" id="address_city" value="{{ old('address_city', $crmCustomer->address_city) }}" required>
                @if($errors->has('address_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_county">{{ trans('cruds.crmCustomer.fields.address_county') }}</label>
                <input class="form-control {{ $errors->has('address_county') ? 'is-invalid' : '' }}" type="text" name="address_county" id="address_county" value="{{ old('address_county', $crmCustomer->address_county) }}">
                @if($errors->has('address_county'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_county') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_postcode">{{ trans('cruds.crmCustomer.fields.address_postcode') }}</label>
                <input class="form-control {{ $errors->has('address_postcode') ? 'is-invalid' : '' }}" type="text" name="address_postcode" id="address_postcode" value="{{ old('address_postcode', $crmCustomer->address_postcode) }}">
                @if($errors->has('address_postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_country">{{ trans('cruds.crmCustomer.fields.address_country') }}</label>
                <input class="form-control {{ $errors->has('address_country') ? 'is-invalid' : '' }}" type="text" name="address_country" id="address_country" value="{{ old('address_country', $crmCustomer->address_country) }}">
                @if($errors->has('address_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.crmCustomer.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $crmCustomer->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.crmCustomer.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $crmCustomer->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="social_other">{{ trans('cruds.crmCustomer.fields.social_other') }}</label>
                <input class="form-control {{ $errors->has('social_other') ? 'is-invalid' : '' }}" type="text" name="social_other" id="social_other" value="{{ old('social_other', $crmCustomer->social_other) }}">
                @if($errors->has('social_other'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_other') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.social_other_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_source_id">{{ trans('cruds.crmCustomer.fields.lead_source') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_source') ? 'is-invalid' : '' }}" name="lead_source_id" id="lead_source_id">
                    @foreach($lead_sources as $id => $lead_source)
                        <option value="{{ $id }}" {{ (old('lead_source_id') ? old('lead_source_id') : $crmCustomer->lead_source->id ?? '') == $id ? 'selected' : '' }}>{{ $lead_source }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.lead_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_reg">{{ trans('cruds.crmCustomer.fields.vehicle_reg') }}</label>
                <input class="form-control {{ $errors->has('vehicle_reg') ? 'is-invalid' : '' }}" type="text" name="vehicle_reg" id="vehicle_reg" value="{{ old('vehicle_reg', $crmCustomer->vehicle_reg) }}">
                @if($errors->has('vehicle_reg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_reg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vehicle_reg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_make">{{ trans('cruds.crmCustomer.fields.vehicle_make') }}</label>
                <input class="form-control {{ $errors->has('vehicle_make') ? 'is-invalid' : '' }}" type="text" name="vehicle_make" id="vehicle_make" value="{{ old('vehicle_make', $crmCustomer->vehicle_make) }}">
                @if($errors->has('vehicle_make'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_make') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vehicle_make_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.crmCustomer.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $crmCustomer->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_model">{{ trans('cruds.crmCustomer.fields.vehicle_model') }}</label>
                <input class="form-control {{ $errors->has('vehicle_model') ? 'is-invalid' : '' }}" type="text" name="vehicle_model" id="vehicle_model" value="{{ old('vehicle_model', $crmCustomer->vehicle_model) }}">
                @if($errors->has('vehicle_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vehicle_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_age">{{ trans('cruds.crmCustomer.fields.vehicle_age') }}</label>
                <input class="form-control {{ $errors->has('vehicle_age') ? 'is-invalid' : '' }}" type="text" name="vehicle_age" id="vehicle_age" value="{{ old('vehicle_age', $crmCustomer->vehicle_age) }}">
                @if($errors->has('vehicle_age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vehicle_age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_colour">{{ trans('cruds.crmCustomer.fields.vehicle_colour') }}</label>
                <input class="form-control {{ $errors->has('vehicle_colour') ? 'is-invalid' : '' }}" type="text" name="vehicle_colour" id="vehicle_colour" value="{{ old('vehicle_colour', $crmCustomer->vehicle_colour) }}">
                @if($errors->has('vehicle_colour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_colour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.vehicle_colour_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="market_segment_id">{{ trans('cruds.crmCustomer.fields.market_segment') }}</label>
                <select class="form-control select2 {{ $errors->has('market_segment') ? 'is-invalid' : '' }}" name="market_segment_id" id="market_segment_id">
                    @foreach($market_segments as $id => $market_segment)
                        <option value="{{ $id }}" {{ (old('market_segment_id') ? old('market_segment_id') : $crmCustomer->market_segment->id ?? '') == $id ? 'selected' : '' }}>{{ $market_segment }}</option>
                    @endforeach
                </select>
                @if($errors->has('market_segment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('market_segment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.market_segment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="job_type_id">{{ trans('cruds.crmCustomer.fields.job_type') }}</label>
                <select class="form-control select2 {{ $errors->has('job_type') ? 'is-invalid' : '' }}" name="job_type_id" id="job_type_id" required>
                    @foreach($job_types as $id => $job_type)
                        <option value="{{ $id }}" {{ (old('job_type_id') ? old('job_type_id') : $crmCustomer->job_type->id ?? '') == $id ? 'selected' : '' }}>{{ $job_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.job_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.crmCustomer.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $crmCustomer->price) }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.crmCustomer.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $crmCustomer->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_notes">{{ trans('cruds.crmCustomer.fields.job_notes') }}</label>
                <input class="form-control {{ $errors->has('job_notes') ? 'is-invalid' : '' }}" type="text" name="job_notes" id="job_notes" value="{{ old('job_notes', $crmCustomer->job_notes) }}">
                @if($errors->has('job_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.crmCustomer.fields.job_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection