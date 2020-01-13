@extends('layouts.app')


@section('content')

<div id="ads" class="container mx-auto flex">
    <div class="flex flex-wrap">
         @foreach($posts as $post)
        <div class="w-1/4 mx-4 my-5 shadow-md hover:shadow-xl">
            <div class="ad-price absolute bg-third-900 mt-2 ml-2 text-white p-1 text-xl">{{ $post->post_price }} $</div>
                 @if(json_decode($post->images))
                           
                                @foreach(json_decode($post->images) as $image)
                                        
                                    <img src="/uploads/posts/{{ $image }}" alt="">
                                    @break
                                @endforeach
                            
                            @else
                            
                                    <img src="/uploads/posts/{{ $promote->images }}" alt="">
                           
                            @endif
                           
                <div class="ad-details my-3">
                    <a class="pl-5 pb-3" href="/anunturi/{{$post->id}}" class="text-xl text-center">{{ str_limit($post->post_title, 30) }}</a>
                    <div class="block text-xs pl-3">
                        <p class="uppercase mb-1"><i class="fa fa-map-marker mr-3"></i>{{ $post->post_location }}</p>
                        <p class="uppercase mb-1"><i class="fa fa-map-signs mr-3"></i>{{$post->post_type}}</p>
                        <p class="uppercase mb-1"><i class="fa fa-map-signs mr-3"></i>{{$post->building_type}}</p>
                        <p class="uppercase"><i class="fa fa-clock mr-3"></i>{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="block author-info flex mt-3">
                        <img class="mr-2" width="30" src="/uploads/avatars/{{ $post->user->avatar }}" >
                        <p class="text-md uppercase">{{ $post->user->name }}</p>
                        
                    </div>
                    
                </div>
                <a href="/anunturi/{{$post->id}}" class="text-white text-md rounded bg-third-900 hover:bg-third-500 shadow-md block text-center my-3 mx-1 uppercase">Vezi detalii</a>
            </div>
        @endforeach
    </div>
</div>

@endsection