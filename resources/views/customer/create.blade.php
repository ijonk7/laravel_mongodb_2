<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Full Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Hobby</legend>
                            <div class="col-sm-2">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label col-sm-12 col-form-label" for="art">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="art" id="art" name="hobby[]">
                                        Art
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="basketball">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="basketball" id="basketball" name="hobby[]">
                                        Basketball
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="chess">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="chess" id="chess" name="hobby[]">
                                        Chess
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="fashion">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="fashion" id="fashion" name="hobby[]">
                                        Fashion
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="video_gaming">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="video gaming" id="video_gaming" name="hobby[]">
                                        Video Gaming
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label col-sm-12 col-form-label" for="photography">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="photography" id="photography" name="hobby[]">
                                        Photography
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="music">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="music" id="music" name="hobby[]">
                                        Music
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="dance">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="dance" id="dance" name="hobby[]">
                                        Dance
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="jogging">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="jogging" id="jogging" name="hobby[]">
                                        Jogging
                                    </label>
                                    <br>
                                    <label class="form-check-label col-sm-12 col-form-label" for="swimming">
                                        <input
                                            class="form-check-input form-control @error('hobby') is-invalid @enderror"
                                            type="checkbox" value="swimming" id="swimming" name="hobby[]">
                                        Swimming
                                        @error('hobby')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('hobby') }}
                                            </div>
                                        @enderror
                                    </label>
                                </div>

                                <div class="col-sm-6">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date_of_birth') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label">Photo</label>
                            <div class="col-sm-4">
                                <div class="btn btn-outline-primary">
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                        id="photo" name="photo">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('photo') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age"
                                    name="age" min="17" value="{{ old('age') }}">
                                @error('age')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('age') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status[]" id="single" value="single" checked>
                                    <label class="form-check-label" for="single">
                                        Single
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status[]" id="married" value="married">
                                    <label class="form-check-label" for="married">
                                        Married
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status[]" id="divorce" value="divorce">
                                    <label class="form-check-label" for="divorce">
                                        Divorce
                                    </label>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="vehicle" class="col-sm-2 col-form-label">Vehicle</label>
                            <div class="col-sm-10">
                                <select class="form-select  @error('vehicle') is-invalid @enderror" name="vehicle"
                                    id="vehicle" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="motorcycle">Motorcycle</option>
                                    <option value="car">Car</option>
                                    <option value="bike">Bike</option>
                                </select>
                                @error('vehicle')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('vehicle') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-lg">Create user</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
