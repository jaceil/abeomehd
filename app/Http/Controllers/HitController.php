<?php

namespace App\Http\Controllers;

use App\Hit;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HitController extends Controller {

    /**
     * Increment a hit status
     *
     * @param int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function incrementHit($id, Request $request)
    {
        $hit = Hit::findOrFail($id);

        $success = true;
        if ($hit->status < 3 && $hit->status >= 0)
        {
            $hit->status++;
            $hit->save();
        } else
        {
            $success = false;
        }

        $status = $hit->getStatusText();

        return compact('success', 'hit', 'status');
    }

    /**
     * Cancel a hit status
     *
     * @param int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function cancelHit($id, Request $request)
    {
        /** @var Hit $hit */
        $hit = Hit::findOrFail($id);
        $success = true;

        if ($hit->status < 4 && $hit->status > 0)
        {
            $hit->status = $hit->status * -1;
            $hit->save();
        } elseif ($hit->status == 0)
        {
            $hit->status = -4;
            $hit->save();
        } else
        {
            $success = false;
        }

        $status = $hit->getStatusText();

        return compact('success', 'hit', 'status');
    }

    /**
     * Set an ABM number to a given hit.
     * @param $id
     * @param $request
     * @return array
     */
    public function addName($id, Request $request)
    {
        $hit = Hit::findOrFail($id);
        $success = true;

        $name = $request->get('name');
        if($name == null)
        {
            $success = false;
        }

        $hit->abmno = $name;
        $hit->save();

        return compact('success', 'hit', 'name');
    }

}
