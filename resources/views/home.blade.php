@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            Your Sets of Flashcards 
                        </div>
                        <div class="col-lg-4">   
                            <Create-Set-Component v-bind:user="{{ json_encode(auth()->user()) }}"></Create-Set-Component>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <set-component></set-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
