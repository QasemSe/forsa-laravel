<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CompanyLink;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:companies,email';
        $this->validationRules["password"] = 'required|min:6';
        $this->validationRules["profile_image"] = 'required|image';
        $this->validationRules["banner_image"] = 'nullable|image';
        $this->validationRules["mobile_number"] = 'required|numeric';
        $this->validationRules["address"] = 'nullable';
        $this->validationRules["state"] = 'nullable';
        $this->validationRules["description"] = 'nullable';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.company.index');
    }

    public function getCompanyData(Request $request)
    {

        $data = Company::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('profile_image', function ($row) {
                $btn = "<img width='50' class='img-thumbnail' height='50' src='" . $row->profile_image . "'>";
                return $btn;
            })

            ->addColumn('posts_count', function ($row) {
                $btn = "<a href='" . route('company.show', $row->id) . "'>
                    <span class='badge badge-primary'>" . $row->posts->count() . "</span>
                </a>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('company.show', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-eye'></i>
                    </a> ";

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('company.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='حذف'
                        type='button' name='delete' id='$row->id'
                        class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-trash-alt'></button>";


                return $btn;
            })
            ->rawColumns(['action', 'profile_image', 'posts_count', 'status_value', 'timeDate'])
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
        return view('Manager.company.add')
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

        $data['profile_image'] = $request->file('profile_image') ? $this->uploadImage($request->profile_image, 'company_image') : 'Backend/img/default.jpg';
        $data['banner_image'] = $request->file('banner_image') ? $this->uploadImage($request->banner_image, 'company_image') : 'Backend/img/default.jpg';
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : '';
        $data['status'] = $request->get('status', 0);
        $company  = Company::create($data);
        $data['company_id'] = $company->id;
        CompanyLink::create($data);

        Toastr::success(t('Success To Save Data'));
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            Toastr::error(t("Not Found"));
            return redirect()->route('company.index');
        }
        return view("Manager.company.show")
            ->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if (!$company) {
            Toastr::error(t("Not Found"));
            return redirect()->route('company.index');
        }
        $this->validationRules["profile_image"] = 'nullable';
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:companies,email,' . $id;

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.company.edit")
            ->with('validator', $validator)
            ->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        if (!$company) {
            Toastr::error(t("Not Found"));
            return redirect()->route('company.index');
        }
        $this->validationRules["profile_image"] = 'nullable';
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:companies,email,' . $id;
        $request->validate($this->validationRules);

        $data = $request->all();
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $company->password;

        if ($request->file('profile_image')) {
            $data['profile_image'] = $this->uploadImage($request->profile_image, 'company_image');
        }
        if ($request->file('banner_image')) {
            $data['banner_image'] = $this->uploadImage($request->banner_image, 'company_image');
        }
        $data['status'] = $request->get('status', 0);

        $company->update($data);

        $company->link->update($data);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $company = Company::find($id);
        if (!$company) {
            Toastr::error(t("Not Found"));
            return redirect()->route('company.index');
        }
        $company->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('company.index');
    }
}
