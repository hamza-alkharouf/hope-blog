<x-admin-layout title="Create New Category">
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        @include('admin.categories._form',[
        'savelabel' => 'Add'
        ])
    </form>
</x-admin-layout>
