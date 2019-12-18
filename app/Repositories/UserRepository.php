<?php
/**
 * Copyright (c) 18.12.2019.
 * File - UserRepository.php
 * Author - snigerev
 */

namespace App\Repositories;


use App\User as Model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository extends CoreRepository
{
    /**
     * @var UserPlanetRepository|Application|mixed
     */
    protected $userPlanetRepository;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userPlanetRepository = app(UserPlanetRepository::class);
    }

    /**
     * @return mixed
     */
    public function getLastPlanet()
    {
        $planetId = $this->startConditions()->find(\Auth::user()->id)->DataUser->last_planet;

        return $this->userPlanetRepository->getPlanetInfo($planetId);
    }

    /**
     * @return mixed
     */
    public function getAdminUsers()
    {
        return $this->startConditions()
            ->whereHas('DataUser', function ($q) {
                $q->where('role_id', '2');
            })->get('id');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->startConditions()->find($id, ['id', 'name', 'email']);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id, ['id', 'name', 'email']);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllUsers()
    {
        return $this->startConditions()
            ->leftJoin('data_users as data', 'users.id', '=', 'data.user_id')
            ->leftJoin('roles as role', 'role.id', '=', 'data.role_id')
            ->get(['users.id', 'users.name', 'users.email', 'role.name as role_name', 'data.nickname']);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserStatus($id)
    {
        return $this->startConditions()
            ->where('users.id', $id)
            ->leftJoin('data_users as data', 'users.id', '=', 'data.user_id')
            ->get(['data.banned', 'data.banned_time', 'data.vacation_mode', 'data.vacation_time']);
    }

    /**
     * @param $id
     * @return string
     */
    public function getUserNick($id)
    {
        return $this->startConditions()
            ->where('users.id', $id)
            ->leftJoin('data_users as data', 'users.id', '=', 'data.user_id')
            ->get(['data.nickname'])->first()->nickname;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
