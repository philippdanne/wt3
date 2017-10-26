<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class TempUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::where('id', 1)->first()->titel;
 
        return view('pages.analysis')->with('fragenTitel', $questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getResults(Request $request)
    {
        $questions = Question::all();
        $results = array();
        foreach ($questions as $question) {
            $results[$question->id] = $request->input('rd' . $question->id);
        }
        return $results;
    }
    
    public function extractResults(Request $request){
        $resultsRaw = $this->getResults($request);
        $resultsExtracted = array();
        for ($i = 1; $i <= count($resultsRaw); $i++) {
            $resultShortened = strstr($resultsRaw[$i], '.');
            $resultsExtracted[$i] = substr($resultShortened, -1);
        }
        return $resultsExtracted;
    }
    
    public function calculate(Request $request)
    {
        //Die Ergebnisse als Zahlen (1,2,3) werden aus der Funktion extractResults() geholt.
        $resultsNum = $this->extractResults($request);
        
        //hier später durch temp_users ersetzen
        $taste = array();
        
        //mild
        $taste[1] = 0;
        
        //suess
        $taste[2] = 0;
        
        //wuerzig
        $taste[3] = 0;
        
        //fruchtig
        $taste[4] = 0;
        
        for ($i = 1; $i <= count($resultsNum); $i++) {
            if($resultsNum[$i] == 1){
                $taste[1] += Question::find($i)->mild;
                $taste[2] += Question::find($i)->suess;
                $taste[3] += Question::find($i)->wuerzig;
                $taste[4] += Question::find($i)->fruchtig;
            }
            else if($resultsNum[$i] == 2){
            }
            else if($resultsNum[$i] == 3){
                $taste[1] -= Question::find($i)->mild;
                $taste[2] -= Question::find($i)->suess;
                $taste[3] -= Question::find($i)->wuerzig;
                $taste[4] -= Question::find($i)->fruchtig;
            }
        }
        return $taste;
    }
    
    public function calculateForView(Request $request)
    {
        $tasteRaw = $this->calculate($request);
        $tasteCalc = array();
        $highestArrayValue = max($tasteRaw);
        
        for ($i = 1; $i <= count($tasteRaw); $i++) {
            if($tasteRaw[$i] >= 0){
                $tasteCalc[$i] = ($tasteRaw[$i] / $highestArrayValue)*100;   
            }
            else{
                $tasteCalc[$i] = 0;
            }
        }
        
        return view('pages.result')->with('mild', $tasteCalc[1])->with('suess', $tasteCalc[2])->with('wuerzig', $tasteCalc[3])->with('fruchtig', $tasteCalc[4]);
    }
}
