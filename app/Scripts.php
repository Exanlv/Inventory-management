<?php
namespace App;

use Illuminate\Support\Facades\Log;

class Scripts {
    public $scripts = [];

    public function addScript($script) {
        $this->scripts[] = $script;
        Log::debug($script);
    }
}