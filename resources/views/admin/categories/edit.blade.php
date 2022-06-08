<x-admin-layout title="Edit Category">

    <form action="{{ route('admin.categories.update' , $category['id']) }}" method="post">
        @csrf
        @method('put')
        @include('admin.categories._form',[
            'savelabel' => 'Update'
        ])    
        </form>
</x-admin-layout>
