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
                    <h2>Create books list</h2>
                </div>

                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Create books</a>
                    <a class="btn btn-danger" href="{{url('/authors') }}">Authors List</a>
                </div>
                <form action="{{ route('books.index') }}" method="GET" class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" name="search" value="{{request()->search}}" placeholder="Search books or authors" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <br>

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
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
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