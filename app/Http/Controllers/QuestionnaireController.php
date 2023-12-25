<?php

namespace App\Http\Controllers;

use App\Models\MQuestionnaire;
use App\Models\MQuestionnaireOption;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaire = MQuestionnaire::all();
        $option = MQuestionnaireOption::all();
        
        return view('questionnaire', ['questionnaire' => $questionnaire, 'option' => $option]);
        
    }
}
