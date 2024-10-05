<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return User::query()
            ->where('role', 'user')
            ->with('user_details')
            ->paginate(20);
    }

    /**
     * @param $id
     * @return Collection|mixed|object|null
     */
    public function find($id)
    {
        return User::query()
            ->where('role', 'user')
            ->with('user_details')
            ->findOrFail($id);
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data)
    {
        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->user_details()->create([
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
        ]);
    }

    /**
     * @param $data
     * @param $id
     * @return void
     */
    public function update($data, $id)
    {
        $user = $this->find($id);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $user->user_details()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $data['address'],
                'phone_number' => $data['phone_number'],
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return User::query()->findOrFail($id)->delete();
    }
}
