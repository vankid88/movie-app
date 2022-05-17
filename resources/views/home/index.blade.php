@extends('layouts.default')

@section('content')
    <div class="container">
        @if(Session::get('success', false))
        <?php $data = Session::get('success'); ?>
        @if (is_array($data))
            @foreach ($data as $msg)
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $msg }}
                </div>
            @endforeach
        @else
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
        @endif
        @foreach ($videos as $video)
            <div class="row">
                <div class="col-5">
                    <iframe width="100%" height="250"
                        src="{{ $video->embed_url }}">
                    </iframe>
                </div>
                <div class="col-7">
                    <h2 class="fs-5 text-danger">{{ $video->title }}</h2>
                    <p>Shared by: <span class="font-500 font-italic">{{ $video->email }}</span></p>
                    <p>{{ $video->like_count }} <i class="fa fa-thumbs-up" aria-hidden="true"></i></p>
                    <p></p>
                    <p>Description:</p>
                    <p class="fw-bold fst-italic">{{ Str::limit($video->description, $limit = 300, $end = '...') }}</p>
                </div>
            </div>
        @endforeach
        <div class="card-footer clearfix">
			{{ $videos->links('pagination.default') }}
		</div>
    </div>
@endsection