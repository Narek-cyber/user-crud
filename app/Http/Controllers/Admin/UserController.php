<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->where('role', 'user')
            ->with('user_details')
            ->paginate(20);

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user_data = $request->validated();

        $user = User::query()->create([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
            'password' => Hash::make($user_data['password']),
        ]);

        $user->user_details()->create([
            'address' => $user_data['address'],
            'phone_number' => $user_data['phone_number'],
        ]);

        return redirect()->route('users.index')->with('success', 'New user added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()
            ->where('role', 'user')
            ->with('user_details')
            ->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::query()
            ->where('role', 'user')
            ->with('user_details')
            ->findOrFail($id);

        $user_data = $request->validated();

        $user->update([
            'name' => $user_data['name'],
            'email' => $user_data['email'],
        ]);

        $user->user_details()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $user_data['address'],
                'phone_number' => $user_data['phone_number'],
            ]
        );
        return redirect()->route('users.index')->with('success', 'User details was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
