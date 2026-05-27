<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\JobPosting;
use App\Models\Application;

class EmployerBaseController extends Controller
{
    public function __construct()
    {
         //if (!auth()->check() || auth()->user()->role->role_name != 'EMPLOYER') {
            //abort(403);
        //}
    }

    protected function getEmployer()
    {
        return auth()->user()->employer;
    }

}
