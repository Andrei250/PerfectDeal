<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function getCategories(Request $request, Domain $domain) {
        return [$domain->categories];
    }
}
