<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(    )
    {
        $siswas = Siswa::all();

        return view('siswa.index', [
            'siswas' => $siswas,
            'menu' => 'siswa'
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
            'nomer_induk' => ['required', 'unique:siswas'],
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        $array = $request->only([
            'nomer_induk', 'nama_siswa', 'jenis_kelamin', 'telepon', 'alamat', 'email'
        ]);
        $siswas = Siswa::create($array);
        return redirect()->route('siswa.index')
            ->with('save_message', 'Data siswa baru telah berhasil disimpan.');
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
        'nomer_induk' => ['required'],
        'nama_siswa' => 'required',
        'jenis_kelamin' => 'required',
        'telepon' => 'required',
        'alamat' => 'required',
        'email' => 'required',
       ]);

       $siswas = Siswa::find($id);
       $siswas->nomer_induk = $request->nomer_induk;
       $siswas->nama_siswa = $request->nama_siswa;
       $siswas->jenis_kelamin = $request->jenis_kelamin;
       $siswas->telepon = $request->telepon;
       $siswas->alamat = $request->alamat;
       $siswas->email = $request->email;
       $siswas->save();

       return redirect()->route('siswa.index')
            ->with('success_message', 'Data siswa telah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswas = Siswa::find($id);
        if ($siswas) $siswas->delete();
        return redirect()->route('siswa.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
