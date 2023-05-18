<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Family::query())
//                ->editColumn('banner', function (Blog $family) {
//                    return '<img src="' . asset('storage/' . $family->banner) . '" width="200">';
//
//                })
//                ->rawColumns(['banner'])
                ->make(true);
        }

        return view('admin.families.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $family = Family::create($request->all());

        return redirect()->route('admin_families.index', compact('family'));
    }

    /**
     * Display the specified resource.
     *
     * @param Family $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        return view('admin.families.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Family $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Family $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        $family->update($request->all());
        return redirect()->route('admin_families.index', compact('family'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Family $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        $family->delete();

        return redirect()->route('admin_families.index', compact('family'));
    }

}
