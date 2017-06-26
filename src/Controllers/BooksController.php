<?php

namespace Lthaihv\Book2CRUD\Controllers;

use Illuminate\Http\Request;
use Lthaihv\Book2CRUD\Requests\CreateBookRequest;
use Lthaihv\Book2CRUD\Requests\EditBookRequest;
use Lthaihv\Book2CRUD\IBookServiceContract;

class BooksController extends Controller
{
    protected $service;

    public function __construct(IBookServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->service->paginate();
        return view('book2-crud::books.index', compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('book2-crud::books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $this->service->store($request->all());
        return redirect()->route('book2-crud::books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->service->find($id);
        return view('book2-crud::books.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->service->find($id);
        return view('book2-crud::books.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBookRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('book2-crud::books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('book2-crud::books.index');
    }
}
