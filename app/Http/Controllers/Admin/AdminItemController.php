<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdminItemController extends Controller
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
            return DataTables::of(Item::query())
//                ->editColumn('banner', function (Blog $item) {
//                    return '<img src="' . asset('storage/' . $item->banner) . '" width="200">';
//
//                })
//                ->rawColumns(['banner'])
                ->make(true);
        }

        return view('admin.items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create($request->except('image'));
        Storage::disk('public')
            ->put('itemImages/item_' . uniqid() . $request->image->getClientOriginalExtension(), $request->image);

        return redirect()->route('admin_items.index', compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->except('image'));
        if($request->exists('image')){
            Storage::disk('public')->delete($item->image);
            Storage::disk('public')
                ->put('itemImages/item_' . uniqid() . $request->image->getClientOriginalExtension(), $request->image);
        }

        return redirect()->route('admin_items.index', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::disk('public')->delete($item->image);
        $item->delete();

        return redirect()->route('admin_items.index', compact('item'));
    }

}
