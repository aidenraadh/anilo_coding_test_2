<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Student;
use App\Models\Score;

use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $students  = Student::all();
        $scores = null;
        if($request->has('subject_id')){
            $scores = DB::table('score')
            ->join('student', 'score.student_id', '=', 'student.id')
            ->join('subject', 'score.subject_id', '=', 'subject.id')
            ->select(
                'score.*', 'student.name AS student_name', 'subject.name as subject_name',
                'student.id AS student_id', 'subject.id as subject_id'
            )
            ->where('subject.id', $request->subject_id)
            ->get();  
        }
        else{
            $scores = DB::table('score')
            ->join('student', 'score.student_id', '=', 'student.id')
            ->join('subject', 'score.subject_id', '=', 'subject.id')
            ->select('score.*', 'student.name AS student_name', 'subject.name as subject_name')
            ->get();              
        }      
        return view('index', [
            'subjects' => $subjects,
            'students' => $students,
            'scores' => $scores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
/*         $user = User::create([
            'first_name' => 'Taylor',
            'last_name' => 'Otwell',
            'title' => 'Developer',
        ]); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Score::create([
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'score' => $request->score,
        ]);
        return redirect()->route('scores.index');
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
        Score::where('id', $id)
            ->update([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'score' => $request->score,                
            ]);        

        return redirect()->route('scores.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Score::destroy($id);
        return redirect()->route('scores.index');
    }
}
