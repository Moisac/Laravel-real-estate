@extends('layouts.app')

@section('page_title')
    {{ "Acasa" }}
@endsection

@section('content')

    <div id="home">
    <!--Home main image -->
        <div class="home-main-image bg-black-900 opacity-100 -mt-20">
            <img class="w-full" src="{{ asset('uploads/frontend/home-main.jpg') }}" />

        </div>

        <!-- Home search form -->
        <div id="home-search">
            <form method="POST" action="/anunturi" class="container mx-auto flex py-10" id="search-form">
            @csrf
                <div class="home-search-col1 w-1/4 mx-2 my-3">
                    <select name="postType" class="text-white text-lg w-full rounded bg-blue-900 p-3">
                        <option>De inchiriat</option>
                        <option>De vanzare</option>
                    </select>
                </div>
                <div class="home-search-col1 w-1/4 mx-2 my-3">
                    <select name="buildingType" class="text-white text-lg w-full rounded bg-blue-900 p-3">
                        <option>Garsoniera</option>
                        <option>Apartament</option>
                        <option>Casa</option>
                        <option>Cladire birouri</option>
                        <option>Spatiu comercial</option>
                    </select>
                </div>
                 <div class="home-search-col1 w-1/4 mx-2 my-3">
                    <select name="postLocation" class="text-white text-lg w-full rounded bg-blue-900 p-3">
                        <option>Cluj-Napoca</option>
                        <option>Iasi</option>
                        <option>Bucuresti</option>
                        <option>Oradea</option>
                        <option>Timisoara</option>
                    </select>
                </div>
                 <div class="home-search-col1 w-1/4 mx-2 my-3">
                   <input type="submit" value="Cauta anunturi" class="text-white text-lg w-full rounded bg-third-900 p-3 hover:bg-third-500">
                </div>
               </form> 
            </div>
            <!-- End home search form -->
        </div>
        <!--End home main image -->

        <!--Promoted ads-->
        <div class="home-new-ads my-10 container mx-auto">
            <h1 class="text-2xl mb-8 pb-3 border-b-2 border-third-900 w-1/4">Anunturi promovate</h1>
                <div class="container mx-auto">
                    <carousel :per-page-custom="[[300, 1], [768,2], [1024,5]]">
                        @foreach($promoted as $promote)
                        <slide>    
                        <div id="single-ad-card" class="mx-4 shadow-md hover:shadow-xl" data-aos="fade-left" data-aos-duration="500">
                            <div class="ad-price absolute bg-blue-900 mt-10 ml-2 text-white p-1 text-sm">{{ $promote->post_type }} </div>
                        <div class="ad-price bg-third-900 text-white mt-10 absolute right-0 p-1 text-xl float-right font-bold"> {{ $promote->post_price }} $</div>
                        <div class="ad-price bg-yellow-500 text-white p-1 text-xl font-bold text-center">Anunt promovat</div>
                            
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
                                    <a class="pl-5 pb-3" href="/anunturi/{{$promote->id}}" class="text-xl text-center">{{ str_limit($promote->post_title, 22) }}</a>
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


            <!--Home video section-->
                <div class="container mx-auto my-20">
                    <div class="flex">
                            <div class="w-1/12 bg-third-900 shadow-lg">
                                <p class="text-white text-10xl pt-20 font-extrabold -m-20">01</p>
                            </div>
                        <div class="w-5/12 p-10">
                            <h1 class="text-3xl text-blue-900">Apartamente cu 2,3 sau 4 camere</h1>
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet sem a justo malesuada volutpat ac eu ex. Nam ac molestie massa, id molestie tellus. Quisque sollicitudin ante augue, et mattis ante vestibulum ac. Sed sit amet scelerisque elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse vel risus non augue interdum commodo. </p>
                            <a href="" class="text-white text-lg shadow-xl rounded opacity-75 bg-blue-900 block text-center my-3 mx-2 p-2 uppercase hover:bg-blue-900 hover:opacity-100 hover:shadow-2xl">Cauta anunturi</a>
                        </div>    
                        <div class="w-6/12 mt-20 ml-20">
                            <video class="shadow-2xl" width="600" autoplay="true" muted controls infinite data-aos="zoom-in-up">
                                <source src="uploads/frontend/imobiliare.mp4" >
                            </video>
                        </div>    
                    </div>
                </div>
            <!--End home video section-->


            <!-- Home new ads-->
                <div class="home-new-ads my-10 container mx-auto">
                <h1 class="text-2xl mb-8 pb-3 border-b-2 border-third-900 w-1/4">Cele mai noi anunturi postate</h1>
                    <div class="container mx-auto">
                    <carousel :per-page-custom="[[300, 1], [768,4], [1024,5]]" :autoplay="true">
                        @foreach($posts as $post)
                        <slide>
                        <div id="single-ad-card" class="mx-4 shadow-md hover:shadow-xl" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
                         <div class="ad-price absolute bg-blue-900 mt-10 ml-2 text-white p-1 text-sm">{{ $post->post_type }} </div>
                        <div class="ad-price absolute right-0 bg-third-900 text-white mt-10 p-1 text-xl float-right font-bold"> {{ $post->post_price }} $</div>
                         @if($post->post_promote == 'Anunt promovat')
                            <div class="ad-promoted bg-yellow-500 text-white p-1 text-lg font-bold text-center h-8">{{ $post->post_promote }}</div>
                            @else
                             <div class="ad-promoted bg-white-900 text-white p-1 text-lg font-bold text-center h-8"></div>
                        @endif
                            
                            @if(json_decode($post->images))
                           
                                @foreach(json_decode($post->images) as $image)
                                        
                                    <img src="/uploads/posts/{{ $image }}" alt="">
                                    @break
                                @endforeach
                            
                            @else
                            
                                    <img src="/uploads/posts/{{ $promote->images }}" alt="">
                           
                            @endif
                           



                            <div class="ad-details my-3">
                                <div>
                                    <a class="pl-5 pb-3" href="/anunturi/{{$post->id}}" class="text-xl text-center">{{ str_limit($post->post_title, 22) }}</a>
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
            <!-- End home new ads-->

             <!--Home icons section-->
                <div class="container mx-auto my-20 px-8">
                    <div class="flex">
                        <div class="w-11/12">

                            <div class="flex pt-10 justify-content-center">

                                <div class="single-icons w-1/4 hover:shadow-lg">
                                    <div class="w-32 p-5 border-4 border-third-900 rounded-full">
                                        <img class="w-32" src="uploads/frontend/account.png" alt="">
                                    </div>
                                    <h3 class="text-md uppercase my-3">Iti faci un cont</h3>
                                    <a href="/register" class="hidden  text-white text-md rounded bg-third-900 block text-center my-3 mx-1 uppercase hover:block">Cont nou</a>
                                </div>

                                <div class="single-icons w-1/4">
                                    <div class="w-32 p-5 border-4 border-third-900 rounded-full">
                                        <img class="w-32" src="uploads/frontend/anunt.png" alt="">
                                    </div>
                                    <h3 class="text-md uppercase my-3">Adaugi anunt gratuit</h3>
                                </div>

                                <div class="single-icons w-1/4">
                                    <div class="w-32 p-5 border-4 border-third-900 rounded-full">
                                        <img class="w-32" src="uploads/frontend/premium.png" alt="">
                                    </div>
                                    <h3 class="text-md uppercase my-3">Achizitionezi un pachet</h3>
                                </div>

                                <div class="single-icons w-1/4">
                                    <div class="w-32 p-5 border-4 border-third-900 rounded-full">
                                        <img class="w-32" src="uploads/frontend/credit-card.png" alt="">
                                    </div>
                                    <h3 class="text-md uppercase my-3">Vinzi/Inchiriezi mai repede</h3>
                                </div>
                            </div>
                            <div class="contact-cta mt-32">
                                        <div class="row flex p-10">
                                        <div class="w-1/2 text-center">
                                            <h3 class="text-xl text-white uppercase">Contacteaza-ne!</h3>
                                        </div>
                                        <div class="w-1/2 text-center">
                                            <a href="/contact" class="text-white border-2 border-third-900 py-2 px-5 uppercase hover:border-blue-900">Contact</a>
                                        </div>
                                        </div>
                                </div>
            
                        </div>
                   
                    <div class="w-1/12 bg-third-900 shadow-lg">
                            <p class="text-white text-10xl py-20 font-extrabold -ml-20">02</p>
                        </div>   
                    </div>
                </div>
            <!--End home icons section-->

    </div>
@stop
