<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Skill;
use App\Models\Specialize;
use App\Models\University;
use App\Models\User;
use App\Models\UserLink;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
        $this->validationRules["name"] = 'required';
        $this->validationRules["image"] = 'required';
        $this->validationRules["email"] = 'required|unique:users,email';
        $this->validationRules["password"] = 'required|min:6';
        $this->validationRules["mobile_number"] = 'nullable|numeric';
        $this->validationRules["avarage"] = 'nullable|numeric';
        $this->validationRules["specialize_id"] = 'nullable|exists:specializes,id';
        $this->validationRules["degree_id"] = 'nullable|exists:degrees,id';
        $this->validationRules["university_id"] = 'nullable|exists:universities,id';
        $this->validationRules["skills_id"] = 'nullable|min:1|exists:skills,id';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Manager.user.index');
    }

    public function getUserData(Request $request)
    {

        $data = User::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $btn = "<img width='50' class='img-thumbnail' height='50' src='" . $row->image . "'>";
                return $btn;
            })

            ->addColumn('applicants_count', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->applicants->count() . "</span>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';

                $btn .= "<a data-toggle='tooltip' data-placement='top' data-original-title='تعديل'
                        href=" . route('user.edit', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-edit'></i>
                    </a> ";

                $btn .= "<button data-toggle='tooltip' data-placement='top' data-original-title='حذف'
                        type='button' name='delete' id='$row->id'
                        class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fa fa-trash-alt'></button>";


                return $btn;
            })
            ->rawColumns(['action', 'image', 'applicants_count', 'timeDate'])
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
        $degrees = Degree::all();
        $universities = University::all();
        $specializes = Specialize::all();
        $skills = Skill::all();
        return view('Manager.user.add')
            ->with('degrees', $degrees)
            ->with('universities', $universities)
            ->with('specializes', $specializes)
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

        $data['image'] = $request->file('image') ? $this->uploadImage($request->image, 'users_image') : 'Backend/img/default.jpg';
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : '';
        $user  = User::create($data);
        $data['user_id'] = $user->id;
        UserLink::create($data);

        $user->skills()->sync($request->skills_id);
        Toastr::success(t('Success To Save Data'));
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error(t("Not Found"));
            return redirect()->route('user.index');
        }
        $this->validationRules["image"] = 'nullable';
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:users,email,' . $id;

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $degrees = Degree::all();
        $universities = University::all();
        $specializes = Specialize::all();
        $skills = Skill::all();
        return view("Manager.user.edit")
            ->with('validator', $validator)
            ->with('degrees', $degrees)
            ->with('universities', $universities)
            ->with('specializes', $specializes)
            ->with('skills', $skills)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error(t("Not Found"));
            return redirect()->route('user.index');
        }
        $this->validationRules["image"] = 'nullable';
        $this->validationRules["password"] = 'nullable|min:6';
        $this->validationRules["email"] = 'required|unique:users,email,' . $id;
        $request->validate($this->validationRules);

        $data = $request->all();
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;
        if ($request->file('image')) {
            $data['image'] = $this->uploadImage($request->image, 'users_image');
        }
        $user->update($data);
        if ($user->link) {
            $user->link->update($data);
        } else {
            $data['user_id'] = $user->id;
            UserLink::create($data);
        }


        $user->skills()->sync($request->skills_id);

        Toastr::success(t('Success To Update Data'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error(t("Not Found"));
            return redirect()->route('user.index');
        }
        $user->delete();
        Toastr::success(t('Success To Delete Data'));
        return redirect()->route('user.index');
    }
}
