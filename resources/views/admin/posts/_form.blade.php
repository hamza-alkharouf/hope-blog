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
    <label for="">Post Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $post['title']) }}" id="">
    @error('title')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">Category</label>
    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror" id="">
        <option value="">No Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category['id'] }}" @if ($category->id == old('category_id', $post['category_id'])) selected @endif>{{ $category['name'] }}</option>
        @endforeach
    </select>
    @error('category_id')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">Content</label>
    <textarea rows="10" type="text" name="content" class="form-control @error('content') is-invalid @enderror" value=""
        id="">{{ old('content', $post['content']) }}</textarea>
    @error('content')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">Image</label>
    @if ($post->image)
    <div>
    <img src="{{ $post->image_url }}" width="200px" alt="" srcset="">
    </div>
    @endif
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="">
    @error('image')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="draft" @if (old('status',$post['status']) == 'draft') checked @endif >
            <label class="form-check-label" for="flexRadioDefault1">
                draft
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status"  value="published" @if (old('status',$post['status']) == 'published') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                published
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="">Tags</label>
    <div>
        @foreach ($tags as $tag)

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tag[]" value="{{ $tag->id }}" @if (in_array($tag['id'], $post_tags)) checked @endif  >
            <label class="form-check-label">
                {{ $tag->name }}
            </label>
        </div>
        @endforeach
    </div>
</div>


<div class="form-group mt-2">
    <button class="btn btn-primary">{{ $savelabel }}</button>
</div>
