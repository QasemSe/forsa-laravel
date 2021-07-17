<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class UniversityController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["name"] = 'required|unique:universities,name';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.university.index');
    }

    public function getUniversityData(Request $request)
    {

        $data = University::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('university.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='حذف'
                        type='button' name='delete' id='$row->id'
                        class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-trash-alt'></button>";


                return $btn;
            })
            ->rawColumns(['action', 'timeDate'])
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
        return view('Manager.university.add')
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
        University::create($data);
        Toastr::success(t('Success To Save Data'));
        return redirect()->route('university.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\University $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\University $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);
        if (!$university) {
            Toastr::error(t("Not Found"));
            return redirect()->route('university.index');
        }
        $this->validationRules["name"] = 'required|unique:universities,name,' .$id.',id';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.university.edit")
            ->with('validator', $validator)
            ->with('university', $university);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\University $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $university = University::find($id);
        if (!$university) {
            Toastr::error(t("Not Found"));
            return redirect()->route('university.index');
        }
        $this->validationRules["name"] = 'required|unique:universities,name,' .$id.',id';
        $request->validate($this->validationRules);

        $data = $request->all();
        $university->update($data);
        Toastr::success(t('Success To Update Data'));
        return redirect()->route('university.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\University $university
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $university = University::find($id);
        if (!$university) {
            Toastr::error(t("Not Found"));
            return redirect()->route('university.index');
        }
        $university->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('university.index');
    }
}
