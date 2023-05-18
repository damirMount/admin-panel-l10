<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminPersonController extends Controller
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
            return DataTables::of(Person::query())
//                ->editColumn('banner', function (Blog $person) {
//                    return '<img src="' . asset('storage/' . $person->banner) . '" width="200">';
//
//                })
//                ->rawColumns(['banner'])
                ->make(true);
        }

        return view('admin.persons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = Person::create($request->all());

        return redirect()->route('admin_person.index', compact('person'));
    }

    /**
     * Display the specified resource.
     *
     * @param Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('admin.persons.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('admin.persons.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('admin_person.index', compact('person'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('admin_person.index', compact('person'));
    }

}
