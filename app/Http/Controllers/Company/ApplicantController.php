<?php


namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    public function __construct()
    {
        $this->middleware('company');
    }

    public function index()
    {

        return view('Company.applicant.index');
    }

    public function getApplicantData(Request $request)
    {

        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $data = Applicant::whereIn('post_id', $posts)->get();
        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('post_title', function ($row) {
                $btn = \Str::limit($row->post_title, 50);
                return $btn;
            })

            ->addColumn('user_name', function ($row) {
                $btn = "<a href='" . route('myCompany.applicant.show', $row->id) . "'>
                <span class='badge badge-secondary'>" . $row->user_name . "</span>
            </a>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('myCompany.applicant.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                    href=" . route('myCompany.applicant.show', $row->id) . "
                    class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                    <i class='fa fa-eye'></i>
                </a> ";

                return $btn;
            })
            ->rawColumns(['action', 'user_name', 'post_title', 'status_value', 'timeDate'])
            ->make(true);
    }


    public function  show($id)
    {
        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $applicant = Applicant::whereIn('post_id', $posts)->where('id', $id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.applicant.index');
        }
        return view("Company.applicant.show")
            ->with('applicant', $applicant);
    }


    public function edit($id)
    {
        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $applicant = Applicant::whereIn('post_id', $posts)->where('id', $id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.applicant.index');
        }
        return view("Company.applicant.edit")
            ->with('applicant', $applicant);
    }



    public function update(Request $request, $id)
    {
        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $applicant = Applicant::whereIn('post_id', $posts)->where('id', $id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.applicant.index');
        }
        $this->validate($request, [
            'status' => 'required|in:review,accepted,canceled'
        ]);

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('myCompany.applicant.index');
    }



    public function status($id, Request $request)
    {
        $posts = Post::where('company_id', Auth::guard('company')->user()->id)->pluck('id');
        $applicant = Applicant::whereIn('post_id', $posts)->where('id', $id)->where('post_id', $request->post_id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.applicant.index');
        }

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Chnage Status'));
        return redirect()->back();
    }
}
