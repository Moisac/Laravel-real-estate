@extends('admin.index')

@section('content')

    <div class="my-xl add-user-section">
    <h1 class="text-xl pt-6 pl-4">Editeaza informatiile lui {{$users->name}}</h1>

    <div class="row">
        <div class="w-2/4">
            <form method="POST" action="{{ route('users.update', $users->id) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <input type="text" name="name" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="User name" value="{{ $users->name }}"/>
                </div>       

                <div class="form-group">
                    <input type="text" name="email" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="E-mail" value="{{ $users->email }}"/>
                </div> 

                <div class="form-group">
                    <input type="text" name="phone" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Telefon" value="{{ $users->phone }}"/>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="text-lg w-full border-b-2 border-black p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Password" value="{{ $users->password }}"/>
                </div> 

                <div class="form-group">
                    <button type="submit" class="bg-third-500 text-white uppercase text-md p-2 rounded-sm mt-5 hover:bg-third-900 shadow-lg">Editeaza date cont</button>
                </div>  

            </form>
        </div>
    </div>
    


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