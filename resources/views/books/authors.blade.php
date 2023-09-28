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
                    <h2>Authors List</h2>
                </div>
            </div>
            <div class="col-lg-9 margin-tb">
	            <form action="{{ route('books.index') }}" method="GET" class="form-inline my-2 my-lg-0">
	                  <input class="form-control mr-sm-2" type="search" name="search" value="{{request()->search}}" placeholder="Search books or authors" aria-label="Search">
	                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	                </form>
            </div>
            <div class="col-lg-3 margin-tb">
                <a class="btn btn-warning" href="{{url('/books') }}"> Back to  Books</a>
            </div>
            <br>
            <br>
            
        </div>
        @if ($authors->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Author Name</th>
                        <!-- Add other author attributes here -->
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                <p>No authors found.</p>
            </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!! $authors->links() !!}
    </div>
</body>
</html>