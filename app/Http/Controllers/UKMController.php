<?php


namespace App\Http\Controllers;

use App\Models\UKM;
use Illuminate\Http\Request;

class UKMController extends Controller
{
    public function index()
    {
        $ukms = UKM::all();
        return view('ukm.index', compact('ukms'));
    }

    public function create()
    {
        return view('ukm.create');
    }

    public function edit(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
    ]);

    $ukm = UKM::findOrFail($id);
    $data = $request->only('nama', 'deskripsi');

    if ($request->hasFile('logo')) {
        // Hapus logo lama jika ada
        if ($ukm->logo) {
            \Storage::delete('public/' . $ukm->logo);
        }
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $ukm->update($data);

    return redirect()->route('ukm.index')->with('success', 'UKM berhasil diperbarui');
}

    public function destroy($id)
{
    $ukm = UKM::findOrFail($id);
    $ukm->delete();

    return redirect()->route('ukm.index')->with('success', 'UKM berhasil dihapus');
}

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
    ]);

    $data = $request->only('nama', 'deskripsi');

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    UKM::create($data);

    return redirect()->route('ukm.index')->with('success', 'UKM berhasil ditambahkan');
}


    // edit, update, destroy bisa ditambahkan nanti
}