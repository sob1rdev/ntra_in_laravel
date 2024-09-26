<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        $ads = Ad::query()
            ->when($request->search_phrase, function ($query, $title) {
                return $query->where('title', 'like', '%' . $title . '%');
            })
            ->when($request->branch, function ($query, $branch) {
                return $query->where('branch_id', $branch);
            })
            ->when($request->min_price, function ($query, $min_price) {
                return $query->where('price', '>=', $min_price);
            })
            ->when($request->max_price, function ($query, $max_price) {
                return $query->where('price', '<=', $max_price);
            });
        $branches = Branch::all();
        return view('home', [
            'ads' => $ads->get(),
            'branches' => $branches
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ad = Ad::query()->find($id);
        $branches = Branch::all();
        return view('single-ad', compact('ad', 'branches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
