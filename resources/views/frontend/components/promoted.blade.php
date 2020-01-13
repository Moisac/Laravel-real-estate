<!--Promoted ads-->
        <div class="home-new-ads ml-10">
            <h1 class="text-2xl mb-8 pb-3 border-b-2 border-third-900 w-1/4">Anunturi promovate</h1>
                <div class="">
                <carousel :per-page-custom="[[300,1], [768,5], [1024,5]]" :autoPlay="true">
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
                                <a class="pl-5 pb-3" href="/anunturi/{{$promote->id}}" class="text-xl text-center">{{ str_limit($promote->post_title, 25) }}</a>
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