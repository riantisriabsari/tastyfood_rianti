<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * =========================
     * ADMIN: LIHAT PESAN KONTAK
     * =========================
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();

        return view('admin.kontak.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * =========================
     * PENGUNJUNG: SIMPAN PESAN
     * =========================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email',
            'subjek' => 'nullable|string|max:150',
            'pesan'  => 'required|string',
        ]);

        Contact::create([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'subjek' => $request->subjek,
            'pesan'  => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    /**
     * =========================
     * ADMIN: HAPUS PESAN
     * =========================
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus');
    }
}
