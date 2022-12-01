<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();

        return view('admin.index', [
            'admins' => $admins,
            'menu' => 'admin'
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
            'nama_admin' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        $array = $request->only([
            'nama_admin', 'telepon', 'alamat', 'email'
        ]);
        $admins = User::create($array);
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
            'nama_admin' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
           ]);
    
           $admins = User::find($id);
           $admins->nama_admin = $request->nama_admin;
           $admins->telepon = $request->telepon;
           $admins->alamat = $request->alamat;
           $admins->email = $request->email;
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