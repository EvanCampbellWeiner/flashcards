
 @extends('layouts.app')

 @section('content')
 {{-- Jumbotron code taken from bootstrap documentation --}}
 <div class="container">
    <div class="jumbotron">
        <h1 class="display-4 text-danger">Netflix n Flashcards</h1>
        <p class="lead">This is a simple application that allows you to make, save, and use a series of flashcards.</p>
        <hr class="my-4">
        <p>In addition this system works in partnership with a chrome extension to allow flashcard practice on any website.</p>
        {{-- //TODO Create a tutorial to learn more of how to do the flashcard practice --}}
        <a class="btn btn-danger btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
@endsection