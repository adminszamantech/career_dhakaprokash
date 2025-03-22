<?php

namespace App\Http\Controllers\Backend;

use App\Models\Applicant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function dashboard(){
        $applicantQuery = Applicant::with('district', 'upazila');
        $newApplicants = $applicantQuery->clone()->where('is_seen', 'unseen')->where('shortlist', 0)->count();
        $shortApplicants = $applicantQuery->clone()->where('is_seen', 'unseen')->where('shortlist', 1)->count();
        $prevApplicants = $applicantQuery->clone()->where('is_seen', 'seen')->where('shortlist', 0)->count();
        return view('backend.pages.dashboard',compact('newApplicants','shortApplicants','prevApplicants'));
    }

    public function applicants(){

        $applicantQuery = Applicant::with('district', 'upazila')->latest();
        $newApplicants = $applicantQuery->clone()->where('is_seen', 'unseen')->where('shortlist', 0)->get();
        $shortApplicants = $applicantQuery->clone()->where('is_seen', 'unseen')->where('shortlist', 1)->get();
        $prevApplicants = $applicantQuery->clone()->where('is_seen', 'seen')->where('shortlist', 0)->get();
        return view('backend.pages.applicants',compact('newApplicants','shortApplicants','prevApplicants'));
    }

    public function applicantStatus(Request $request){
        $applicant = Applicant::find($request->query('id'));
        if($request->query('status') == 'seen'){
            $applicant->shortlist = false;
            $applicant->is_seen = 'seen';
        }
        if($request->query('status') == 'unseen'){
            $applicant->is_seen = 'unseen';
        }
        if($request->query('status') == 'shortlist'){
            $applicant->is_seen = 'unseen';
            $applicant->shortlist = true;
        }
        if($request->query('status') == 'unshortlist'){
            $applicant->shortlist = false;
        }
        $applicant->save();
        if($request->query('status') == 'delete'){
            $applicant->delete();
        }
        return redirect()->route('applicants')->with('info',Str::ucfirst($request->query('status')).' Status Successfully');
    }

}
