<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Show form template and complete by previous data if validation failed on store
        return view('answers.index', [
            'question1' => $request->old('question1') ? $request->old('question1') : null,
            'question2' => $request->old('question2') ? $request->old('question2') : null,
            'question3' => $request->old('question3') ? $request->old('question3') : null,
            'question4' => $request->old('question4') ? $request->old('question4') : null,
            'question5' => $request->old('question5') ? $request->old('question5') : null,
            'email' => $request->old('email') ? $request->old('email') : null,
        ]);
    }

    /**
     * Store a newly answer in database.
     *
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        // validate form
        if ($request->validator()->fails()) {
            return redirect('Home')
                ->withErrors($request)
                ->withInput();
        }
        // persist data
        $answer = new Answer();
        $request->session()->regenerateToken();
        $answer->question1 = $request->question1;
        $answer->question2 = $request->question2;
        $answer->question3 = $request->question3;
        $answer->question4 = $request->question4;
        $answer->question5 = $request->question5;
        $answer->email = $request->email;

        $answer->save();
        // redirect to Homepage
        return redirect()->route('Home')->with('success', "La réponse à bien été enregistrée");
    }

    /**
     * Return list of Answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        // return object with data
        if ($request->user()->cannot('show', Answer::class)) {
            return response()->json([ 'error' => 'permission denied' ], 403);
        }

        $answers = [];
        if ($request->query('id')) {
            $answers = Answer::find($request->query('id'));
        }
        elseif($request->query('email')) {
            $answers = Answer::where('email', 'like', '%'.$request->query('email').'%')->get();
        }
        else {
            $answers = Answer::all();
        }
        return response()->json($answers);
    }

    /**
     * Return list of Answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        if ($request->user()->cannot('show', Answer::class)) {
            return redirect()->route('Home')->with('error', "Vous n'avez pas les permissions nécessaires pour accéder à cette page");
        }

        $answers = [];
        if($request->query('search')) {
            $answers = Answer::where('email', 'like', '%'.$request->query('search').'%')->get();
        } else {
            $answers = Answer::all();
        }

        return view('dashboard.index', [
            'search' => $request->query('search'),
            'answers' => $answers
        ]);
    }
}
