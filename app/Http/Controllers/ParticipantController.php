<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Participant::all();

        return view('dataSiswa', [
            'siswas' => $siswas,
            'menu' => 'Data Siswa - Web Monitoring'
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $array = $request->only([
            'name', 'gender', 'phone', 'address', 'email'
        ]);
        $siswas = Participant::create($array);
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
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $siswas = Participant::find($id);
        $siswas->name = $request->name;
        $siswas->gender = $request->gender;
        $siswas->email = $request->email;
        $siswas->phone = $request->phone;
        $siswas->address = $request->address;
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
        $siswas = Participant::find($id);
        if ($siswas) $siswas->delete();
        return redirect()->route('siswa.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
