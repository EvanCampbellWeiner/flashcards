@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            Flashcards 
                        </div>
                        <div class="col-lg-4">   
                            <create-flashcard-component v-bind:set="{{ $set }}"></create-flashcard-component>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <deck-component v-bind:set="{{ $set }}"></deck-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection