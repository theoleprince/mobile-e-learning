<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Formation;
use App\Models\UserFormat;
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
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user = User::select('users.*','formations.nom as _formation')
                ->join('formations','formations.id','=','users.formation_id')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','role_user.role_id','=','roles.id')
                ->Where('roles.name', '=', 'user')
                ->Where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::select('users.*','formations.nom as _formation','roles.name as role')
            ->join('user_formats','users.id','=','user_formats.user_id')
            ->join('formations','user_formats.formation_id','=','formations.id')

            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->Where('roles.name', '=', 'user')
            ->latest()->paginate($perPage);
        }
        foreach ($user as $value) {
            $value->avatar = url('storage/'.$value->avatar);
        }
        //return $user;

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $formation = Formation::all();
        $ariane = ['user','Ajouter'];
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.create',compact('formation','ariane','roles','permissions'));
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

        
        $formation = Formation::all();

        $this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
        ]);
        $random = str_shuffle('1234567890');
        $ref = substr($random, 0, 4);

        $requestData = $request->all();
        $formation_id = $request->formation_id;

        if ($request->hasFile('avatar')) {
            $requestData['avatar'] = $request->file('avatar')
            ->store('uploads', 'public');
        }

        //if($requestData['password']) $password = $requestData['password'];
            

        
        $requestData['ref'] = $ref;
        $requestData['slug'] = $formation_id;
        $requestData['password'] = Hash::make($request->password);
        $user = User::create($requestData);
        $user->attachRole('user');

        $data = [
            'formation_id' => $formation_id,
            'user_id' => $user->id
        ]; 
 
        $userFormation=UserFormat::create($data);

        //return view('admin.client.inscriptionUser',compact('formation'));
        //return $requestData;
        return redirect('admin/user')->with('flash_message', 'Utilisateur  Ajouté Avec Succes!');
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
        $user = User::select('users.*','formations.nom as _nom')
                    ->join('user_formats','users.id','=','user_formats.user_id')
                    ->join('formations','user_formats.formation_id','=','formations.id')                    
                    ->where('users.id','=',$id)
                    ->first();
        $user->avatar = url('storage/'.$user->avatar);


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
        $formation = Formation::all();
        $ariane = ['user','Modifier'];
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit',compact('ariane','roles','permissions','user','formation'));
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::all();
        $user = User::findOrFail($id);
        /* $users->user = $user;
        $users->formation = $formation; */

        $slug = $user->slug;
        $requestData = $request->all();
        $formation_id = $request->formation_id;
        $requestData['slug'] = $formation_id;



        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')
            ->store('uploads', 'public');
        }

        if($requestData['name']) $user->name = $requestData['name'];
        if($requestData['email']){
            if($requestData['email']!=$user->email) $user->email = $requestData['email'];
        } 
        if($requestData['prenom']) $user->prenom = $requestData['prenom'];
       
        if($requestData['od']) $user->od = $requestData['od'];
        if($requestData['probleme']) $user->probleme = $requestData['probleme'];
        if($requestData['lieu_naissance']) $user->lieu_naissance = $requestData['lieu_naissance'];
        if($requestData['date_naissance']) $user->date_naissance = $requestData['date_naissance'];
        if($requestData['sexe']) $user->sexe = $requestData['sexe'];
        if($requestData['slug']) $user->slug = $requestData['slug'];

        $user->update();
        
         $data = [
            'formation_id' => $formation_id,
            'user_id' => $user->id
        ]; 

        $idUserFormation = UserFormat::select(
            'user_formats.*'
            )
            ->whereUserId($id)
            ->whereFormationId($slug)
            ->first();

        if($data['formation_id']) $idUserFormation->formation_id = $data['formation_id'];
        if($data['user_id']) $idUserFormation->user_id = $data['user_id'];
 
        $idUserFormation->update();
        //return view('admin.user.index', compact('user'));
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