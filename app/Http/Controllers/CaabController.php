<?php

namespace App\Http\Controllers;

use App\Models\Caab;
use Illuminate\Http\Request;

/**
 * Class CaabController
 * @package App\Http\Controllers
 */
class CaabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function api($page=0){
        $data['page'] = $page;
        if ($page==0) {
            $data['items'] = Caab::all();
        }else{
            $data['items'] = Caab::paginate($page);
        }

        return view('caab', $data);
     }
    public function index()
    {
        $caabs = Caab::paginate();
        return view('caab.index', compact('caabs'))
            ->with('i', (request()->input('page', 1) - 1) * $caabs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caab = new Caab();
        return view('caab.create', compact('caab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Caab::$rules);

        $caab = Caab::create($request->all());

        return redirect()->route('caabs.index')
            ->with('success', 'Caab created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caab = Caab::find($id);

        return view('caab.show', compact('caab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caab = Caab::find($id);

        return view('caab.edit', compact('caab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Caab $caab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caab $caab)
    {
        request()->validate(Caab::$rules);

        $caab->update($request->all());

        return redirect()->route('caabs.index')
            ->with('success', 'Caab updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $caab = Caab::find($id)->delete();

        return redirect()->route('caabs.index')
            ->with('success', 'Caab deleted successfully');
    }
}
