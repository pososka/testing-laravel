@extends('layout.admin')

@section('title', 'Laravel - ' . __('All categories'))

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

        @empty($categories)
          <p>Нет категорий</p>
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
                      {{ __('Title') }}
                    </th>

                    <th style="width: 20%">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>
                        {{ $category->id }}
                      </td>

                      <td>
                        {{ $category->title }}
                      </td>

                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}">
                          <i class="fas fa-pencil-alt"></i>
                        </a>

                        <form class="d-inline-block" action="{{ route('category.destroy', $category->id) }}" method="POST">
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
