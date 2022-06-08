<x-admin-layout title="Deleted Posts!">
    <div class="mb-4">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
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
                <th>Status
                </th>
                <th>User
                </th>
                <th>Deleted At
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
                    <td>{{ $post['status'] }}
                    </td>
                    <td>{{ $post['user_id'] }}
                    </td>
                    <td>{{ $post['deleted_at'] }}
                    </td>
                    <td>                        
                        <form action="{{ route('admin.posts.restore', $post['id']) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-outline-primary">Restore</button>
                    </form>
                </td>
                    <td>
                        <form action="{{ route('admin.posts.force-delete', $post['id']) }}" method="post">
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
