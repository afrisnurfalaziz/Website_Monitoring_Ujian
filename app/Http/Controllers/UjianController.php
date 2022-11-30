<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujians = Ujian::all()->sortByDesc('updated_at');

        return view('ujian.index', [
            'ujians' => $ujians,
            'menu' => 'ujian'
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
            'id_ujian' => ['required', 'unique:ujians'],
            'nama_ujian' => 'required',
            'kode_ujian' => ['required', 'unique:ujians'],
            'tanggal_ujian' => 'required',
        ]);
        $array = $request->only([
            'id_ujian', 'nama_ujian', 'kode_ujian', 'tanggal_ujian'
        ]);
        $ujians = Ujian::create($array);
        return redirect()->route('ujian.index')
            ->with('save_message', 'Data ujian baru telah berhasil disimpan.');
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
            'id_ujian' => ['required'],
            'nama_ujian' => 'required',
            'kode_ujian' => ['required'],
            'tanggal_ujian' => 'required',
        ]);

        $ujians = Ujian::find($id);
        $ujians->id_ujian = $request->id_ujian;
        $ujians->nama_ujian = $request->nama_ujian;
        $ujians->kode_ujian = $request->kode_ujian;
        $ujians->tanggal_ujian = $request->tanggal_ujian;
        $ujians->save();

        return redirect()->route('ujian.index')
            ->with('success_message', 'Data ujian telah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ujians = Ujian::find($id);
        if ($ujians) $ujians->delete();
        return redirect()->route('ujian.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
