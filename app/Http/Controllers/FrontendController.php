<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Applicant;
use App\Models\University;
use App\Services\Services;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }
    public function home(){
        return view('home');
    }

    public function career_form_submit(Request $request){
        $validated = $request->validate([
            'bn_name' => 'required',
            'en_name' => 'required',
            'mobile' => 'required|numeric|digits:11|unique:applicants,mobile',
            'email' => 'required|email|unique:applicants,email',
            'date_of_bath' => 'required|date',
            'edu_qualification' => 'required',
            'present_occ' => 'required',
            'work_place' => 'required',
            'application_type' => 'required',
            'permanent_address' => 'required',
            'journalism_tranning' => 'required',
            'applicant_photo' => 'required|image|mimes:jpg,jpeg,png',
            'present_address' => 'required',
        ], [
            'bn_name.required' => 'বাংলা নাম অবশ্যই দিতে হবে।',
            'en_name.required' => 'ইংরেজি নাম অবশ্যই দিতে হবে।',

            'mobile.required' => 'মোবাইল নম্বর অবশ্যই দিতে হবে।',
            'mobile.numeric' => 'মোবাইল নম্বর একটি সংখ্যা হতে হবে।',
            'mobile.digits' => 'মোবাইল নম্বরটি ১১ ডিজিটের হতে হবে।',
            'mobile.unique' => 'এই মোবাইল নম্বর ইতিমধ্যেই ব্যবহার করা হয়েছে।',

            'email.required' => 'ইমেইল ঠিকানা অবশ্যই দিতে হবে।',
            'email.email' => 'এটি একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
            'email.unique' => 'এই ইমেইল ঠিকানা ইতিমধ্যেই ব্যবহার করা হয়েছে।',

            'date_of_bath.required' => 'জন্ম তারিখ অবশ্যই দিতে হবে।',
            'date_of_bath.date' => 'জন্ম তারিখ একটি সঠিক তারিখ হতে হবে।',

            'edu_qualification.required' => 'শিক্ষাগত যোগ্যতা অবশ্যই দিতে হবে।',

            'present_occ.required' => 'বর্তমান পেশা অবশ্যই দিতে হবে।',

            'work_place.required' => 'কাজের স্থান অবশ্যই দিতে হবে।',

            'application_type.required' => 'আবেদন প্রকার অবশ্যই দিতে হবে।',

            'permanent_address.required' => 'স্থায়ী ঠিকানা অবশ্যই দিতে হবে।',

            'journalism_tranning.required' => 'সাংবাদিকতায় প্রশিক্ষণ অবশ্যই দিতে হবে।',

            'applicant_photo.required' => 'আবেদনকারীর ছবি অবশ্যই আপলোড করতে হবে।',
            'applicant_photo.image' => 'একটি বৈধ ছবি হতে হবে।',
            'applicant_photo.mimes' => 'ছবি হতে হবে: jpg, jpeg, png।',

            'present_address.required' => 'বর্তমান ঠিকানা অবশ্যই দিতে হবে।',
        ]);

        $applicationTypes = [
            '1' => 'স্টাফ রিপোর্টার',
            '2' => 'জেলা প্রতিনিধি',
            '3' => 'উপজেলা প্রতিনিধি',
            '4' => 'ক্যাম্পাস',
        ];
        $universityTypes = [
            '1' => 'পাবলিক বিশ্ববিদ্যালয়',
            '2' => 'জাতীয় বিশ্ববিদ্যালয়',
            '3' => 'প্রাইভেট বিশ্ববিদ্যালয়',
        ];
        $applicant = new Applicant;
        $applicant->bn_name = $request->bn_name;
        $applicant->en_name = $request->en_name;
        $applicant->mobile = $request->mobile;
        $applicant->email = $request->email;
        $applicant->date_of_bath = $request->date_of_bath;
        $applicant->edu_qualification = $request->edu_qualification;
        $applicant->present_occ = $request->present_occ;
        $applicant->work_place = $request->work_place;
        $applicant->application_type = $applicationTypes[$request->application_type];
        $applicant->permanent_address = $request->permanent_address;
        $applicant->journalism_tranning = $request->journalism_tranning;
        $applicant->district_id = $request->district_id;
        $applicant->upazila_id = $request->upazila_id;
        $applicant->university_name = $request->university_name;
        $applicant->present_address = $request->present_address;

        if($request->university_type){
            $applicant->university_type = $universityTypes[$request->university_type];
        }
        if ($request->hasFile('applicant_photo')){
            $width = 350; $height = 253;
            $folder = '/assets/images/applicants/';
            $applicant->applicant_photo = $this->services->imageUpload($request->file('applicant_photo'), $folder,$width,$height);
        }
        $applicant->save();
        return redirect()->route('home')->with('info','Application Submitted Successfully');
    }

    public function get_zila_lists(){
        return response()->json([
            'status' => 'success',
            'districts' => District::get()
        ], 200);
    }

    public function get_upozila_lists($id){
        return response()->json([
            'status' => 'success',
            'upozilas' => Upazila::where(['district_id'=>$id])->get()
        ], 200);
    }

    public function get_university_lists($id){
        if($id == '1'){
            $universities = University::where(['uv_type'=>'public'])->get();
        }
        if($id == '3'){
            $universities = University::where(['uv_type'=>'private'])->get();
        }
        return response()->json([
            'status' => 'success',
            'universities' => $universities
        ], 200);
    }
}
