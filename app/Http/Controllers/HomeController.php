<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'contactInformation' => ContactInformation::query()->find(1),
        ]);
    }
}
