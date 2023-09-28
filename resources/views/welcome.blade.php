<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        @foreach ($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="authors[]">Authors</label>
    <select name="authors[]" id="authors" class="form-control" multiple>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
</div>
