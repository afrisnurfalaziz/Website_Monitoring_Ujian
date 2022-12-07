<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamReg;
use App\Models\Participant;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all()->sortByDesc('updated_at');

        return view('dataUjian', [
            'exams' => $exams,
            'menu' => 'Data Ujian - Web Monitoring'
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
            // 'id_ujian' => ['required', 'unique:exams'],
            'exam_name' => 'required',
            'exam_code' => ['required', 'unique:exams'],
            'exam_date' => 'required',
        ]);
        $array = $request->only([
             'exam_name', 'exam_code', 'exam_date'
        ]);
        $exams = Exam::create($array);
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
        $pesertaUjian = ExamReg::where('exam_id', $id)->get()->sortByDesc('updated_at');
        $peserta = Participant::all()->sortByDesc('updated_at');

        return view('pesertaUjian', [
            'pesertaUjian' => $pesertaUjian,
            'peserta' => $peserta,
            'menu' => 'Peserta Ujian - Web Monitoring'
        ]);
    }

    public function addParticipant()
    {

        return view('pesertaUjian', [
            'menu' => 'Peserta Ujian - Web Monitoring'
        ]);
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
            // 'id_ujian' => ['required'],
            'exam_name' => 'required',
            'exam_code' => ['required'],
            'exam_date' => 'required',
        ]);

        $exams = Exam::find($id);
        // $exams->id_ujian = $request->id_ujian;
        $exams->exam_name = $request->exam_name;
        $exams->exam_code = $request->exam_code;
        $exams->exam_date = $request->exam_date;
        $exams->save();

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
        $exams = Exam::find($id);
        if ($exams) $exams->delete();
        return redirect()->route('ujian.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
