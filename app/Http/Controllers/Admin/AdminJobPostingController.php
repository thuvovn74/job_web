<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPosting;

class AdminJobPostingController extends Controller
{
    // ================= LIST =================
    public function index()
    {
        $jobs = JobPosting::with([
            'employer',
            'category',
            'location'
        ])
        ->orderBy('posted_date', 'desc')
        ->get();

        return view('admin.job.index', compact('jobs'));
    }

    // ================= UPDATE STATUS =================
    public function updateStatus(Request $request, $id)
    {
        $job = JobPosting::findOrFail($id);

        $job->status = $request->status;
        $job->save();

        return back()->with('success', 'Cập nhật trạng thái thành công');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        JobPosting::destroy($id);

        return back()->with('success', 'Xóa job thành công');
    }
}