@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ $post['data']['url'] }}">{{
                                $post['data']['title'] }}</a></li>

                    </ul>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
