<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ruangan;
use App\Jurusan;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = Ruangan::where('nama_ruangan', 'like', '%' .$search. '%')->paginate(5);
        return view('ruangan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all()->sortBy('nama_jurusan');
        return view('ruangan.create', compact('jurusan'));
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
            'nama_ruangan' => 'required',
            'jurusan_id' => 'required',
        ]);
        $form_data = array(
            'nama_ruangan'    =>  $request->nama_ruangan,
            'jurusan_id'     =>  $request->jurusan_id,
        );

        Ruangan::create($form_data);
        return redirect()->route('ruangan.index')->with('success', 'Data Added Successfully.');
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
        $jurusan = Jurusan::all()->sortBy('nama_jurusan');

        $data = Ruangan::find($id);
        return view('ruangan.edit', compact('data'))->with('jurusan', $jurusan);
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
            'nama_ruangan' => 'required',
            'jurusan_id' => 'required',
        ]);

        $ruangan = Ruangan::find($id);
        $ruangan->nama_ruangan = $request->input('nama_ruangan');
        $ruangan->jurusan_id = $request->input('jurusan_id');
        $ruangan->save();
       return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Ruangan::whereId($id)->delete();
        return redirect()->route('ruangan.index');
    }
}
