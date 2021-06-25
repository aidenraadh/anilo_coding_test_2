@extends('layouts.app')


@section('content')

<form method="get" action="{{route('scores.index')}}" class="d-flex align-items-end"
style="margin-bottom: 2rem">
    <div class="form-group" style="margin-bottom: 0;margin-right: 1rem">
        <label for="exampleFormControlSelect1">Filter by subject</label>
        <select name="subject_id" class="form-control" id="exampleFormControlSelect1">
            @foreach($subjects as $subject)
            <option value="{{$subject->id}}">{{$subject->name}}</option>
            @endforeach                
        </select>
    </div>       
    <button type="submit" class="btn btn-primary">Search</button>                      
</form>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
style="margin-bottom: 1rem">
  Add New Score
</button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Student</th>
      <th scope="col">Subject</th>
      <th scope="col">Score</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($scores as $score)
      <tr>
        <td>{{$score->student_name}}</td>
        <td>{{$score->subject_name}}</td>
        <td>{{$score->score}}</td>
        <td>
          <span class="d-inline-flex">
            <button type="button" class="btn btn-primary" style="margin-right: 1rem"
            id="toggle-update-score-btn"
            data-toggle="modal" data-target="#testModal" data-student-id='{{$score->student_id}}'
            data-subject-id='{{$score->subject_id}}' data-score='{{$score->score}}'
            data-score-id='{{$score->id}}'>
              Update
            </button>              
            <form method="POST" action="{{route('scores.destroy', ['score' => $score->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  Delete
                </button>              
            </form>        
          <span>            
        </td>
      </tr>
    @endforeach      
  </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Score</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('scores.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Student</label>
                <select name="student_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Subject</label>
                <select name="subject_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Score</label>
                <input name="score" type="number" class="form-control" id="exampleInputEmail1" placeholder="Score">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>                             
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testModalLabel">Update Score</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update-score-form-tag" method="POST" action="{{route('scores.index')}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleFormControlSelect1">Student</label>
                <select name="student_id" class="form-control" id="update-student-id-form">
                    @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Subject</label>
                <select name="subject_id" class="form-control" id="update-subject-id-form">
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Score</label>
                <input name="score" type="number" class="form-control" id="update-score-form" 
                placeholder="Score">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>                             
        </form>
      </div>
    </div>
  </div>
</div>
@endsection