@extends('layouts.app')

@section('title', 'Framework | Yatzy')


@section('content')

    <h1> Yatzy </h1>
        
    <p>Du kan välja spara/behålla dina tärningar, sparar du värdet på tärningar får du börja med 3 slag igen. Du har 3 slag och 5 tärningar. 
        Du kan behålla tärningar och försätta kasta, du har rätt till högst 3 tärningskast, du kan spara de behållande tärningarna efter tredje slaget eller innan, du väljer.
    </p>


    <form method="POST" action="{{ route('play-yatzy') }}">
        @csrf

        <p> <input type="submit" name="submit" value="Kasta"></p>
        <p> Antal tärningskast: {{ Session::get('yatzy.number') }}</p>
        <p><a href="{{ route('destroy-yatzy') }}"> Nollställ poäng </a> </p>


        @if (Session::has('yatzy.values'))

            <p class="dice-utf8">
                @foreach (Session::get('yatzy.values') as $item)
                    <i class="dice-{{$item}}"></i>
                @endforeach
            </p>

            <select name="select">
                @foreach (Session::get('yatzy.values') as $item)
                    <option name= {{ $item }}  value={{ $item }}> {{ $item }}
                @endforeach
            <select> 
            <input type="submit" name="submit" value="Behålla">


            @if (Session::has('yatzy.keepDice'))
                <p class="dice-utf8">
                    @foreach (Session::get('yatzy.keepDice') as $item)
                        <i class="dice-{{$item}}"></i>
                    @endforeach
                </p>

            @endif

            <select name="values">
                @foreach (Session::get('yatzy.getResult') as $key => $value)
                    <option name= {{ $value }} value={{ $key }}>{{ $key + 1 }} : {{ $value }}
                        
                @endforeach
            <select>

            <input type="submit" name="submit" value="Spara">

        @endif

    </form> 


    @include('yatzy/yatzy_protokoll')

@endsection