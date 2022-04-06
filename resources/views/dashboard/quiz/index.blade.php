@extends('layout.admin')

@section('title', 'Laravel - ' . __('All quizzes'))

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        @if (session('status.success'))
          <div class="alert alert-success">{{ session('status.success') }}</div>
        @endif
        
        @if (session('status.error'))
          <div class="alert alert-danger">{{ session('status.error') }}</div>
        @endif

        @empty($quizzes)
          <p>Нет тестов</p>
        @else
          <div class="card">
            <div class="card-body p-0">
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th style="width: 1%">
                      ID
                    </th>

                    <th style="width: 20%">
                      {{ __('Category') }}
                    </th>

                    <th style="width: 20%">
                      {{ __('Title') }}
                    </th>

                    <th style="width: 20%">
                      {{ __('Created at') }}
                    </th>

                    <th style="width: 20%">
                      {{ __('Updated at') }}
                    </th>

                    <th style="width: 20%">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($quizzes as $quiz)
                    <tr>
                      <td>
                        {{ $quiz->id }}
                      </td>

                      <td>
                        {{ $quiz->category->title }}
                      </td>

                      <td>
                        {{ $quiz->title }}
                      </td>

                      <td>
                        {{ $quiz->created_at }}
                      </td>

                      <td>
                        {{ $quiz->updated_at }}
                      </td>

                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('quiz.edit', $quiz->id) }}">
                          <i class="fas fa-pencil-alt"></i>
                        </a>

                        <form class="d-inline-block" action="{{ route('quiz.destroy', $quiz->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        @endempty

      </div><!-- ./col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
