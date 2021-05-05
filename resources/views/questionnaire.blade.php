<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <form method="POST" action="{{ route('answers.store') }}">
                        @csrf
                        @foreach($questions as $question)
                            <div class="card">
                                <div class="card-header">
                                    {{ $question['number']  }} {{ $question['label']}}
                                </div>
                                <div class="card-body">
                                    @if($question['type'] === "text")
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="{{$question['number']}} {{ $question['label'] }}"/>
                                        </div>
                                    @elseif($question['type'] === "radio")
                                        @foreach($question['responses'] as $response)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="{{ $question['number'] }} {{ $question['label'] }}" value={{$response}} checked>
                                                <label class="form-check-label" for="{{ $question['number'] }}">
                                                    {{ $response }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <br />
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <form>
            </div>
        </div>
    </div>
    </body>
</html>


