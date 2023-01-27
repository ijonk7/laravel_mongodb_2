<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="d-flex align-items-end flex-column bd-highlight mb-3">
                        <div class="mt-auto p-2 bd-highlight">
                            <a href="{{ route('book.create') }}" class="btn btn-primary btn-lg">Add Book</a>
                        </div>
                    </div>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <td>Title</td>
                                <td>Author</td>
                                <td>User</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex">
                                            <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning mr-1">Edit</a>
                                            <form action="{{ route('book.delete', ['book' => $book->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
