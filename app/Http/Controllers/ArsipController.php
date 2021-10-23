<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsips = Arsip::all();
        return view('arsip.index', compact('arsips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('arsip.create_arsip', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required',
            'judul' => 'required',
            'file_surat' => 'required',
            'category_id' =>'required',
        ]);
        // dd($request->product_category);
        if($request->file('file_surat')){
            $surat_file = $validatedData['file_surat'];
            $surat_name =  time() . ".". $surat_file->getClientOriginalExtension();
            $path = public_path('/uploads/file-surat/');
            $surat_file->move($path, $surat_name);
            $arisp_surat = '/uploads/file-surat/' . $surat_name;
        }
        Arsip::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'file_surat' => $arisp_surat,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('arsip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = Arsip::find($id);
        return view('arsip.show_arsip', compact('arsip'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
