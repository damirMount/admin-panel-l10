<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Business;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminBusinessController extends Controller
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
            return DataTables::of(Business::query())
//                ->editColumn('banner', function (Blog $business) {
//                    return '<img src="' . asset('storage/' . $business->banner) . '" width="200">';
//
//                })
//                ->rawColumns(['banner'])
                ->make(true);
        }

        return view('admin.businesses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = Business::create($request->all());

        return redirect()->route('admin_businesses.index', compact('business'));
    }

    /**
     * Display the specified resource.
     *
     * @param Business $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('admin.businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Business $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('admin.businesses.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $business->update($request->all());
        return redirect()->route('admin_businesses.index', compact('business'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Business $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();

        return redirect()->route('admin_businesses.index', compact('business'));
    }

}
