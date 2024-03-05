@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example</title>
</head>
<body>

    <form action="{{route('book.store')}}" method="post">
        @csrf

        <input type="hidden" name="create_by" value="{{Auth::user()->id}}">

        <label for="name">Book Name:</label>
        <input type="text" name="name" required>

        <br>

        <label for="author">Author:</label>
        <input type="text" name="author" required>

        <br>

        <button type="submit">Submit</button>
    </form>

    <h1>Listing Book</h1>
    <table>
        <thead>
            <tr>
                <th>
                    id
                </th>
                <th>
                    create by
                </th>
                <th>
                    name
                </th>
                <th>
                    author
                </th>
                <th>
                    
                </th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->user->name}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td><a href="{{route('book.edit', $book->id)}}">edit</a></td>
                <td>
                <form action="{{ route('book.destroy', $book->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('welcome')}}">Welcome</a>
</body>
</html>

@endsection