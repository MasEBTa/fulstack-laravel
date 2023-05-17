<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Nilai;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::with('nilais')->get();
        return response()->json($peserta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'    => ['required', 'min:5'],
            'email'   => ['required','unique:pesertas'],
            'nilaiX'  => ['required', 'numeric', 'min:1', 'max:33'],
            'nilaiY'  => ['required', 'numeric', 'min:1', 'max:23'],
            'nilaiY'  => ['required', 'numeric', 'min:1', 'max:18'],
            'nilaiW'  => ['required', 'numeric', 'min:1', 'max:13'],
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        } else {
            // Simpan data ke database peserta
            $peserta = new Peserta;
            $peserta->nama = $request->input('nama');
            $peserta->email = $request->input('email');
            $peserta->save();
            // simpan ke database nilai
            $id = DB::table('pesertas')->orderByDesc('id')->value('id');

            // simpan nilai
            $nilai = new Nilai;
            $nilai->nilai_x	= $request->input('nilaiX');
            $nilai->nilai_y	= $request->input('nilaiY');
            $nilai->nilai_z	= $request->input('nilaiZ');
            $nilai->nilai_w	= $request->input('nilaiW');
            $nilai->user_id	= $id;
            $nilai->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = Peserta::join('nilais', 'pesertas.id', '=', 'nilais.user_id')
                    ->select('pesertas.*', 'nilais.*')
                    ->where('pesertas.id', $id)
                    ->first();

        if (!$peserta) {
            $peserta = $arrayName = array('keterangan' => 'tidak ditemukan', 'status' => null);
        }
        return $peserta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $peserta = Peserta::find($id);
        if ($request->nama != null) {
            $peserta->nama = $request->nama;
        }
        if ($request->email != null) {
            $peserta->email = $request->email;
        }
        $nilai = Nilai::where('user_id', '=', $id)->get()[0];
        if ($request->nilaiX != null) {
            $nilai->nilai_x = $request->nilaiX;
        }
        if ($request->nilaiY != null) {
            $nilai->nilai_y = $request->nilaiY;
        }
        if ($request->nilaiZ != null) {
            $nilai->nilai_z = $request->nilaiZ;
        }
        if ($request->nilaiW != null) {
            $nilai->nilai_w = $request->nilaiW;
        }
        $peserta->update();
        $nilai->update();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::where('user_id', '=', $id)->get()[0];
        $user = Peserta::find($id);
        // return $nilai;
        $nilai->delete();
        $user->delete();
        return 'success';
    }
}
