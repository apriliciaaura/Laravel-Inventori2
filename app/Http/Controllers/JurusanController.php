<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jurusan;
use App\Fakultas;

class JurusanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Jurusan::when($request->search, function($query) use($request){
            $query->where('nama_jurusan', 'LIKE', '%'.$request->search.'%')
             ->orWhere('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'id', '=', 'jurusan.fakultas_id')->orderBy('id', 'asc')->paginate(5);

        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $fakultas = Fakultas::all()->sortBy('nama_fakultas');
        return view('jurusan.create', compact('fakultas'));
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
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);
        $form_data = array(
            'nama_jurusan'    =>  $request->nama_jurusan,
            'fakultas_id'     =>  $request->fakultas_id,
        );

        Jurusan::create($form_data);
        return redirect()->route('jurusan.index')->with('success', 'Data Added Successfully.');
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
        $fakultas = Fakultas::all()->sortBy('nama_fakultas');

        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', compact('jurusan'))->with('fakultas', $fakultas);
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
            'nama_jurusan' => 'required',
            'fakultas_id' => 'required',
        ]);

        $jurusan = Jurusan::find($id);
        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->fakultas_id = $request->input('fakultas_id');
        $jurusan->save();
       return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Jurusan::whereId($id)->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data is successfully deleted ');
    }
}
