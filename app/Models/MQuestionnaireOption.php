<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MQuestionnaireOption extends Model
{
    //use HasFactory;
    protected $table = 'm_questionnaire_options';
    protected $primaryKey = 'm_questionnaire_question_id';
}