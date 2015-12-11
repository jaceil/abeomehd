<?php
/**
 * Created by PhpStorm.
 * User: jaceil
 * Date: 11/30/15
 * Time: 1:14 PM
 */

namespace App;

use App\Mouse;

class StatusBar
{

    /**
     * Get the amount of plates per mouse.
     * @param \App\Mouse $mouse
     * @return mixed
     */
    public function getCount(Mouse $mouse)
    {
        $count = $mouse->plates()->count();

        return $count;
    }

    /**
     * Get the amount of plates per mouse that have been processed.
     * @param \App\Mouse $mouse
     * @return mixed
     */
    public function getCompletedCount(Mouse $mouse)
    {
        $count = $mouse->plates()->where('isProcessed', 1)->count();

        return $count;
    }

    /**
     * Get the correct percentage for the status bar functionality.
     * @param \App\Mouse $mouse
     * @return float
     */
    public function getStatus(Mouse $mouse)
    {

        $completed = $this->getCompletedCount($mouse);
        $total = $this->getCount($mouse);

        if($total == 0) {
            $total = 10;
        }

        $status = floor($completed / $total * 100);

        return $status;
    }
}

