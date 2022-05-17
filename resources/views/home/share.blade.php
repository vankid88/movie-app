@extends('layouts.default')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    Share A Youtube movie
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateVideo') }}">
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Youtube URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" class="form-control form-control-sm" required="required" />
                                @if ($errors->has('url'))
                                    <span class="text-danger text-left">{{ $errors->first('url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center mt-3">
                            <button class="w-50 btn btn-primary" type="submit">Share</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection