<?php
/**
 * Copyright (c) 19.11.2019.
 * File - CoreRepository.php
 * Author - tor
 */

namespace App\Repositories;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /**
     * @var Model
     */

    protected $model;

    /**
     * CoreRepository constructor.
     */

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */

    abstract protected function getModelClass();

    /**
     * @return Application|Model|mixed
     */

    protected function startConditions()
    {
        return clone $this->model;
    }

}
