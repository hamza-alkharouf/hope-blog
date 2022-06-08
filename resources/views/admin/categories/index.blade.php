<x-admin-layout title="Categories List">
    <div class="mb-4">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-primary">Create New</a>
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
                <th>Name
                </th>
                <th>Slug
                </th>
                <th>Parent
                </th>
                <th>Childs #
                </th>
                <th>Posts #
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
            @if (empty(!$categories))
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}
                        </td>
                        <td>{{ $category['id'] }}
                        </td>
                        <td>{{ $category['name'] }}
                        </td>
                        <td>{{ $category['slug'] }}
                        </td>
                        <td>{{ $category->parent->name }}
                        </td>
                        <td>{{ $category['childern_count'] }}
                        </td>
                        <td>{{ $category['posts_count'] }}
                        </td>
                        <td>{{ $category['created_at'] }}
                        </td>
                        <td><a href="{{ route('admin.categories.edit', [$category['id']]) }}"
                                class="btn btn-sm btn-outline-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category['id']) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">
                        No categories Found.
                    </td>
                </tr>

            @endif


        </tbody>
    </table>
    {{ $categories->links() }}
</x-admin-layout>
