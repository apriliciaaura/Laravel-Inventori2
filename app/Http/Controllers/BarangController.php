<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = Barang::where('nama_barang', 'like', '%' .$search. '%')->paginate(5);
        return view('barang.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all()->sortBy('nama_barang');
        return view('barang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        // $barang->updated_by = $request->updated_by;
        $barang->ruangan_id = $request->ruangan_id;
        $barang->save();

        return redirect()->route('barang.index');
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
        $ruangan = \App\Ruangan::all();
        $barang = Barang::findOrFail($id_barang);
        return view('barang.edit', compact('barang'))->with('ruangan', $ruangan);
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
        $barang = Barang::find($id_barang);
        $barang->nama_barang = $request->input('nama_barang');
        $barang->ruangan_id = $request->input('ruangan_id');
        $barang->total = $request->input('total');
        $barang->broken = $request->input('broken');
        $barang->created_by = $request->input('created_by');
        $barang->updated_by = $request->input('updated_by');
        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $data = Barang::findOrFail($id);
       $data->delete();
       return redirect()->route('barang.index');
    }
}
