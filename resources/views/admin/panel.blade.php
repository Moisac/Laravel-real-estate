@extends('admin.index')


@section('content')

    <div class="container mx-auto">
        <h1 class="text-2xl mx-auto my-5">Panou de administrare</h1>
        <div class="flex">
            <div class="md:w-2/5 text-center shadow-md px-3">
                <div class="row flex">
                    <div class="w-1/2">
                        <h2 class="text-xl font-bold">Anunturi postate</h2>
                        <p class="text-6xl text-third-500">{{ $posts->count() }}</p>
                    </div>
                    <div class="w-1/2">
                        <h2 class="text-xl font-bold">Anunturi promovate</h2>
                        <p class="text-6xl text-third-500">{{ $promoted->count() }}</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <img src="/uploads/frontend/chart.png" alt="">
                </div>
            </div>

            <div class="md:w-3/5 text-center px-10">
                @foreach($posts as $post)

                    <div class="single-post row flex mb-10 shadow-md py-2" data-aos="zoom-out-down">
                        <div class="w-1/6">
                        @if(json_decode($post->images))
                            <carousel :per-page="1" :pagination-enabled="false" autoplay="true">
                                @foreach(json_decode($post->images) as $image)
                                <slide>
                                    <img src="/uploads/posts/{{ $image }}" alt="">
                                </slide>
                                @endforeach
                            </carousel>
                            @else
                            <img src="/uploads/posts/{{ $post->images }}" alt="">
                        @endif
                        </div>
                        <div class="w-4/6">
                            <div class="row">
                                <h2 class="font-semibold">{{ $post->post_title }}</h2>
                            </div>
                            <div class="row flex">
                                <p class="m-2"><i class="fa fa-map-marker mr-2 text-third-900"></i>{{ $post->post_location }}</p>
                                <p class="m-2"><i class="fa fa-map-signs mr-2 text-third-900"></i>{{$post->post_type}}</p>
                                <p class="m-2"><i class="fa fa-clock mr-2 text-third-900"></i>{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="row flex">
                               
                                 <a href="/anunturi/{{$post->id}}" class="w-full mx-5 mt-5 text-white text-md bg-third-900  hover:bg-third-500 uppercase">Vezi detalii</a>
                            </div>
                        </div>
                        <div class="w-1/6 text-center bg-gray-100">
                             <img class="mx-auto mt-2" width="50" src="/uploads/avatars/{{ $post->user->avatar }}" ><br>
                            <p class="text-md uppercase font-bold">{{ $post->user->name }}</p>
                        </div>
                    </div>

                @endforeach
               
            </div>
        </div>
    </div>

@endsection