<?php


namespace App\Http\Controllers\User;

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
        $this->middleware('auth');
    }

    public function index()
    {

        return view('User.applicant.index');
    }

    public function getApplicantData(Request $request)
    {

        $data = Applicant::where('user_id', Auth::user()->id)->get();
        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('post_title', function ($row) {
                $btn = \Str::limit($row->post_title, 50);
                return $btn;
            })

            ->addColumn('company_name', function ($row) {
                $btn = "<a href='" . route('me.applicant.show', $row->id) . "'>
                <span class='badge badge-secondary'>" . $row->company_name . "</span>
            </a>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                    href=" . route('me.applicant.show', $row->id) . "
                    class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                    <i class='fa fa-eye'></i>
                </a> ";

                return $btn;
            })
            ->rawColumns(['action', 'company_name', 'post_title', 'status_value', 'timeDate'])
            ->make(true);
    }


    public function  show($id)
    {
        $applicant = Applicant::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('me.applicant.index');
        }
        return view("User.applicant.show")
            ->with('applicant', $applicant);
    }


    public function edit($id)
    {
        $applicant = Applicant::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('me.applicant.index');
        }
        return view("User.applicant.edit")
            ->with('applicant', $applicant);
    }



    public function update(Request $request, $id)
    {
        $applicant = Applicant::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('me.applicant.index');
        }
        $this->validate($request, [
            'status' => 'required|in:review,accepted,canceled'
        ]);

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('me.applicant.index');
    }
}
