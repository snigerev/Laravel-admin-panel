<?php
/**
 * Copyright (c) 28.11.2019.
 * File - IndexAdminController.php
 * Author - tor
 */

namespace App\Http\Controllers\Admin;


class IndexAdminController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

}
