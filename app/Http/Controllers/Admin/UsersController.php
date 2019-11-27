<?php
/**
 * Copyright (c) 27.11.2019.
 * File - UsersController.php
 * Author - tor
 */

namespace App\Http\Controllers\Admin;

use App\Classes\UserClass;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends BaseAdminController
{
    /**
     * @var UserRepository|Application|mixed
     */
    private $userRepository;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        //dd($this->userRepository->getUserStatus(1));
        return view('admin.users.users', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->createUser($request->all())));

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        $user = $this->userRepository->getUserById($id);
        if (empty($user)) {
            abort(404);
        }

        return view('admin.users.show_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        $user = $this->userRepository->getEdit($id);

        if (empty($user)) {
            abort(404);
        }

        return view('admin.users.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $user = new UserClass();

        $updateUser = $user->updateUser($request, $id);

        if (!$updateUser) {
            abort(404);
        }

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $user = new UserClass();
        $deleteUser = $user->deleteUser($id);

        if ($deleteUser) {
            return redirect(route('admin.users.index'));
        } else {
            dd($deleteUser);
        }

    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * @param array $data
     * @return User|Model
     */
    protected function createUser(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->DataUser()->create(['role_id' => $data['role_id']]);

        return $user;
    }
}
