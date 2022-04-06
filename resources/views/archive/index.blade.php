@extends('layout.main')

@section('title', 'Laravel - Новости')

@section('content')
<div class="container">
    <h1 class="mb-5 text-center">Новости</h1>

    @foreach ($quizzes as $quiz)
        <article>
            <h2>{{ $quiz->title }}</h2>
            <p>{{ $quiz->description }}</p>
        </article>
    @endforeach

    <div class="d-flex justify-content-center pt-3">
        {{ $quizzes->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
