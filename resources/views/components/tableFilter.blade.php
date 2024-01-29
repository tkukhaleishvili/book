@props(['fields' => 'name,description'])
@php
     $fieldsArray  = explode(',', $fields);
@endphp
<form action="{{ route('books.index') }}" method="get">
    <div class="row">
        @foreach($fieldsArray as $field)
        @php
        if (\Str::contains($field, '.')) {
            $fields_rel  = explode('.', $field);
            $field = $fields_rel[1];
        }
        $field = Str::replace('_', ' ', $field);
        @endphp
        <div class="col-lg-3">
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlInput1">{{ ucfirst($field) }}</label>
               <input class="form-control" id="exampleFormControlInput1" type="text" name="filter[{{ $field }}]" placeholder="{{ ucfirst($field) }}" value="{{ request('filter.'.$field) }}" />
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-4">
            <button class="btn btn-falcon-info me-1 mb-1" type="submit">Search</button>
        </div>
    </div>
</form>
