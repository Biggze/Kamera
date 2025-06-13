<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjualanAdminController extends Controller
{
    public function index()
    {
        return view('admin.penjualan.index');
    }

    public function create()
    {
        return view('admin.penjualan.create');
    }

    public function edit($id)
    {
        return view('admin.penjualan.edit', compact('id'));
    }
}
