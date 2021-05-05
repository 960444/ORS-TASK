<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\DB;


class QuestionnaireController extends Controller {

    /**
     * Fetch question data and pass it to the view
     * 
     * @return send the questionnaire view with a set of questions
     */
    public function listQuestions() {
        //fetch question data from the API
        $questions = Http::get('https://www.ors.org.uk/tools/questions/questions.json')->json();
        return view('questionnaire', ['questions' => $questions]);
    }

    /**
     * Store users answers in the database
     * 
     * @return redirects the user to the results view
     */
    public function storeAnswers(Request $request) {
        $questionnaire = new Questionnaire();
        //get request data
        $data = $request->except('_token');
        //set questions and answers
        $questionnaire->questions = array_keys($data);
        $questionnaire->answers =  array_values($data);
        //store the questionnaire
        $questionnaire->save(); 
        return redirect('/results');
    }

    /**
     * Retrieve answers from the database
     * 
     * @return send the results view with the answers from the db
     */
    public function listResults() {
        //Retrieve all rows from the database
        //$results = DB::table('questionnaires')->get();

        //Retrieve a row from the database
        $results = DB::table('questionnaires')->first();
        return view('results', ['results' => $results]);
    }
}
