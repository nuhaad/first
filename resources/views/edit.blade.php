@extends('layouts.app')

@section('content')

<form action="{{route('book.update', $book->id)}}" method="post">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->

    <label for="name">Book Name:</label>
    <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>

    <label for="author" class="mt-2">Author:</label>
    <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>

@endsection