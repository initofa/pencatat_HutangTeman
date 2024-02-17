<?php

namespace App\Http\Controllers;

use App\Models\HutangTeman;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HutangTemanController extends Controller
{    
    public function index(): View
    {
        $hutangTemans = HutangTeman::latest()->paginate(10);
        return view('hutangtemans.index', compact('hutangTemans'));
    }

    public function create(): View
    {
        return view('hutangtemans.create');
    }
 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_teman' => 'required|min:3',
            'bukti_transaksi' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal_peminjaman' => 'required',
            'keterangan' => 'nullable'
        ]);

        $buktiTransaksi = $request->file('bukti_transaksi');
        $buktiTransaksi->storeAs('public/hutangtemans', $buktiTransaksi->hashName());

        HutangTeman::create([
            'nama_teman' => $request->nama_teman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'bukti_transaksi' => $buktiTransaksi->hashName(),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('hutangtemans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    public function show(string $id): View
    {
        $hutangTeman = HutangTeman::findOrFail($id);
        return view('hutangtemans.show', compact('hutangTeman'));
    }

    public function edit(string $id): View
    {
        $hutangTeman = HutangTeman::findOrFail($id);
        return view('hutangtemans.edit', compact('hutangTeman'));
    }
        
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_teman' => 'required|min:3',
            'bukti_transaksi' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal_peminjaman' => 'required',
            'keterangan' => 'nullable'
        ]);

        $hutangTeman = HutangTeman::findOrFail($id);

        if ($request->hasFile('bukti_transaksi')) {
            $buktiTransaksi = $request->file('bukti_transaksi');
            $buktiTransaksi->storeAs('public/hutangtemans', $buktiTransaksi->hashName());

            Storage::delete('public/hutangtemans/'.$hutangTeman->bukti_transaksi);

            $hutangTeman->update([
                'bukti_transaksi' => $buktiTransaksi->hashName()
            ]);
        }

        $hutangTeman->update([
            'nama_teman' => $request->nama_teman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('hutangtemans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $hutangTeman = HutangTeman::findOrFail($id);

        Storage::delete('public/hutangtemans/'. $hutangTeman->bukti_transaksi);

        $hutangTeman->delete();

        return redirect()->route('hutangtemans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
