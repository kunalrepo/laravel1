@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
    </div>
</div>
@endsection
