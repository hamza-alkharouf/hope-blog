<x-admin-layout title="Posts List">
    <div class="mb-4">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-outline-primary">Create New</a>
        <a href="{{ route('admin.posts.trash') }}" class="btn btn-sm btn-outline-primary">Trash</a>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @else

    @endif
    <table class="table">
        <thead>
            <tr>
                <th>
                </th>
                <th>ID
                </th>
                <th>Title
                </th>
                <th>Slug
                </th>
                <th>Category
                </th>
                <th>Tag
                </th>
                <th>Status
                </th>
                <th>User
                </th>
                <th>Create At
                </th>
                <th>
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($posts as $post)
                <tr>
                    <td><a href="{{ route('admin.posts.image', [$post['id']]) }}">
                    <img src="{{ $post->image_url }}"height="60px" alt="">
                     </a>
                    </td>
                    <td>{{ $post['id'] }}
                    </td>
                    <td>{{ $post['title'] }}
                    </td>
                    <td>{{ $post['slug'] }}
                    </td>
                    <td>{{ $post->category['name'] }}
                    </td>
                    <td>
                        @foreach ($post['tags'] as $tag)
                        <span class="badge bg-info m-1">
                        {{ $tag->name }}
                         </span>
                        @endforeach
                    </td>
                    <td>{{ $post['status'] }}
                    </td>
                    <td>{{ $post['user_id'] }}
                    </td>
                    <td>{{ $post['created_at'] }}
                    </td>
                    <td><a href="{{ route('admin.posts.edit', [$post['id']]) }}"
                            class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">
                        No categories Found.
                    </td>
                </tr>
            @endforelse


        </tbody>
    </table>
    {{ $posts->links() }}

</x-admin-layout>
