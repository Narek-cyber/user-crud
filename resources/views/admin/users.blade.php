@include('messages.message')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form
                method="POST"
                action="{{ route('users.store') }}"
            >
                @csrf
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
                    >
                    @error('address')
                        <span class="text-sm text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        aria-describedby="passwordHelp"
                        name="password"
                    >
                    @error('password')
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
{{--                @forelse($users as $key => $user)--}}
{{--                    <tr>--}}
{{--                        <td>{{$key + 1}}</td>--}}
{{--                        <td>{{$user->name}}</td>--}}
{{--                        <td>{{$user->lastname}}</td>--}}
{{--                        <td>{{$user->email}}</td>--}}
{{--                        <td>{{$user->phone}}</td>--}}
{{--                        <td>{{$user->date_of_birth}}</td>--}}
{{--                        <td>--}}
{{--                            <form--}}
{{--                                action="{{ route('admin.invite', ['id' => $user->id]) }}"--}}
{{--                                method="POST"--}}
{{--                            >--}}
{{--                                @csrf--}}
{{--                                <button--}}
{{--                                    class="btn btn-primary btn-sm"--}}
{{--                                    type="submit"--}}
{{--                                >--}}
{{--                                    Invite--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <td--}}
{{--                        colspan="7"--}}
{{--                        class="text-center fw-bold"--}}
{{--                    >--}}
{{--                        No users yet--}}
{{--                    </td>--}}
{{--                @endforelse--}}
                </tbody>
            </table>
{{--            <div class="mt-3">--}}
{{--                <div class="d-flex">--}}
{{--                    @isset($users)--}}
{{--                        {{ $users->links() }}--}}
{{--                    @endisset--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</x-app-layout>
