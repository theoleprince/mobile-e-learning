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

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user = User::select('users.*')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','role_user.role_id','=','roles.id')
                ->Where('roles.name', '!=', 'user')
                ->Where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::select('users.*','roles.name as _role')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','role_user.role_id','=','roles.id')
                ->Where('roles.name', '!=', 'user')
                ->latest()->paginate($perPage);
        }

         foreach ($user as $value) {
            $value->avatar = url('storage/'.$value->avatar);
        }

        return view('admin.formateur.index', compact('user'));
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
        return view('admin.formateur.create',compact('ariane','roles','permissions'));
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
            'roles' => 'required'
		]);
        $requestData = $request->all();
        $roles = $request->roles;
        //$permissions = $request->permissions;

        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }
       /*  $random = str_shuffle('1234567890');
        $password = 'EBA@'.substr($random, 0, 4); */
        //$requestData['password'] = Hash::make($password);
        //$requestData['is_active'] = true;
        $requestData['password'] = Hash::make($request->password);
        $user = User::create($requestData);
       // $user->attachRole('formateur');

       /*  $data = [
            'nom'=> $user->name,
            'mot'=> $password,
            'login'=>$user->email
        ]; */

        $role = ['roles'];
        if(isset($role)){
            if(array_values($role) == ('user')){
                $user->attachRole('user');
            }
            elseif(array_values($role) == ('formateur')){
                $user->attachRole('formateur');
            }
            else{
                $user->attachRole('administrator');
            }
        }

        //return view('admin.formateur.create',compact('user','roles'));
        return redirect('admin/formateur')->with('flash_message', 'Utilisateur  Ajouté Avec Succes!');
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
        $user = User::select('users.*')
                ->where('users.id','=',$id)
                ->first();
        $user->avatar = url('storage/'.$user->avatar);


        return view('admin.formateur.show', compact('user'));
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

        return redirect('admin/formateur')->with('flash_message', 'Formation deleted!');
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
        return view('admin.formateur.profile', compact('user','ariane'));
    }

    public function edit($id)
    {
        $ariane = ['user','Modifier'];
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.formateur.edit',compact('ariane','roles','permissions','user'));
    }

    public function update(Request $request,$id)
    {
        # code...
       /*  $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email'
        ]); */
        $user = User::findOrFail($id);

        $requestData = $request->all();
        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }
         if($requestData['name']) $user->name = $requestData['name'];
        if($requestData['email']){
            if($requestData['email']!=$user->email) $user->email = $requestData['email'];
        } 
        if($requestData['prenom']) $user->prenom = $requestData['prenom'];
       
        if($requestData['lieu_naissance']) $user->lieu_naissance = $requestData['lieu_naissance'];
        if($requestData['date_naissance']) $user->date_naissance = $requestData['date_naissance'];
        if($requestData['sexe']) $user->sexe = $requestData['sexe'];
        $user->update($requestData);

        return redirect('admin/formateur')->with('flash_message', 'Utilisateur  Modifie Avec Succes!');
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