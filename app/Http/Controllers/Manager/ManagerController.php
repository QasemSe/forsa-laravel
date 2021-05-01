<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:managers,email';
        $this->validationRules["password"] = 'required|min:6';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.manager.index');
    }


    public function getManagerData(Request $request)
    {

        $data = Manager::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('manager.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                // $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='حذف'
                //         type='button' name='delete' id='$row->id'
                //         class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                //         <i class='fa fa-trash-alt'></button>";


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
        return view('Manager.manager.add')
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
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : '';
        Manager::create($data);
        Toastr::success(t('Success To Save Data'));
        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            Toastr::error(t("Not Found"));
            return redirect()->route('manager.index');
        }
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:managers,email,' . $id;
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.manager.edit")
            ->with('validator', $validator)
            ->with('manager', $manager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            Toastr::error(t("Not Found"));
            return redirect()->route('manager.index');
        }

        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:managers,email,' . $id;

        $request->validate($this->validationRules);

        $data = $request->all();
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $manager->password;
        $manager->update($data);
        Toastr::success(t('Success To Update Data'));
        return redirect()->route('manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $manager = Manager::find($id);
        if (!$manager) {
            Toastr::error(t("Not Found"));
            return redirect()->route('manager.index');
        }
        $manager->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('manager.index');
    }
}
