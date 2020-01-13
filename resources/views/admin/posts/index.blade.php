@extends('admin.index')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl pt-6 pl-4">Anunturile tale</h1>

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
                <a class="float-right ml-10 bg-third-500 uppercase text-white text-bold p-2 shadow-lg rounded-sm hover:bg-third-900" href="{{route('posts.create')}}"><i class="fa fa-plus mr-2"></i>Adauga anunt</a>

                <table class="py-4 px-5 border-b-2 border-gray-800">
                    <tr>
                        <th>Titlu</th>
                        <th>Descriere</th>
                        <th>Tip</th>
                        <th>Pret</th>
                        <th>Tip cladire</th>
                        <th>Locatie</th>
                        <th>Status</th>
                        <th>Administrare</th>
                    </tr>
                    @if(Auth::user()->posts())
                    @foreach($posts as $post)
                    <tr class="py-4 px-5 border-b-2 border-gray-800">
                        <td class="">{{ str_limit($post->post_title, 20) }}</td>
                        <td class="">{{ str_limit($post->post_content, 12) }}</td>
                        <td class="">{{ $post->post_type }}</td>
                        <td class="">{{ $post->post_price }}</td>
                        <td class="">{{ $post->building_type }}</td>
                        <td class="">{{ $post->post_location }}</td>
                        <td>
                             @if($post->post_promote == 'Anunt promovat')
                                <div class="ad-price bg-yellow-500 text-white p-1 text-sm font-bold text-center"><i class="fa fa-star mr-3 mt-1"></i>Promovat</div>
                                @else
                                <div class="ad-price bg-green-500 text-white p-1 text-sm font-bold text-center flex"><i class="fa fa-plus mr-3 mt-1"></i>Promoveaza</div>
                            @endif
                        </td>
                        <td class="flex mt-4 ml-5"><a href="posts/{{ $post->id }}/edit" class="bg-third-900 text-white mr-2 px-2 py-1 rounded" ><i class="fa fa-edit"></i></a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf    
                            @method('DELETE')
                            <button type="submit" class="bg-blue-900 py-1 px-2 ml-2 rounded"><i class="fa fa-trash text-white"></i></button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                    @endif
                </table>
        </div>
    </div>
@endsection