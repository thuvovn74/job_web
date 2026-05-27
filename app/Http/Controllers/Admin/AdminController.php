<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\JobPosting;
use App\Models\CareerGuide;
use App\Models\Skill;
use App\Models\Application;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = Account::count();
        $jobs = JobPosting::count();
        $careers = CareerGuide::count();
        $skills = Skill::count();

        // biểu đồ jobs theo status
        $activeJobs = JobPosting::where('status', 1)->count();
        $hiddenJobs = JobPosting::where('status', 0)->count();

        // biểu đồ applications
        $pendingApplications = Application::where('status', 0)->count();
        $approvedApplications = Application::where('status', 1)->count();
        $rejectedApplications = Application::where('status', 2)->count();

        return view('admin.dashboard', compact(
            'users',
            'jobs',
            'careers',
            'skills',
            'activeJobs',
            'hiddenJobs',
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications'
        ));
    }
}