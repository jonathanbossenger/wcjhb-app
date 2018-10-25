@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                            <tr>
                                <td>
                                    Post Id
                                </td>
                                <td>
                                    Post Title
                                </td>
                                <td>
                                    Post Date
                                </td>
                                <td>
                                    Actions
                                </td>
                            </tr>
                            </thead>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->post_id}}</td>
                                    <td>{{$post->post_title}}</td>
                                    <td>{{$post->post_date}}</td>
                                    <td><a href="{{url('posts/'.$post->id.'/edit')}}">Edit</a> </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
