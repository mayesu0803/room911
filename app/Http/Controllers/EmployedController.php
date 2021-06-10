<?php

namespace App\Http\Controllers;

use App\Models\Employed;
use Illuminate\Http\Request;

/**
 * Class EmployedController
 * @package App\Http\Controllers
 */
class EmployedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeds = Employed::paginate();

        return view('employed.index', compact('employeds'))
            ->with('i', (request()->input('page', 1) - 1) * $employeds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employed = new Employed();
        return view('employed.create', compact('employed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r($request)
        //$request->employed['room_access']? true : false;

        request()->validate(Employed::$rules);

        $employed = Employed::create($request->all());

        return redirect()->route('employeds.index')
            ->with('success', 'Employed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employed = Employed::find($id);

        return view('employed.show', compact('employed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employed = Employed::find($id);

        return view('employed.edit', compact('employed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employed $employed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employed $employed)
    {
        request()->validate(Employed::$rules);

        $employed->update($request->all());

        return redirect()->route('employeds.index')
            ->with('success', 'Employed updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employed = Employed::find($id)->delete();

        return redirect()->route('employeds.index')
            ->with('success', 'Employed deleted successfully');
    }
}
