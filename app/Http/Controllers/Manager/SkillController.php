<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class SkillController extends Controller
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
        return view('Manager.skill.index');
    }

    public function getSkillData(Request $request)
    {

        $data = Skill::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('skill.edit', $row->id) . "
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
        return view('Manager.skill.add')
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
        Skill::create($data);
        Toastr::success(t('Success To Save Data'));
        return redirect()->route('skill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            Toastr::error(t("Not Found"));
            return redirect()->route('skill.index');
        }
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.skill.edit")
            ->with('validator', $validator)
            ->with('skill', $skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            Toastr::error(t("Not Found"));
            return redirect()->route('skill.index');
        }

        $request->validate($this->validationRules);

        $data = $request->all();
        $skill->update($data);
        Toastr::success(t('Success To Update Data'));
        return redirect()->route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            Toastr::error(t("Not Found"));
            return redirect()->route('skill.index');
        }
        $skill->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('skill.index');
    }
}
