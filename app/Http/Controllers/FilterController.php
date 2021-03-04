<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function newsfeedFilters(Request $request) {
        return $request->all();
    }
}
