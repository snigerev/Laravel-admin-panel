<?php
/**
 * Copyright (c) 28.11.2019.
 * File - UsersController.php
 * Author - tor
 */

namespace App\Http\Controllers\Admin;

use App\Classes\UserClass;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    public function store(UserCreateRequest $request)
    {
        (new UserClass())->createUser($request);

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
        $user = (new UserClass())->updateUser($request, $id);

        if ($user) {
            return redirect(route('admin.users.index'));
        } else {
            return abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $user = (new UserClass())->deleteUser($id);

        if ($user) {
            return redirect(route('admin.users.index'));
        } else {
            return abort(404);
        }

    }
}
