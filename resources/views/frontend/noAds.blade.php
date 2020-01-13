@extends('layouts.app')


@section('content')

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

    <div class="w-10/12 flex flex-wrap w-full">
        <h1 class="text-xl mx-auto mt-8">Nu exista anunturi pentru cautarea ta!</h1>
    </div>
</div>

@endsection