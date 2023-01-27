<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                            <a href="{{ route('customer.create') }}" class="btn btn-primary btn-lg">Add Customer</a>
                        </div>
                    </div>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Hobby</td>
                                <td>Date of Birth</td>
                                <td>Photo</td>
                                <td>Age</td>
                                <td>Status</td>
                                <td>Vehicle</td>
                                <td>Address</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->hobby }}</td>
                                    <td>{{ $customer->date_of_birth }}</td>
                                    <td><img src="{{ Storage::disk('public')->exists($customer->photo) ? asset('storage/' . $customer->photo) : $customer->photo }}" width="80" height="150"></td>
                                    <td>{{ $customer->age }}</td>
                                    <td>{{ $customer->status }}</td>
                                    <td>{{ $customer->vehicle }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex">
                                            <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" class="btn btn-warning mr-1">Edit</a>
                                            <form action="{{ route('customer.delete', ['customer' => $customer->id]) }}" method="POST">
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
