@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Aggiungi nuovo post</h2>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul class="list-unstyled">
                <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
        @endif
        <div class="col-12">
            <form action="{{route('admin.posts.update', $post->slug)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="control-label">
                        Titolo
                    </label>
                    <input type="text" class="form-control" placeholder="Titolo" id="title" name="title">
                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Categoorie</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Contenuto
                    </label>
                    <textarea class="form-control" placeholder="Contenuto" name="content" id="content"></textarea>
                </div>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-sm btn-success">Salva post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection