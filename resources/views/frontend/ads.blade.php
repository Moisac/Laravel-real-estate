@extends('layouts.app')


@section('content')

<div class="mx-2 mb-20">
    @include('frontend.components.promoted')

</div>

<div id="ads" class="container mx-auto flex">
    <div class="w-2/12">
        <form method="POST" action="/anunturi" class="container mx-auto py-10">
            @csrf
            <div class="home-search-col1 my-10 mx-2">
                <select name="postType" class="text-white text-lg w-full rounded bg-blue-900 p-1">
                    <option>Alege tip tranzactie</option>
                    <option selected>De inchiriat</option>
                    <option>De vanzare</option>
                </select>
            </div>
            <div class="home-search-col1 my-10 mx-2">
                <select name="buildingType" class="text-white text-lg w-full rounded bg-blue-900 p-1">
                    <option>Alege tip imobil</option>
                    <option selected>Garsoniera</option>
                    <option>Apartament</option>
                    <option>Casa</option>
                    <option>Cladire birouri</option>
                    <option>Spatiu comercial</option>
                </select>
            </div>
                <div class="home-search-col1 my-10 mx-2">
                <select name="postLocation" class="text-white text-lg w-full rounded bg-blue-900 p-1">
                    <option>Alege locatie</option>
                    <option>Cluj-Napoca</option>
                    <option>Iasi</option>
                    <option>Bucuresti</option>
                    <option>Oradea</option>
                    <option>Timisoara</option>
                </select>
            </div>
                <div class="home-search-col1 my-10 mx-2">
                <input type="submit" value="Cauta anunturi" class="text-white text-lg w-full rounded bg-third-900 p-1 hover:bg-third-500">
            </div>
            </form> 
        </div>

    <div class="w-10/12 flex flex-wrap">

         @foreach($posts as $post)
         <div class="w-1/5 mx-4 shadow-md hover:shadow-xl my-5">
              <div class="ad-price absolute bg-blue-900 mt-10 text-white p-1 text-sm">{{ $post->post_type }} </div>
                <div class="ad-price absolute bg-third-900 text-white mt-20 p-1 text-xl font-bold"> {{ $post->post_price }} $</div>
             @if($post->post_promote == 'Anunt promovat')
                <div class="ad-price bg-yellow-500 text-white p-1 text-lg font-bold text-center h-8">{{ $post->post_promote }}</div>
                @else
                <div class="ad-promoted bg-white-900 text-white p-1 text-lg font-bold text-center h-8"></div>
            @endif


            @if(json_decode($post->images))
                            
                @foreach(json_decode($post->images) as $image)
                
                    <img src="/uploads/posts/{{ $image }}" alt="">
                @break
                @endforeach
            
            @else
            
                
                    <img width="150" height="150" class="w-48" src="/uploads/posts/{{ $post->images }}" alt="">

            @endif




                <div class="ad-details my-3">
                    <div>
                        <a class="pl-5 pb-3" href="/anunturi/{{$post->id}}" class="text-md text-center">{{ str_limit($post->post_title,25) }}</a>
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
        @endforeach
    </div>
</div>

@endsection