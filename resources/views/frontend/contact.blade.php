@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
    <div class="row flex mb-20">
        <div class="md:w-1/2 mt-10">
           <form method="POST" action="{{ url('/contact') }}" >
                @csrf

                <div class="form-group">
                    <input type="text" name="name" class="my-2 text-lg w-full border border-blue-900 rounded-sm p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Nume" />
                </div>       

                <div class="form-group">
                    <input type="text" name="email" class="my-2 text-lg w-full border border-blue-900 rounded-sm p-3 bg-white-500 outline-none focus:border-third-900" placeholder="E-mail" />
                </div> 
                
                <div class="form-group">
                    <input type="text" name="phone" class="my-2 text-lg w-full border border-blue-900 rounded-sm p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Telefon" />
                </div> 

                <div class="form-group">
                    <textarea name="message" class="my-2 text-lg w-full border border-blue-900 rounded-sm p-3 bg-white-500 outline-none focus:border-third-900" placeholder="Mesajul tau"></textarea>
                </div> 

                <div class="form-group">
                    <button type="submit" class="bg-third-500 text-white uppercase text-md p-2 rounded-sm mt-5 hover:bg-third-900 shadow-lg w-full radius-5 shadow-sm hover:shadow-lg">Trimite mesaj</button>
                </div>  

            </form>
            <div>
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
        
        </div>

        <div class="md:w-1/2 mt-10">
        <iframe class="w-full h-full p-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d174852.23584788595!2d23.476429303457422!3d46.783300193014064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47490c1f916c0b8b%3A0xbbc601c331f148b!2sCluj-Napoca!5e0!3m2!1sro!2sro!4v1570645179421!5m2!1sro!2sro" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
    </div>
    </div>

@stop