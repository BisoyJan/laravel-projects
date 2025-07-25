<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'my_job_application.index',
            [
                'applications' => Auth::user()->jobApplications()
                    ->with(
                        [
                            'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary')
                            ->withTrashed(),
                            'job.employer'
                        ]
                    )
                    ->latest()->get()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication)
    {

        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application deleted successfully.');
    }
}
