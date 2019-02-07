<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function modals(Request $request, $container) {
        return view('modals.'.$container, $request->input());
    }
}
