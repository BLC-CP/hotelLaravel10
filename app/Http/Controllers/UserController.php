<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $dUser = User::orderBy('created_at', 'DESC')->get();
        return view('user.index', [
            'title' => 'Pagina User',
            'active' => 'user',
            'data' => $dUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create', [
            'title' => 'Form Aumenta Dadus User',
            'active' => 'user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrn_user' => 'required',
            'email' => 'required|email:dns|unique:users',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'password' => 'required|min:5'
        ], [
            'nrn_user.required' => 'Naran Tenke Priense',
            'email.required' => 'Email Tenke Priense',
            'email.email' => 'Tenke Priense Email Nebe Mak Los',
            'email.unique' => 'Email Uja tiha Ona',
            'image.required' => 'Hili Ita Boot Nia Foto Lai',
            'image.mimes' => 'Tipu Files Tenke Imagen',
            'image.max' => 'image Nia Kapasita Labele Liu 2mb',
            'password' => 'Password Tenke Priense',
            'password.min' => 'Password Minimu 5'
        ]);


        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('userProfile'), $imageName);

        $data['name'] = $request->nrn_user;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['image'] = $imageName;

        User::create($data);

        return redirect()->route('user.index')->with('status', 'User Registu ho Successu');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dd = User::findOrFail($id);
        return view('user.edit', [
            'title' => 'Form Hadia Dadus User',
            'active' => 'user',
            'data' => $dd
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        $request->validate([
            'nrn_user' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'password' => 'min:5',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048',],
        ]);
    
        $user->name = $request->nrn_user;
        $user->email = $request->email;
        $user->password = $request->password;
    
        if ($request->hasFile('image')) {
            if (!is_null($user->image)) {
                unlink(public_path('userProfile/' . $user->image));
            }
            // Proses upload dan penggantian gambar baru
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('userProfile'), $imageName);
            $user->image = $imageName;
        }
    
        $user->save();

    return redirect()->route('user.index')->with('status', 'Dadus Hamos Ona');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user->image)) {
            $imagePath = public_path('userProfile/' . $user->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $user->delete();
            return redirect()->route('user.index')->with('status', 'Dadus Hamos Ona');
        }

}
