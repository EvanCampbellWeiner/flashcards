<?php

namespace App\Http\Controllers;

use App\Flashcard;
use Illuminate\Http\Request;
use App\Set;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateFlashcard;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cards = DB::table('flashcards')->where('setID', $id)->get();
        return $cards;
        // return $set->cards;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'setID' => 'required'
        ]);
        $Flashcard = new Flashcard;
        $Flashcard->question = $validatedData['question'];
        $Flashcard->answer = $validatedData['answer'];
        $Flashcard->setID = $validatedData['setID'];
        $Flashcard->save();//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Flashcard $flashcard)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flashcard $flashcard)
    {
        $validated = $request->validate([
            'Question' => 'required',
            'Answer' => 'required',

        ]);
        $flashcard->Question = $validated['Question'];
        $flashcard->Answer = $validated['Answer'];
        $flashcard->save();
        return $flashcard;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flashcard $flashcard)
    {
        $flashcard->delete();
    }
}
