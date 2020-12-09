@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customerStatusChange.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-status-changes.update", [$customerStatusChange->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="old_status_id">{{ trans('cruds.customerStatusChange.fields.old_status') }}</label>
                <select class="form-control select2 {{ $errors->has('old_status') ? 'is-invalid' : '' }}" name="old_status_id" id="old_status_id" required>
                    @foreach($old_statuses as $id => $old_status)
                        <option value="{{ $id }}" {{ (old('old_status_id') ? old('old_status_id') : $customerStatusChange->old_status->id ?? '') == $id ? 'selected' : '' }}>{{ $old_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('old_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('old_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerStatusChange.fields.old_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="new_status_id">{{ trans('cruds.customerStatusChange.fields.new_status') }}</label>
                <select class="form-control select2 {{ $errors->has('new_status') ? 'is-invalid' : '' }}" name="new_status_id" id="new_status_id" required>
                    @foreach($new_statuses as $id => $new_status)
                        <option value="{{ $id }}" {{ (old('new_status_id') ? old('new_status_id') : $customerStatusChange->new_status->id ?? '') == $id ? 'selected' : '' }}>{{ $new_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('new_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerStatusChange.fields.new_status_helper') }}</span>
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