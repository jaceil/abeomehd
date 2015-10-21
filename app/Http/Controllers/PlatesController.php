<?php

namespace App\Http\Controllers;

use App\Mouse;
use App\Photo;
use App\Plate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PlatesController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $mouse = Mouse::findOrFail($id);
        $plates = $mouse->plates()->get();
        if(is_null($mouse->plates())){
            $plates = 0;
        }

        return view('plates.create', compact('plates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plate = Plate::create($request->all());

        $plates = Mouse::findOrFail($plate->mouse_id)->plates()->get();

        return view('plates.create', compact('plates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plate = Plate::findOrFail($id);
        return view('plates.show', compact('plate'));
    }

    /**
     *  Add a photo to a plate based on id.
     * @param $id
     * @param Request $request
     * @return string
     */
    public function addPhoto($id, Request $request)
    {
//        $this->validate($request, [
//           'file' => 'required|mimes:jpg,jpeg,bmp,png'
//        ]);
//        $file = $request->file('file');
//        $name = time() . $file->getClientOriginalName();
//
//        $file->move('plate-photos', $name);
//        $plate = Plate::findOrFail($id);
//        $plate->photos()->create(['name' => "{$name}", 'path' => "/plate-photos/{$name}", 'thumbnail_path' => "/plate-photos/tn-{$name}"]);
        $photo = $this->makePhoto($request->file('photo'));

        Plate::findOrFail($id)->addPhoto($photo);
    }

    /**
     * Store in the file.
     * @param UploadedFile $file
     * @return mixed
     */
    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())->move($file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
