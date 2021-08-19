<?php

namespace App\Http\Controllers;

use App\Models\cat_disciplina;
use Illuminate\Http\Request;

class CatDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getdisciplina() {
        $obten=cat_disciplina::all();  
        return $obten;  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cat_disciplina  $cat_disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(cat_disciplina $cat_disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cat_disciplina  $cat_disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(cat_disciplina $cat_disciplina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cat_disciplina  $cat_disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cat_disciplina $cat_disciplina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cat_disciplina  $cat_disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(cat_disciplina $cat_disciplina)
    {
        //
    }
}
