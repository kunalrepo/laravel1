@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    {{-- {{ __('You are logged in!') }} --}}

                    @if(isset($selected_person) && !empty($selected_person))

                    <div class="row">
                        <h3 class="col-md-10">Questions For {{@$selected_person->name}}</h3>
                        <a class="btn btn-primary col-md-2" href="{{route('generatePDF')}}" onclick="return confirm('Are you sure?')" >Generate PDF</a>
                    </div>
                    <br>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th width="70%">Question</th>
                                {{-- <th>Person</th> --}}
                                <th>created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $key => $q)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$q->question}}</td>
                                {{-- <td></td> --}}
                                <td>{{date('d-m-Y',strtotime($q->created_at))}}</td>
                                <td><a class="btn btn-danger" href="{{route('delete_question',$q->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.No.</th>
                                <th>Question</th>
                                {{-- <th>Person</th> --}}
                                <th>created at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    @else

                    <h3>Currently no one has been selected. please select person from <a href="{{route('person.index')}}">here</a></h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
