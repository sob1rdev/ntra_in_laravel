<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function __invoke(): \Illuminate\Database\Eloquent\Collection
    {
        return Ad::all();
    }
}
