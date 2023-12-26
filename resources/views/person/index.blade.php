@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Person</div>

                <div class="card-body">
                    <form action="{{route('person.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Person Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>

            <br><br>

            <div class="card">
                <div class="card-header">Select Person for next FAQ Activity</div>

                <div class="card-body">
                    <form action="{{route('person.select_person')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Select Person</label>
                          <select class="form-control" name="person_id">
                            <option value="">No Person</option>
                            @foreach($person as $p)
                                <option value="{{$p->id}}" {{$p->id == @$selected_person->id ? 'selected' : ''}} >{{$p->name }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Start (date and time):</label>
                                <input class="form-control" type="datetime-local" id="" name="start_date" value="{{date("Y-m-d\TH:i:s", strtotime(@$selected_person->start_date))}}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">End (date and time):</label>
                                <input class="form-control" type="datetime-local" id="" name="end_date" value="{{date("Y-m-d\TH:i:s", strtotime(@$selected_person->end_date))}}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Person List </div>
                    {{-- <a class="btn btn-primary" href="{{ route('person.create') }}">Add Person</a> --}}

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($person as $key => $p)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$p->name}}</td>
                                <td><a class="btn btn-danger" href="{{route('person.delete_person',$p->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>





    </div>
</div>
@endsection
