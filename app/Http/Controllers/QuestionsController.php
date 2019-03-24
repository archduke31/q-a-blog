<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::with('user')->latest()->paginate(5);
        return view('questions.index',compact('questions',$questions));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question=new Question();

        return view('questions.create',compact('question'));
    }


    public function store(QuestionRequest $questionRequest)
    {
        $questionRequest->user()->questions()->create($questionRequest->only('title','body'));

        return redirect()->route('questions.index')->with('success','Your question has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $question->increment('views');
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if(\Gate::denies('update-delete-question',$question)){
            abort(403,"Access Denied");
        }
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        if(\Gate::denies('update-delete-question',$question)){
            abort(403,"Access Denied");
        }
        $question->update($request->only('title','body'));
        return redirect()->route('questions.index')->with('success','Your question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if(\Gate::denies('update-delete-question',$question)){
            abort(403,"Access Denied");
        }
        $question->delete();
        return redirect()->route('questions.index')->with('success','Your question has been deleted');
    }
}
