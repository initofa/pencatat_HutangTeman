<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\HutangTeman;

class TambahDataController extends Controller
{
    public function tambah(): View
    {
        return view('hutangtemans.create');
    }
}
