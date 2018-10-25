@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        {{--<form method="PUT" action="{{ route('update') }}">--}}
                        {!! Form::open (['action' => ['PostsController@update', $post->id], 'method' => 'put', 'class' => 'form'])!!}

                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Post') }}</label>

                                <div class="col-md-6">
                                    <input id="post_title" type="text" class="form-control{{ $errors->has('post_title') ? ' is-invalid' : '' }}" name="post_title" value="{{ old('post_title') }}" required autofocus>

                                    @if ($errors->has('post_title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Post Content') }}</label>

                                <div class="col-md-6">
                                    {{--<input id="post_content" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}
                                    <textarea id="post_content" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="post_content" required>{{ old('email') }}</textarea>

                                    @if ($errors->has('post_content'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post_content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
