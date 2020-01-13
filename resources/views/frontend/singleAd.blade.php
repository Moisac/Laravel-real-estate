@extends('layouts.app')


@section('content')

<div id="ads" class="container mx-auto flex">
    

    <div class="w-9/12">

        <div class="mx-4 my-5 row">
            <div class="ad-price absolute bg-blue-900 mt-2 ml-2 text-white p-1 text-sm">{{ $post->post_type }} </div>
            <div class="ad-price bg-third-900 text-white p-1 text-xl float-right font-bold"> {{ $post->post_price }} $</div>

            @if(json_decode($post->images))
            <carousel :per-page="2" navigation-enabled="true" autoplay="true">
                @foreach(json_decode($post->images) as $image)
                <slide>
                    <img src="/uploads/posts/{{ $image }}" alt="">
                </slide>
                @endforeach
            </carousel>
            @else
             <img src="/uploads/posts/{{ $post->images }}" alt="">
            @endif
                <p class="pl-5 pb-3 mt-3 text-3xl font-semibold">{{ $post->post_title }}</p>
                @if($post->post_promote == 'Anunt promovat')
                <div class="ad-price bg-yellow-500 text-white p-1 text-lg font-bold text-center">{{ $post->post_promote }}</div>
                @endif
                <div class="ad-details text-xs my-3">
                    <div class="flex pl-3 my-10">
                        <p class="uppercase mb-1 mr-10"><i class="fa fa-map-marker mr-3 text-2xl text-third-900"></i>{{ $post->post_location }}</p>
                        <p class="uppercase mb-1 mr-10"><i class="fa fa-map-signs mr-3 text-2xl text-third-900"></i>{{$post->post_type}}</p>
                        <p class="uppercase"><i class="fa fa-clock mr-3 text-2xl text-third-900"></i>{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="ad-benefits flex flex-wrap">
                    <p class="md:w-1/3 my-3"><b>An constructie:</b> {{ $post->post_year }}</p>
                    <p class="md:w-1/3 my-3"><b>Stare bloc:</b> 
                    @if($post->post_therm == 'Alege facilitati')
                    -
                    @else
                    {{ $post->post_therm }}
                    @endif
                    
                    </p>
                    <p class="md:w-1/3 my-3"><b>Etaj:</b> 
                     @if($post->post_floor == 'Alege etaj')
                    -
                    @else
                    {{ $post->post_floor }}
                    @endif</p>
                    <p class="md:w-1/3 my-3"><b>Stare locuinta:</b> 
                     {{ $post->post_furnished }}</p>
                    <p class="md:w-1/3 my-3"><b>Alte dotari:</b> 
                     @if($post->post_features == 'Alege dotari')
                    -
                    @else
                    {{ $post->post_features }}
                    @endif</p>
                </div>
                <h4 class="font-semibold mt-10">Informatii suplimentare despre <i class="font-bold">{{ $post->post_title }}</i></h4>
                <div class="post-description my-5 bg-gray-300 p-5">
                    <p>{{ $post->post_content }}</p>
                </div>
            </div>

            <!--Promoted ads-->
        <div class="home-new-ads my-10 container mx-auto">
            <h1 class="text-2xl mb-8 pb-3 border-b-2 border-third-900 w-1/4">Anunturi promovate</h1>
                <div class="container mx-auto">
                <carousel :per-page-custom="[[768,3], [1024,4]]" :autoPlay="true">
                    @foreach($promoted as $promote)
                    <slide>
                    <div id="single-ad-card" class="mx-4 shadow-md hover:shadow-xl" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
                         <div class="ad-price absolute bg-blue-900 mt-10 ml-2 text-white p-1 text-sm">{{ $promote->post_type }} </div>
                        <div class="ad-price absolute right-0 bg-third-900 text-white mt-10 p-1 text-xl float-right font-bold"> {{ $promote->post_price }} $</div>
                         @if($promote->post_promote == 'Anunt promovat')
                            <div class="ad-promoted bg-yellow-500 text-white p-1 text-lg font-bold text-center h-8">{{ $promote->post_promote }}</div>
                            @else
                             <div class="ad-promoted bg-white-900 text-white p-1 text-lg font-bold text-center h-8"></div>
                        @endif
                        

                        @if(json_decode($promote->images))
                            
                            @foreach(json_decode($promote->images) as $image)
                            
                                <img src="/uploads/posts/{{ $image }}" alt="">
                            @break
                            @endforeach
                        
                        @else
                        
                            
                                <img src="/uploads/posts/{{ $promote->images }}" alt="">

                        @endif

                        <div class="ad-details my-3">
                            <div>
                                <a class="pl-5 pb-3" href="/anunturi/{{$promote->id}}" class="text-xl text-center">{{ str_limit($promote->post_title, 30) }}</a>
                            </div>
                        
                        <hr>
                            <div class="block pl-3 text-xs">
                                <p class="uppercase mb-1"><i class="fa fa-map-marker mr-3"></i>{{ $promote->post_location }}</p>
                                <p class="uppercase mb-1"><i class="fa fa-map-signs mr-3"></i>{{$promote->post_type}}</p>
                                <p class="uppercase"><i class="fa fa-clock mr-3"></i>{{ $promote->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="block author-info flex mt-3">
                            
                                <img class="mr-2" width="30" src="/uploads/avatars/{{ $promote->user->avatar }}" >
                                
                                <p class="text-md uppercase">{{ $promote->user->name }}</p>
                                
                            </div>
                            
                        </div>
                        <a href="/anunturi/{{$promote->id}}" class="text-white text-md rounded bg-third-900 hover:bg-third-500 shadow-md block text-center my-3 mx-1 uppercase">Vezi detalii</a>
                    </div>
                    </slide>
                    @endforeach
                    </carousel>
                </div>
            </div>

            <!--End Promoted ads-->

    </div>
    <!-- Single ad sidebar-->
    <div class="w-3/12">
        <div class="block author-info mt-3 bg-gray-300 p-5">
            <h1 class="text-lg my-2 pb-2 border-b-2 border-third-900">Informatii despre {{ $post->user->name }}</h1>
            <img class="my-5 rounded-full" width="50" src="/uploads/avatars/{{ $post->user->avatar }}" >
            <p>Pe site din <b>{{ $post->user->created_at->toFormattedDateString() }}</b></p>
            @if(!Auth::user())
                <a href="/login" class="text-xs text-white text-md rounded bg-third-900 hover:bg-third-500 shadow-md block text-center my-3 mx-1 uppercase pointer">Vezi numarul lui {{ $post->user->name }}!</a>
            @else
            <a class="text-lg text-white text-md rounded bg-third-900 hover:bg-third-500 shadow-md block text-center my-3 mx-1 uppercase pointer" href="tel:{{ $post->user->phone }}">{{ $post->user->phone }}</a>
            @endif
            <a href="/anunturi/utilizator/{{ $post->user->name }}" class="text-xs text-white text-md rounded bg-blue-900 hover:bg-blue-500 shadow-md block text-center my-3 mx-1 uppercase pointer">Vezi anunturile lui {{ $post->user->name }}!</a>
        </div>
        <h1 class="text-2xl my-5 pb-3 border-b-2 border-third-900">Cele mai noi anunturi</h1>
                    <div class="container mx-auto">
                    <carousel :per-page="1" autoplay="true">
                        @foreach($posts as $post)
                        <slide>
                        <div class="shadow-md hover:shadow-xl my-8">
                        <div class="ad-price absolute bg-blue-900 mt-10 ml-2 text-white p-1 text-sm">{{ $post->post_type }} </div>
                        <div class="ad-price absolute right-0 bg-third-900 text-white mt-10 p-1 text-xl float-right font-bold"> {{ $post->post_price }} $</div>
                         @if($post->post_promote == 'Anunt promovat')
                            <div class="ad-price bg-yellow-500 text-white p-1 text-lg font-bold text-center">{{ $post->post_promote }}</div>
                        @endif
                    
                           @if(json_decode($promote->images))
                            
                            @foreach(json_decode($promote->images) as $image)
                            
                                <img src="/uploads/posts/{{ $image }}" alt="">
                            @break
                            @endforeach
                        
                        @else
                        
                            
                                <img src="/uploads/posts/{{ $promote->images }}" alt="">

                        @endif
                            <div class="ad-details my-3">
                                <div>
                                    <a class="pl-5 pb-3" href="/anunturi/{{$post->id}}" class="text-xl text-center">{{ str_limit($post->post_title, 30) }}</a>
                                </div>
                            
                            <hr>
                                <div class="block pl-3 text-xs">
                                    <p class="uppercase mb-1"><i class="fa fa-map-marker mr-3"></i>{{ $post->post_location }}</p>
                                    <p class="uppercase mb-1"><i class="fa fa-map-signs mr-3"></i>{{$post->post_type}}</p>
                                    <p class="uppercase"><i class="fa fa-clock mr-3"></i>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="block author-info flex mt-3">
                                    <img class="mr-2" width="30" src="/uploads/avatars/{{ $post->user->avatar }}" >
                                    <p class="text-md uppercase">{{ $post->user->name }}</p>
                                   
                                </div>
                                
                            </div>
                            <a href="/anunturi/{{$post->id}}" class="text-white text-md rounded bg-third-900 hover:bg-third-500 shadow-md block text-center my-3 mx-1 uppercase">Vezi detalii</a>
                        </div>
                        </slide>
                        @endforeach
                        </carousel>
                    </div>
    </div>
</div>

@endsection