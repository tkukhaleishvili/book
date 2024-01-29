<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create books list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create books lists</h2>
                </div>

                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Create books</a>
                    <a class="btn btn-danger" href="{{url('/authors') }}">Authors List</a>
                </div>

                <x-tableFilter :fields="'name,description'"/>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($books->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>book Name</th>
                    <th>book author</th>
                    <th>book status</th>
                    <th>book released year</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>
                        @foreach ($book->authors as $author)
                            <span>{{ $author->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $book->status->name }}</td>
                    <td>{{ $book->released_year }}</td>
                    <td>
                            <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! $books->links() !!}
    </div>
@else
    <div class="alert alert-info">
        <p>No books found matching your search criteria.</p>
    </div>
@endif

    </div>
</body>
</html>