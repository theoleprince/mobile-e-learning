<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Role;
use App\Permission;
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Assistan\Story;
use App\Mail\MailUser;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Notif;
use App\Notifications\NotifMailChanged;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /* $user = User::latest()->get();
        foreach ($user as $value) {
            $value->avatar = url($value->avatar);
        }
        return $user; */

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user = User::Where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::latest()->paginate($perPage);
        }

        $ariane = ['user'];
        return view('admin.user.index', compact('user','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['user','Ajouter'];
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.create',compact('ariane','roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
            //'roles' => 'required'
		]);
        $requestData = $request->all();
        //$roles = $request->roles;

        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }

        $random = str_shuffle('1234567890');
        $password = 'EBA@'.substr($random, 0, 4);
        $requestData['password'] = Hash::make($password);
        $user = User::create($requestData);
        $user->attachRole('user');

       /*  $role = ['roles'];
        if(isset($role)){
            if(array_values($role) == ('user')){
                $user->attachRole('user');
            }
            elseif(array_values($role) == ('formateur')){
                $user->attachRole(['user','formateur']);
            }
            else{
                $user->attachRole('administrator');
            }
        } */

        //return view('admin.user.create',compact('user','roles'));
        return $user;
        //return redirect('admin/user')->with('flash_message', 'Utilisateur  Ajouté Avec Succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/user')->with('flash_message', 'Utilisateur Supprimer avec Succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $id = Auth::user()->id;

        $user = User::whereId(Auth::user()->id)->first();
        $user->roles = Role::select('roles.*')
                    ->join('role_user','role_user.role_id','=','roles.id')
                    ->join('users','users.id','=','role_user.user_id')
                    ->where('users.id','=',$id)
                    ->get();

        $user->permissions = Permission::select('permissions.*')
                    ->join('permission_user','permission_user.permission_id','=','permissions.id')
                    ->join('users','users.id','=','permission_user.user_id')
                    ->where('users.id','=',$id)
                    ->get();

        $ariane = ['Profile'];
        return view('admin.user.profile', compact('user','ariane'));
    }

    public function edit($id)
    {
        $ariane = ['user','Modifier'];
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit',compact('ariane','roles','permissions','user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }
        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('admin/user')->with('flash_message', 'Modifier avec succes');
    }

    public function password(Request $request)
    {
        # code...
        $this->validate($request, [
            'password'  => 'required|confirmed|min:8',
            'oldpass'  => 'required',
            'email' => 'required|email'
        ]);
        $user = Auth::user();

        if($user->email != $request['email']){
            $this->validate($request, [
                'email' => 'unique:users'
            ]);
        }


        $requestData = $request->only('password','email');

        if(Hash::check($request->oldpass, $user->password)){
            $requestData['password'] = bcrypt($requestData['password']);
            $user->update($requestData);

            if($user->email != $requestData['email']){
                $data = [
                    'nom'=> $user->name,
                    'email'=> $requestData['email']
                ];
            }
            return back()->with('flash_message','Mise a jour effectué avec succes');
        }else{
            return back()->with('error_message','Mise a jour a echouer: erreur d\'authentification');
        }
    }
}
