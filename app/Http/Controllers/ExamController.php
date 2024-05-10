<?php

namespace App\Http\Controllers;
use App\Models\QuizModel;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    function quizes()
    {
        return view('exam/quizes');
    }
    function addQuizes(Request $request)
    {
      

        // $model = new QuizModel();
        // $model -> Qnum = $data->Qnum;
        // $model -> Question = $data->Question;
        // $model -> Aa = $data->Aa;
        // $model -> Ab = $data->Ab;
        // $model -> Ac = $data->Ac;
        // $model -> Ad = $data->Ad;
        // $model -> Akey = $data->Akey;
        // $model -> department_name = "Enginnering";
        // $model->save();
        return dd($jsonData);
    }
    function quizJson()
    {
        $data = QuizModel::all();
        return $data;
    }
    function term()
    {
        return view('exam/term');
    }
    function finals()
    {
        return view('exam/finals');
    }
}
