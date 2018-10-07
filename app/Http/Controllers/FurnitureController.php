<?php

namespace App\Http\Controllers;

use App\Http\Requests\FurnitureStoreRequest;
use App\Http\Requests\FurnitureUpdateRequest;
use App\Models\Furniture;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $data = Furniture::get();

        $this->authorize('view', $data);

        return view('furniture.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Furniture::class);

        return view('furniture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\FurnitureStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(FurnitureStoreRequest $request)
    {
        $this->authorize('create', Furniture::class);

        Furniture::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('furniture.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Furniture $furniture
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Furniture $furniture)
    {
        $this->authorize('update', $furniture);

        return view('furniture.edit', compact('furniture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\FurnitureUpdateRequest $request
     * @param \App\Models\Furniture $furniture
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(FurnitureUpdateRequest $request, Furniture $furniture)
    {
        $this->authorize('update', $furniture);

        $furniture->update([
            'name' => $request->get('name'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Furniture $furniture
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Furniture $furniture)
    {
        $this->authorize('delete', $furniture);

        $furniture->delete();

        return redirect()->route('furniture.index');
    }
}
