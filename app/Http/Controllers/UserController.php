<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $admins = User::all();

        return view('dataAdmin', [
            'admins' => $admins,
            'menu' => 'Data Admin - Proctor AI'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13', 'unique:users'],
            'role' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        $array = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),

        ]);

        // $admins = User::create($array);
        return redirect()->route('admin.index')
            ->with('save_message', 'Data admin baru telah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $admins = User::find($id);
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->phone = $request->phone;
        $admins->role = $request->role;
        $admins->save();

        return redirect()->route('admin.index')
            ->with('success_message', 'Data admin telah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $admins = User::find($id);
        if ($id == $request->user()->id)
            return redirect()->route('admin.index')
                ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');

        if ($admins) $admins->delete();
        return redirect()->route('admin.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
