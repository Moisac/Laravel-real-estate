@extends('admin.index')

@section('content')

    <div class="my-xl add-user-section">
    <h1 class="text-lg font-semibold my-8">Modifica anunt</h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="flex">
        <div class="w-1/2 mx-10">
            <div class="form-group">
                <input type="text" name="post_title" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" value="{{ $post->post_title }}" />
            </div> 

            <div class="form-group">
                <input type="number" name="post_price" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" value="{{ $post->post_price }}" />
            </div>      

            <div class="form-group" >
                <textarea class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_content" rows="4" cols="50">
                {{$post->post_content }}
                </textarea>
            </div> 

            <div class="form-group">
                <select class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_location" value="{{ $post->post_location }}">
                    <option {{old('post_location',$post->post_location)=="Cluj-Napoca"? 'selected':''}}>Cluj-Napoca</option>
                    <option {{old('post_location',$post->post_location)=="Iasi"? 'selected':''}}>Iasi</option>
                    <option {{old('post_location',$post->post_location)=="Bucuresti"? 'selected':''}}>Bucuresti</option>
                    <option {{old('post_location',$post->post_location)=="Oradea"? 'selected':''}}>Oradea</option>
                    <option {{old('post_location',$post->post_location)=="Timisoara"? 'selected':''}}>Timisoara</option>
                </select>
            </div> 

            <div class="form-group">
                <select class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_type" >
                    <option {{old('post_type',$post->post_type)=="De inchiriat"? 'selected':''}}>De inchiriat</option>
                    <option {{old('post_type',$post->post_type)=="De vanzare"? 'selected':''}}>De vanzare</option>
                </select>
            </div>

            <div class="form-group">
                <input type="number" name="post_year" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" value="{{ $post->post_year }}" />
            </div>

            <div class="form-group">
            <button type="submit" class="bg-third-500 text-white uppercase text-md p-2 rounded-sm mt-5 hover:bg-third-900 shadow-lg">Modifica anunt</button>
        </div>  
        </div>


        <div class="w-1/2 mx-10">

            <div class="form-group">
                <select name="post_floor" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option {{old('post_floor',$post->post_floor)=="Parter"? 'selected':''}}>Parter</option>
                    <option {{old('post_floor',$post->post_floor)=="1/10"? 'selected':''}}>1/10</option>
                    <option {{old('post_floor',$post->post_floor)=="2/10"? 'selected':''}}>2/10</option>
                    <option {{old('post_floor',$post->post_floor)=="3/10"? 'selected':''}}>3/10</option>
                    <option {{old('post_floor',$post->post_floor)=="4/10"? 'selected':''}}>4/10</option>
                    <option {{old('post_floor',$post->post_floor)=="5/10"? 'selected':''}}>5/10</option>
                    <option {{old('post_floor',$post->post_floor)=="6/10"? 'selected':''}}>6/10</option>
                    <option {{old('post_floor',$post->post_floor)=="7/10"? 'selected':''}}>7/10</option>
                    <option {{old('post_floor',$post->post_floor)=="8/10"? 'selected':''}}>8/10</option>
                    <option {{old('post_floor',$post->post_floor)=="9/10"? 'selected':''}}>9/10</option>
                    <option {{old('post_floor',$post->post_floor)=="10/10"? 'selected':''}}>10/10</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_therm" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option {{old('post_therm',$post->post_therm)=="Bloc izolat termic"? 'selected':''}}>Bloc izolat termic</option>
                    <option {{old('post_therm',$post->post_therm)=="Bloc neizolat termic"? 'selected':''}}>Bloc neizolat termic</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_furnished" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option {{old('post_furnished',$post->post_furnished)=="Mobilat"? 'selected':''}}>Mobilat</option>
                    <option {{old('post_furnished',$post->post_furnished)=="Nemobilat"? 'selected':''}}>Nemobilat</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_features" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option {{old('post_features',$post->post_features)=="Aer conditionat"? 'selected':''}}>Aer conditionat</option>
                    <option {{old('post_features',$post->post_features)=="Masina de spalat"? 'selected':''}}>Masina de spalat vase</option>
                </select>
            </div>

            <div class="form-group">
                <select name="building_type" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900">
                    <option {{old('building_type',$post->building_type)=="Garsoniera"? 'selected':''}}>Garsoniera</option>
                    <option {{old('building_type',$post->building_type)=="Apartament"? 'selected':''}}>Apartament</option>
                    <option {{old('building_type',$post->building_type)=="Casa"? 'selected':''}}>Casa</option>
                    <option {{old('building_type',$post->building_type)=="Cladire birouri"? 'selected':''}}>Cladire birouri</option>
                    <option {{old('building_type',$post->building_type)=="Spatiu comercial"? 'selected':''}}>Spatiu comercial</option>
                </select>
            </div> 

            
            <div>
                <select name="post_promote" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option {{old('post_promote',$post->post_promote)=="Anunt simplu"? 'selected':''}}>Anunt simplu</option>
                    @if(Auth::user()->hasRole('premium'))
                    <option {{old('post_promote',$post->post_promote)=="Anunt promovat"? 'selected':''}}>Anunt promovat</option>
                    @endif
                </select>
            </div>

            @if(json_decode($post->images))
                            
                                @foreach(json_decode($post->images) as $image)
                                
                                    <img width="100" src="/uploads/posts/{{ $image }}" alt="">
                                @break
                                @endforeach
                            
                            @else
                           
                                    <img width="100" src="/uploads/posts/{{ $post->images }}" alt="">
                             
                            @endif

                <div>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
        </div>

    </form>


    @if(count($errors) > 0)

        <div class="alert alert-danger">

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>    
        </div>

    @endif
</div>

@endsection