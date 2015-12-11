<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{

    /**
     * Delete a photo from a plate.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Photo::findOrFail($id)->delete();

        return back();
    }
}
