<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['admin', 'auth']);
    }

    /**
     * Index admin
     *
     * @return void
     */
    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $admin = Admin::create($input);

        return redirect('admin');
    }
}
