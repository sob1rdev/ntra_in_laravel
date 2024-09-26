<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Ad;
use App\Models\Branch;

class GetAds
{
    public function __invoke(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('home', [
            'ads' => Ad::all(),
            'branches' => Branch::all()
        ]);
    }
}
