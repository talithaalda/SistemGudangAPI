<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken;

            return $this->handleResponse($success, 'User logged-in!');
        } else {
            return $this->handleError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'posisi' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;

        return $this->handleResponse($success, 'User successfully registered!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->handleError('User tidak ditemukan!');
        }
        return $this->handleResponse(new UserResource($user), 'User ditemukan.');
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'password' => 'same:confirm_password',
            'confirm_password' => 'same:password',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $user = User::findOrFail($id);
        $input = $request->all();
        if (isset($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);

        return $this->handleResponse(new UserResource($user), 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        if (!$user) {
            return $this->handleError('User not found!');
        }
        $user = $user->delete();
        return $this->handleResponse([], 'User berhasil dihapus!');
    }
    public function mutasiBarang($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->handleError('User tidak ditemukan!');
        }
        $mutasis = $user->Mutasi;
        return $this->handleResponse($mutasis, 'Mutasi User.');
    }
}
