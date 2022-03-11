<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_supplier' => 'required|max:255',
            'no_telephone' => 'required',
            'alamat' => 'required',
        ];

        $message = [
            'nama_supplier.required' => 'nama supplier harus di isi',
            'nama_supplier.max' => 'nama supplier maksimal 255 karakter',
            'no_telephone.required' => 'no_telephone harus di isi',
            'alamat.required' => 'alamat harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telephone = $request->no_telephone;
        $supplier->alamat = $request->alamat;
        $supplier->save();
        Alert::success('Bagus Sekali', 'Data berhasil disimpan');
        return redirect()->route('supplier.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_supplier' => 'required|max:255',
            'no_telephone' => 'required',
            'alamat' => 'required',
        ];

        $message = [
            'nama_supplier.required' => 'nama supplier harus di isi',
            'nama_supplier.max' => 'nama supplier maksimal 255 karakter',
            'no_telephone.required' => 'no_telephone harus di isi',
            'alamat.required' => 'alamat harus di isi',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Maaf', 'Data yang anda input tidak valid, silahkan input ulang')->autoclose(4000);
            return back()->withErrors($validation)->withInput();
        }
        $supplier = Supplier::findeOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telephone = $request->no_telephone;
        $supplier->alamat = $request->alamat;
        $supplier->save();
        Alert::success('Bagus Sekali', 'Data berhasil diupdate');
        return redirect()->route('supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Supplier::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Bagus Sekali', 'Data berhasil dihapus');
        return redirect()->route('supplier.index');
    }
}
