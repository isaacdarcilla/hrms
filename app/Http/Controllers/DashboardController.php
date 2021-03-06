<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Notice;
use App\Models\Task;
use App\Models\Inquiry;
use App\Models\Profile;
use App\Models\InquiryReply;
use App\Models\Psipop;
use App\Models\Scholarship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return Inertia::render('Dashboard/Index',[
            'total' => [
                'employees' => Contact::count(),
                'jobs' => Job::count(),
                'applicants' => Applicant::count(),
                'staffs' => User::count(),
                'tasks' => Task::where('user_id', $user->id)->where('cleared_at', NULL)->count(),
                'teaching' => Profile::whereType('teaching')->count(),
                'non' => Profile::whereType('non-teaching')->count(),
                'permanent' => Contact::whereStatusOfAppointment('Permanent')->count(),
                'contractual' => Contact::whereStatusOfAppointment('Contractual')->count(),
                'psipop' => [
                    'filled' => Psipop::whereFilledPosition('1')->count(),
                    'unfilled' => Psipop::whereFilledPosition('0')->count(),
                    'pfilled' => Psipop::whereFilledPosition('1')->count() != 0 ? Psipop::whereFilledPosition('1')->count() / Psipop::count() * 100 : 0,
                    'punfilled' => Psipop::whereFilledPosition('0')->count() != 0 ? Psipop::whereFilledPosition('0')->count() / Psipop::count() * 100 : 0,
                    'retirees' =>  DB::select('select count(*) as total from psipops where birth_date < CURDATE() - INTERVAL 60 YEAR;'),
                    'retired' =>  DB::select('select count(*) as total from psipops where birth_date < CURDATE() - INTERVAL 65 YEAR;'),
                ],
                'scholarship_applications' => Scholarship::whereStatus('Pending')->count(),
                'scholarship_applications_accepted' => Scholarship::whereStatus('Approved')->count(),
                'scholarship_applications_declined' => Scholarship::whereStatus('Disapproved')->count(),
                'scholarship_applications_overall' => Scholarship::count(),
            ],
            'notices' => Notice::orderBy('created_at', 'DESC')->take(3)->get(),
            'jobs' => Job::orderBy('created_at', 'DESC')->take(3)->get(),
            'tasks' => Task::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get(),
            'inquiries' => DB::table('contacts')
                             ->join('inquiries', 'contacts.id', '=', 'inquiries.contact_id')
                             ->leftJoin('inquiry_replies', 'inquiries.id', '=', 'inquiry_replies.inquiry_id')
                             ->select('contacts.first_name', 'contacts.last_name', 'contacts.position', 'contacts.department', 'inquiries.*', 'inquiry_replies.reply')
                             ->where('inquiries.deleted_at', null)
                             ->orderBy('inquiries.created_at', 'DESC')
                             ->paginate(),
        ]);
    }

    public function reply()
    {
        $close = Request::input('close_inquiry');
        $hasReply = InquiryReply::where('inquiry_id', Request::input('inquiry_id'))->first();

        Request::validate([
            'reply' => ['required', 'min:6', 'max:255'],
        ]);

        if($close) {
            Inquiry::where('id', Request::input('inquiry_id'))->update([
                'status' => 'Close',
                'replied' => true,
            ]);
        } else {
            Inquiry::where('id', Request::input('inquiry_id'))->update([
                'replied' => true,
            ]);
        }

        if($hasReply) {
            InquiryReply::where('inquiry_id', Request::input('inquiry_id'))->update([
                'user_id' => Request::input('user_id'),
                'reply' => Request::input('reply'),
            ]);
        } else {
            InquiryReply::create([
                'user_id' => Request::input('user_id'),
                'inquiry_id' => Request::input('inquiry_id'),
                'reply' => Request::input('reply'),
            ]);
        }

        return Redirect::back()->with('success', 'Inquiry replied.');
    }
}
