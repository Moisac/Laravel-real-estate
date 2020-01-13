@extends('admin.index')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl pt-6 pl-4">Lista utilizatori</h1>

        <div class="container mx-auto my-10 flex">

               @section('admin-sidebar')
                @parent
               @show

            <div class="w-12/12 xs:w12/12 p-5">
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div>
            @endif
                <a class="float-right ml-10 bg-third-500 uppercase text-white text-bold p-2 shadow-lg rounded-sm hover:bg-third-900" href="{{route('users.create')}}"><i class="fa fa-plus mr-2"></i>Adauga utilizator</a>
                @foreach($users as $user)
                <div class="flex justify-between py-4 px-5 border-b-2 border-gray-800">
                    <img class="rounded-full w-8 mr-3" src="/uploads/avatars/{{ $user->avatar }}" />
                    <div class="mx-5">{{ $user->name }} @foreach($user->roles as $role) <sup class="bg-red-500 rounded px-1 text-white text-xs">{{ $role->name }}</sup> @endforeach</div>
                    <div>{{$user->phone}}</div>
                    <div class="mx-5">{{ $user->created_at->diffForHumans() }}</div>
                    <div class="flex">
                        <a href="users/{{ $user->id }}/edit" class="bg-blue-900 text-white mr-2 px-2 py-1 rounded" ><i class="fa fa-edit"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                        @if($user->id != Auth::user()->id)
                            <button type="submit" class="bg-third-900 py-1 px-2 ml-2 rounded"><i class="fa fa-trash text-white"></i></button>
                        @endif
                        </form>
                        @if($user->id != Auth::user()->id)
                            @if($user->hasRole('Admin'))
                        <a class="bg-green-700 text-white px-2 py-1 rounded ml-3" href="/admin/remove-admin/{{$user->id}}">Admin</a>

                        @else
                            <a href="/admin/give-admin/{{$user->id}}" class="bg-red-700 text-white py-1 px-2 rounded ml-3">User</a>

                        @endif
                        @endif

                        @if($user->id != Auth::user()->id)
                            @if($user->hasRole('Premium'))
                        <a class="bg-blue-900 text-white px-2 py-1 rounded ml-3" href="/admin/remove-premium/{{$user->id}}">Premium</a>

                        @else
                            <a href="/admin/give-premium/{{$user->id}}" class="bg-yellow-500 text-white py-1 px-2 rounded ml-3">User</a>

                        @endif

                    @endif    
                    </div>
                </div>
            @endforeach
            <div class="container mx-auto">{{ $users->links() }}</div>
            </div>
            

        </div>
    </div>
@endsection