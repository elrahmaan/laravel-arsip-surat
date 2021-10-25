<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Arsip;
use App\Models\Category;

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
            $surat_name =  time(). "-". $surat_file->getClientOriginalName() . ".". $surat_file->getClientOriginalExtension();
            $path = public_path('/uploads/file-surat/');
            $surat_file->move($path, $surat_name);
            $arsip_surat = '/uploads/file-surat/' . $surat_name;
        }
        Arsip::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'file_surat' => $arsip_surat,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diarsipkan');
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
        $arsip = Arsip::find($id);
        $categories = Category::all();
        return view('arsip.edit_arsip', compact('arsip', 'categories'));
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
        $rules = [
            'nomor' => 'required',
            'judul' => 'required',
            'file_surat' => 'required',
            'category_id' =>'required'
        ];
        $validatedData = $request->validate($rules);
        // dd($request->file_surat);
        $surat_file = $validatedData['file_surat'];

        if ($surat_file) {
            // cek file yang ada didatabase apakah terdapat gambar / tidak, jika ada hapus
            if($request->old_file){
                File::delete(public_path($request->old_file));
            }
            // menyimpan data file yang diupload ke variabel $file
            $surat_name =  time(). "-". $surat_file->getClientOriginalName() . ".". $surat_file->getClientOriginalExtension();
            // isi dengan nama folder tempat kemana file diupload

            $path = public_path('/uploads/file-surat/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $surat_file->move($path, $surat_name);
            $arsip_surat = '/uploads/file-surat/' . $surat_name;
            
        }
        $validatedData['nomor'] = $request->nomor;
        $validatedData['judul'] = $request->judul;
        $validatedData['file_surat'] = $arsip_surat;
        $validatedData['category_id'] = $request->category_id;
        Arsip::where('id', $id)->update($validatedData);

        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        if ($arsip->file_surat) {
            File::delete(public_path($arsip->file_surat));
            // unlink($file_path);
        }
        $arsip->delete();
        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil dihapus');
    }
    public function download($id)
    {
        $arsip = Arsip::find($id);
        $url = $arsip->file_surat;


        return response()->download(public_path($url));
        
        
    }
}
