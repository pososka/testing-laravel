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
          <form method="POST" action="{{ route('category.store') }}">
            @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="title-category">Название категории</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title-category" required placeholder="Введите название категории...">

                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>                  
                @enderror
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
