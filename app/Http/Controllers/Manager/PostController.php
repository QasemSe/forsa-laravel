<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Post;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["title"] = 'required';
        $this->validationRules["company_id"] = 'required|exists:companies,id';
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d');
        $this->validationRules["skills_id"] = 'required|min:1|exists:skills,id';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.post.index');
    }

    public function getPostData(Request $request)
    {

        $data = Post::all();
        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('title', function ($row) {
                $btn = \Str::limit($row->title, 20);
                return $btn;
            })
            ->addColumn('applicants_count', function ($row) {
                $btn = "<a  href='" . route('post.show', $row->id) . "'>
                        <span class='badge badge-secondary'>" . $row->applicants->count() . "</span>
                    </a>";
                return $btn;
            })



            ->addColumn('company_name', function ($row) {
                $btn = "<a  href='" . route('company.show', $row->company->id) . "'>
                    <span class='badge badge-secondary'>" . $row->company_name . "</span>
                </a>";
                return $btn;
            })
            ->addColumn('action', function ($row) {

                $btn = '';


                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('post.show', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-eye'></i>
                    </a> ";

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('post.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='حذف'
                        type='button' name='delete' id='$row->id'
                        class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-trash-alt'></button>";


                return $btn;
            })
            ->rawColumns(['action', 'skills_count', 'title', 'status_value', 'applicants_count', 'company_name', 'timeDate'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $companies = Company::all();
        $skills = Skill::all();
        return view('Manager.post.add')
            ->with('companies', $companies)
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
        $request->validate($this->validationRules);
        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $post = Post::create($data);
        $post->skills()->sync($request->skills_id);

        Toastr::success(t('Success To Save Data'));
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
        }

        $applicants = Applicant::where('post_id', $post->id)->get();
        return view("Manager.post.show")
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
        $post = Post::find($id);
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
        }
        $companies = Company::all();
        $skills = Skill::all();
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d';
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.post.edit")
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
        $post = Post::find($id);
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
        }
        $this->validationRules["expire_date"] = 'required|date_format:Y-m-d';
        $request->validate($this->validationRules);

        $data = $request->all();
        $data['status'] = $request->get('status', 0);
        $post->update($data);
        $post->skills()->sync($request->skills_id);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
        }
        $post->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('post.index');
    }


    public function status($id)
    {
        $post = Post::find($id);
        if (!$post) {
            Toastr::error(t("Not Found"));
            return redirect()->route('post.index');
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
}
