<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAnalysis()
    {
        /*$questions = Question::where('id', 1)->first()->titel;
 
        return view('pages.analysis')->with('fragenTitel', $questions);*/
        
        $questions = Question::all();
        return view('pages.analysis')->with('questions', $questions);
    }
    
    public function index()
    {
        /*$questions = Question::where('id', 1)->first()->titel;
 
        return view('pages.analysis')->with('fragenTitel', $questions);*/
        
        $questions = Question::all();
        return view('admin.home')->with('questions', $questions);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titel' => 'required|unique:questions|max:60',
            'mild' => 'min:0|max:100|required|integer',
            'suess' => 'min:0|max:100|required|integer',
            'wuerzig' => 'min:0|max:100|required|integer',
            'fruchtig' => 'min:0|max:100|required|integer'
        ]);
        
        Question::create($request->all());
        
        return redirect()->route('admin.index');
    }
    
    public function setNew(Request $request)
    {
        $this->validate($request, [
            'titel' => 'required|unique:questions|max:60',
            'mild' => 'min:0|max:100|required|integer',
            'suess' => 'min:0|max:100|required|integer',
            'wuerzig' => 'min:0|max:100|required|integer',
            'fruchtig' => 'min:0|max:100|required|integer'
        ]);
        
        $newQuestion = Question::create($request->all());
        
        return response()->json($newQuestion);
    }
    
    public function editOld(Request $request)
    {
        
        $this->validate($request, [
            'titel' => 'required|unique:questions|max:60',
            'mild' => 'min:0|max:100|required|integer',
            'suess' => 'min:0|max:100|required|integer',
            'wuerzig' => 'min:0|max:100|required|integer',
            'fruchtig' => 'min:0|max:100|required|integer'
        ]);
        
        $question = Question::where('id', $request['id'])->first();
        
        $question->fill($request->all())->save();
        
        return response()->json($question);
    }
    
    public function deleteOld(Request $request)
    {
        
        $question = Question::where('id', $request['id'])->first();
        
        $question->delete();
        
        return response()->json($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::where('id', $id)->first();
        return view('admin.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $question = Question::where('id', $id)->first();
        
        $this->validate($request, [
            'titel' => 'required|unique:questions|max:60',
            'mild' => 'min:0|max:100|required|integer',
            'suess' => 'min:0|max:100|required|integer',
            'wuerzig' => 'min:0|max:100|required|integer',
            'fruchtig' => 'min:0|max:100|required|integer'
        ]);
        
        $question->fill($request->all())->save();
        
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::where('id', $id)->first();
        
        $question->delete();

        return redirect()->route('admin.index');
    }
}
