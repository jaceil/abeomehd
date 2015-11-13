<?php

namespace App\Http;

class Flash {
    public function create($title, $message, $type)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]);
    }

    public function message($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }
}