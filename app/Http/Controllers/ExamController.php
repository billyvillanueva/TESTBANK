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
    function deleteQuiz($id)
    {
        $data = QuizModel::find($id);
        $data -> delete();
        return redirect()->back();
    }
    function addQuiz(Request $request)
    {
        $model = new QuizModel();
        $model -> Question = $request->Question;
        $model -> Aa = $request->Aa;
        $model -> Ab = $request->Ab;
        $model -> Ac = $request->Ac;
        $model -> Ad = $request->Ad;
        $model -> Akey = $request->Akey;
        $model -> department_name = "Enginnering";
        $model->save();
        return redirect()->back();
    }
    function saveEditQuiz(Request $request)
    {
        $id = $request->QuizID;
        $model = QuizModel::find($id);
        $model -> Question = $request->question;
        $model -> Aa = $request->answerA;
        $model -> Ab = $request->answerB;
        $model -> Ac = $request->answerC;
        $model -> Ad = $request->answerD;
        $model -> Akey = $request->Akey;
        $model -> department_name = "Enginnering";
        $model->save();
        return redirect()->back();
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
