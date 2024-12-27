<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{

    private function formatBeritaData($berita)
    {
        $berita->b_date = Carbon::parse($berita->b_date)->translatedFormat('d F Y');
        $berita->user_name = $berita->user->name;
    }

    private function getFormattedBerita($beritas)
    {
        return $beritas->map(function ($berita) {
            $this->formatBeritaData($berita);
            $berita->b_content = strip_tags($berita->b_content);
            return $berita;
        });
    }

    public function index()
    {
        $beritaTerbaru = $this->getFormattedBerita(
            Berita::with('user')->latest()->take(6)->get()
        );

        return view('landingpage.index', compact('beritaTerbaru'));
    }

    public function get_berita()
    {
        $beritas = $this->getFormattedBerita(
            Berita::with('user')->orderBy('b_date', 'desc')->get()
        );

        return view('landingpage.berita.index', compact('beritas'));
    }

    public function detail_berita($slug)
    {
        $berita = Berita::where('b_slug', $slug)->firstOrFail();
        $this->formatBeritaData($berita);

        $beritaLainnya = $this->getFormattedBerita(
            Berita::with('user')->inRandomOrder()->take(3)->get()
        );

        return view('landingpage.berita.detail', compact('berita', 'beritaLainnya'));
    }

}
