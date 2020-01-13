@extends('admin.index')

@section('content')

    <div class="container mx-auto">
    <h1 class="text-lg font-semibold my-8">Adauga informatiile anuntului tau!</h1>
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="flex">
        <div class="w-1/2 mx-10">
            <div class="form-group">
                <input type="text" name="post_title" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Titlu anunt" />
            </div> 

            <div class="form-group">
                <input type="number" name="post_price" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Pret imobil" />
            </div>      

            <div class="form-group" >
                <textarea class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_content" rows="4" cols="50" placeholder="Adauga o descriere anuntului...">
                </textarea>
            </div> 

            <div class="form-group">
                <select class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_location" class="form-control">
                    <option>Cluj-Napoca</option>
                    <option>Iasi</option>
                    <option>Bucuresti</option>
                    <option>Oradea</option>
                    <option>Timisoara</option>
                </select>
            </div> 

            <div class="form-group">
                <select class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" name="post_type" class="form-control">
                    <option>De inchiriat</option>
                    <option>De vanzare</option>
                </select>
            </div>

            <div class="form-group">
                <input type="number" name="post_year" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="An costructie" />
            </div>

            <div class="form-group">
            <button type="submit" class="bg-third-500 text-white uppercase text-md p-2 rounded-sm mt-5 hover:bg-third-900 shadow-lg">Adauga anunt</button>
        </div>  
        </div>


        <div class="w-1/2 mx-10">

            <div class="form-group">
                <select name="post_floor" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option>Alege etaj</option>
                    <option>Parter</option>
                    <option>1/10</option>
                    <option>2/10</option>
                    <option>3/10</option>
                    <option>4/10</option>
                    <option>5/10</option>
                    <option>6/10</option>
                    <option>7/10</option>
                    <option>8/10</option>
                    <option>9/10</option>
                    <option>10/10</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_therm" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option>Alege facilitati</option>
                    <option>Bloc izolat termic</option>
                    <option>Bloc neizolat termic</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_furnished" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option>Mobilat</option>
                    <option>Nemobilat</option>
                </select>
            </div>

            <div class="form-group">
                <select name="post_features" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option>Alege dotari</option>
                    <option>Aer conditionat</option>
                    <option>Masina de spalat vase</option>
                </select>
            </div>

            <div class="form-group">
                <select name="building_type" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900">
                    <option>Garsoniera</option>
                    <option>Apartament</option>
                    <option>Casa</option>
                    <option>Cladire birouri</option>
                    <option>Spatiu comercial</option>
                </select>
            </div> 

           
            <div>
                <select name="post_promote" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" >
                    <option>Anunt simplu</option>
                     @if(Auth::user()->hasRole('premium'))
                    <option>Anunt promovat</option>
                    @endif
                </select>
            </div>
            

                <div>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
        </div>
    </form>


    @if(count($errors) > 0)

        <div>

        <ul class="bg-red-300 text-md">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>    
        </div>

    @endif
</div>

@endsection