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
        for ($i = 0; $i < count($questions); $i++) {
            $results[$i] = $request->input('rd' . $questions[$i]->id);
        }
        return $results;
    }
    
    public function extractResults(Request $request){
        $resultsRaw = $this->getResults($request);
        $resultsExtracted = array();
        
        for ($i = 0; $i < count($resultsRaw); $i++) {
            $resultShortened = strstr($resultsRaw[$i], '.');
            $resultsExtracted[$i] = substr($resultShortened, -1);
        }
        return $resultsExtracted;
    }
    
    public function calculate(Request $request)
    {
        $questions = Question::all();
        //Die Ergebnisse als Zahlen (1,2,3) werden aus der Funktion extractResults() geholt.
        $resultsNum = $this->extractResults($request);
        
        //hier später durch temp_users ersetzen
        $taste = array();
        
        //mild
        $taste[0] = 50;
        
        //suess
        $taste[1] = 50;
        
        //wuerzig
        $taste[2] = 50;
        
        //fruchtig
        $taste[3] = 50;
        
        //Die einzelnen Geschmackswerte jeder Flasche werden aufaddiert
        for ($i = 0; $i < count($resultsNum); $i++) {
            if($resultsNum[$i] == 1){
                $taste[0] = ($taste[0] + $questions[$i]->mild)/2;
                $taste[1] = ($taste[1] + $questions[$i]->suess)/2;
                $taste[2] = ($taste[2] + $questions[$i]->wuerzig)/2;
                $taste[3] = ($taste[3] + $questions[$i]->fruchtig)/2;
            }
            else if($resultsNum[$i] == 2){
            }
            else if($resultsNum[$i] == 3){
                $taste[0] = $taste[0] - $questions[$i]->mild + ($questions[$i]->mild/2);
                $taste[1] = $taste[1] - $questions[$i]->suess + ($questions[$i]->suess/2);
                $taste[2] = $taste[2] - $questions[$i]->wuerzig + ($questions[$i]->wuerzig/2);
                $taste[3] = $taste[3] - $questions[$i]->fruchtig + ($questions[$i]->fruchtig/2);
            }
        }
        
        //Der Durchschnitt der jeweiligen Werte wird gebildet
        $tasteCalc = array();
        
        for ($i = 0; $i < count($taste); $i++) {
            if($taste[$i] >= 0){
                $tasteCalc[$i] = $taste[$i];
            }
            else{
                $tasteCalc[$i] = 0;
            }
        }
        
        
        return view('pages.result')->with('mild', $tasteCalc[0])->with('suess', $tasteCalc[1])->with('wuerzig', $tasteCalc[2])->with('fruchtig', $tasteCalc[3]);
    }
    
    /*public function calculateAverage()
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
    }*/
}
