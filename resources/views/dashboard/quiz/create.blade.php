@extends('layout.admin')

@section('title', 'Laravel - ' . __('Create category'))

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

        <div class="card card-primary">
          <form method="POST" action="{{ route('quiz.store') }}">
            @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="title-quiz">Заголовок</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title-quiz" required placeholder="Введите заголовок...">
                
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="category-quiz">Категория</label>

                <select class="form-control" name="category" id="category-quiz">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="summernote">Содержимое</label>

                <textarea class="form-control" name="description" id="summernote" style="display: none;"></textarea>
              </div>

              <div class="form-group">
                <label for="image-quiz">Изображение</label>
                <input type="text" class="form-control" name="image" id="image-quiz" placeholder="Выберите изображение...">
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
          </form>
        </div>

      </div><!-- ./col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
