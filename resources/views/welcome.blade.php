<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body{
        background-color:#f1f1f1 !important;
        }
        .form-holder{
        margin-top:25%;
        margin-bottom:20%;
        }

        .countdown {
            text-align: center;
            font-size: 60px;
            margin-top: 0px;
        }
    </style>

    <title>FAQ Activity</title>
  </head>
  <body>
    <div class="container">
      <div class="row">

        <div class="col-md-6 offset-md-3">
          <div class="card form-holder">
            <div class="card-body">
                @if(isset($selected_person) && !empty($selected_person))
                    <h1>Ask Your Question To <b>{{@$selected_person->name}}</b></h1>
                    @if (session('thanks_msg'))
                        <div class="alert alert-success text-start" role="alert">
                            {{ session('thanks_msg') }}
                        </div>
                    @else
                        @if($is_start == 1 && $selected_person->time_expired == 0)
                        <div class="question_box">
                        <form action="{{route('new_question')}}" method="post" id="question_form">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Question</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="question"  placeholder="write your quetion here.." required></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit Question" />

                        </form>

                        <p id="demo" class="countdown"></p>
                        <input id="end_date" type="hidden" value="{{date('M d, Y H:i:s',strtotime($selected_person->end_date))}}">
                        </div>
                        @else

                            @if($selected_person->time_expired == 1)
                                The question box has been closed on {{date('d M, Y',strtotime($selected_person->end_date))}} At {{date('h:i A',strtotime($selected_person->end_date))}}
                            @else
                            The question box will open on {{date('d M, Y',strtotime($selected_person->start_date))}} At {{date('h:i A',strtotime($selected_person->start_date))}}
                            @endif

                        @endif
                    @endif
                @else

                <h1>Currently no one has been selected for the FAQ activity. please come after sometime.</h1>


                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('assets/nJGzIxFDsf4x0xcountdownB1rRibZUAYoI-2.1.min.js')}}" integrity="sIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>


  </body>
</html>
