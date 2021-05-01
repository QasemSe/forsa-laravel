<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Specialize;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class SpecializeController extends Controller
{

    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["name"] = 'required';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.specialize.index');
    }

    public function getSpecializeData(Request $request)
    {

        $data = Specialize::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('specialize.edit', $row->id) . "
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
        return view('Manager.specialize.add')
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
        Specialize::create($data);
        Toastr::success(t('Success To Save Data'));
        return redirect()->route('specialize.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Specialize $specialize
     * @return \Illuminate\Http\Response
     */
    public function show(Specialize $specialize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Specialize $specialize
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialize = Specialize::find($id);
        if (!$specialize) {
            Toastr::error(t("Not Found"));
            return redirect()->route('specialize.index');
        }
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.specialize.edit")
            ->with('validator', $validator)
            ->with('specialize', $specialize);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Specialize $specialize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $specialize = Specialize::find($id);
        if (!$specialize) {
            Toastr::error(t("Not Found"));
            return redirect()->route('specialize.index');
        }

        $request->validate($this->validationRules);

        $data = $request->all();
        $specialize->update($data);
        Toastr::success(t('Success To Update Data'));
        return redirect()->route('specialize.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Specialize $specialize
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $specialize = Specialize::find($id);
        if (!$specialize) {
            Toastr::error(t("Not Found"));
            return redirect()->route('specialize.index');
        }
        $specialize->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('specialize.index');
    }
}
