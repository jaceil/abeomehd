<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMouseRequest;
use App\Mouse;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mice = Mouse::all();

        return view('mice.index', compact('mice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::findOrFail($id);
//        $mice = $project->mice()->latest()->get();

        return view('mice.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMouseRequest $request)
    {
        $mouse = Mouse::create($request->all());

        $project = Project::findOrFail($mouse->project_id);
        flash()->success('Mouse Added', '');
        return view('mice.create', compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mouse = Mouse::findOrFail($id);

        return view('mice.edit', compact('mouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMouseRequest $request, $id)
    {
        $input = Input::except('_method', '_token');
        $mouse = Mouse::findOrFail($id);
        $mouse->update($input);

        return redirect('projects/' . $mouse->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
