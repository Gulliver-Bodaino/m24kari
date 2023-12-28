<?php

namespace App\Http\Controllers;

use App\Models\MQuestionnaire;
use App\Models\MQuestionnaireOption;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $mQuestionnaire = MQuestionnaire::all();
        $mQuestionnaireOption = MQuestionnaireOption::all();
        
        return view('questionnaire', ['mQuestionnaire' => $mQuestionnaire, 'mQuestionnaireOption' => $mQuestionnaireOption]);
        
    }
}
