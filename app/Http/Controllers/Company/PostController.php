<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Post;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('company');
        $this->validationRules["title"] = 'required';
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d');
        $this->validationRules["skills_id"] = 'required|min:1|exists:skills,id';
        $this->validationRules["description"] = 'required';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Company.post.index');
    }

    public function getPostData(Request $request)
    {

        $data = Post::where('company_id', Auth::guard('company')->user()->id)->get();
        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('title', function ($row) {
                $btn = \Str::limit($row->title, 20);
                return $btn;
            })
            ->addColumn('applicants_count', function ($row) {
                $btn = "<a  href='" . route('myCompany.post.show', $row->id) . "'>
                        <span class='badge badge-secondary'>" . $row->applicants->count() . "</span>
                    </a>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';

                if (Auth::guard('company')->user()->status == 0) {
                    $btn .= "<a class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm disabled'>
                        <i class='fa fa-eye'></i>
                    </a> ";

                    $btn .= "<a  class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm disabled'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                    $btn .= "<button type='button' disabled
                        class='btn btn-outline-primary btn-sm  btn-icon btn-icon-sm disabled'>
                        <i class='fa fa-trash-alt'></button>";
                }else {
                    $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='" . t('Show Applicant') . "'
                        href=" . route('myCompany.post.show', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-eye'></i>
                    </a> ";

                    $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='" . t('Edit') . "'
                        href=" . route('myCompany.post.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                    $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='" . t('Delete') . "'
                        type='button' name='delete' id='$row->id'
                        class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-trash-alt'></button>";
                }



                return $btn;
            })
            ->rawColumns(['action', 'skills_count', 'title', 'status_value', 'applicants_count', 'timeDate'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::warning(t('The Company Status is inActive'));
            return redirect()->back();
        }

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $skills = Skill::all();
        return view('Company.post.add')
            ->with('skills', $skills)
            ->with('validator', $validator);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::warning(t('The Company Status is inActive'));
            return redirect()->back();
        }

        $request->validate($this->validationRules);
        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $data['company_id'] =  Auth::guard('company')->user()->id;
        $post = Post::create($data);
        $post->skills()->sync($request->skills_id);

        Toastr::success(t('Success To Save Data'));
        return redirect()->route('myCompany.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::warning(t('The Company Status is inActive'));
            return redirect()->back();
        }
        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }

        $applicants = Applicant::where('post_id', $post->id)->get();
        return view("Company.post.show")
            ->with('applicants', $applicants)
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::warning(t('The Company Status is inActive'));
            return redirect()->back();
        }

        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }
        $companies = Company::all();
        $skills = Skill::all();
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d');
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Company.post.edit")
            ->with('validator', $validator)
            ->with('skills', $skills)
            ->with('companies', $companies)
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::warning(t('The Company Status is inActive'));
            return redirect()->back();
        }

        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d');
        $request->validate($this->validationRules);

        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $data['company_id'] =  Auth::guard('company')->user()->id;
        $post->update($data);
        $post->skills()->sync($request->skills_id);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('myCompany.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        if (Auth::guard('company')->user()->status == 0) {
            Toastr::success(t('The Company Status is inActive'));
            return redirect()->back();
        }

        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }
        $post->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('myCompany.post.index');
    }


    public function status($id)
    {
        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }
        if ($post->status == 1) {
            $post->update([
                'status' => 0,
            ]);
        } else {
            $post->update([
                'status' => 1,
            ]);
        }

        Toastr::success(t('Success To Chnage Status'));
        return redirect()->back();
    }


    public function ApplicantStatus($id, Request $request)
    {
        $post = Post::where('company_id', Auth::guard('company')->user()->id)->where('id', $request->post_id)->first();
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('myCompany.post.index');
        }

        $applicant = Applicant::where('post_id', $post->id)->where('id', $id)->first();

        if (!$applicant) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
        }

        $applicant->update([
            'status' => $request->status
        ]);

        Toastr::success(t('Success To Chnage Status'));
        return redirect()->back();
    }
}
