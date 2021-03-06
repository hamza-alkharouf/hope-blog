@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
                <li>

                    {{ $message }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $category['name']) }}" id="">
    @error('name')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">Parent</label>
    <select name="parent_id" class="form-control  @error('parent_id') is-invalid @enderror" id="">
        <option value="">No Parent</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent['id'] }}" @if ($parent->id == old('parent_id', $category['parent_id'])) selected @endif>{{ $parent['name'] }}</option>

        @endforeach

    </select>
    @error('parent_id')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mt-2">
    <button class="btn btn-primary">{{ $savelabel }}</button>
</div>
