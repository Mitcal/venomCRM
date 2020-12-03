@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jobType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.jobType.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobType.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.jobType.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobType.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_number">{{ trans('cruds.jobType.fields.category_number') }}</label>
                <input class="form-control {{ $errors->has('category_number') ? 'is-invalid' : '' }}" type="number" name="category_number" id="category_number" value="{{ old('category_number', '') }}" step="1" required>
                @if($errors->has('category_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobType.fields.category_number_helper') }}</span>
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