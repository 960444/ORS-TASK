<div>
    <p>Questions:</p>
    @foreach (json_decode($results->questions) as $question)
        <p>{{ $question }}</p>
    @endforeach
    <p>Answers:</p>
    <ol>
        @foreach ( json_decode($results->answers) as $answer)
            <li>{{ $answer }}</li>
        @endforeach
    </ol>
</div>