@extends('admin.index')

@section('content')
    <div class="container mx-auto my-10">
        <div class="flex">
            <img class="rounded w-20" src="/uploads/avatars/{{ $users->avatar }}" />
            <h1 class="text-xl pt-6 pl-4 text-2xl">Profilul lui {{ $users->name }} </h1>
        </div>



        <div class="container mx-auto my-10 flex">

               @section('admin-sidebar')
                @parent
               @show

            <div class="w-8/12 xs:w12/12 p-5">
            
               <form enctype="multipart/form-data" action="{{ route('users.profile') }}" method="POST">
                    @csrf
                    <label>Schimba imaginea de profil</label>
                    <input type="file" name="avatar">
                    <input class="bg-third-500 text-white uppercase text-md p-2 rounded-sm mt-5 hover:bg-third-900 shadow-lg" type="submit" value="Incarca">
               </form>
            
            </div>
            

        </div>
    </div>
@endsection