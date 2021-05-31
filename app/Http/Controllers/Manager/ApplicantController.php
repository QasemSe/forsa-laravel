<?php


namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class ApplicantController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager');
    }


    public function index()
    {
        return view('Manager.applicant.index');
    }

    public function getApplicantData(Request $request)
    {

        $data = Applicant::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('company_name', function ($row) {
                $btn = "<a href='" . route('company.show', $row->post->company ? $row->post->company->id : '') . "'>
                    <span class='badge badge-secondary'>" . $row->company_name . "</span>
                </a>";
                return $btn;
            })


            ->addColumn('post_title', function ($row) {
                $btn = \Str::limit($row->post_title, 50);
                return $btn;
            })

            ->addColumn('user_name', function ($row) {
                $btn = "<a href='" . route('user.edit', $row->user ? $row->user->id : '') . "'>
                <span class='badge badge-secondary'>" . $row->user_name . "</span>
            </a>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('applicant.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                    href=" . route('applicant.show', $row->id) . "
                    class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                    <i class='fa fa-eye'></i>
                </a> ";

                return $btn;
            })
            ->rawColumns(['action', 'user_name', 'post_title', 'company_name', 'status_value', 'timeDate'])
            ->make(true);
    }


    public function  show($id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('applicant.index');
        }
        // to get companies user work in it
        $applicants_users = Applicant::where('status', 1)->where('user_id', $applicant->user_id)->get();

        return view("Manager.applicant.show")
            ->with('applicants_users', $applicants_users)
            ->with('applicant', $applicant);
    }


    public function edit($id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('applicant.index');
        }
        return view("Manager.applicant.edit")
            ->with('applicant', $applicant);
    }



    public function update(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('applicant.index');
        }
        $this->validate($request, [
            'status' => 'required|in:review,accepted,canceled'
        ]);

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('applicant.index');
    }



    public function status($id, Request $request)
    {
        $applicant = Applicant::where('post_id', $request->post_id)->where('id', $id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('applicant.index');
        }

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Chnage Status'));
        return redirect()->back();
    }
}
