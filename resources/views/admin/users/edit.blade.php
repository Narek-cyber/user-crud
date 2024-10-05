<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form
                method="POST"
                action="{{ route('users.update', $user->id) }}"
            >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label
                        for="name"
                        class="form-label"
                    >
                        Name
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        aria-describedby="nameHelp"
                        name="name"
                        value="{{ $user->name ?? old('name') }}"
                    >
                    @error('name')
                    <span class="text-sm text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        aria-describedby="emailHelp"
                        name="email"
                        value="{{ $user->email ?? old('email') }}"
                    >
                    @error('email')
                    <span class="text-sm text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label
                        for="phone_number"
                        class="form-label"
                    >
                        Phone
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="phone_number"
                        aria-describedby="phone_numberHelp"
                        name="phone_number"
                        value="{{ $user->user_details->phone_number ?? old('phone_number') }}"
                    >
                    @error('phone_number')
                    <span class="text-sm text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label
                        for="address"
                        class="form-label"
                    >
                        Address
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="address"
                        aria-describedby="addressHelp"
                        name="address"
                        value="{{ $user->user_details->address ?? old('address') }}"
                    >
                    @error('address')
                    <span class="text-sm text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
