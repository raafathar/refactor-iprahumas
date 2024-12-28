<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    private function formatBeritaData($berita)
    {
        $berita->b_date = Carbon::parse($berita->b_date)->translatedFormat('d F Y');
        $berita->user_name = $berita->user->name;

        if ($berita->b_image && Storage::exists($berita->b_image)) {
            $berita->b_image_url = asset('storage/' . $berita->b_image);
        } else {
            $berita->b_image_url = asset('assets/images/frontend-pages/default.svg');
        }
    }

    private function getFormattedBerita($beritas)
    {
        return $beritas->map(function ($berita) {
            $this->formatBeritaData($berita);
            $berita->b_content = strip_tags($berita->b_content);
            
            if ($berita->b_image && Storage::exists($berita->b_image)) {
                $berita->b_image_url = asset('storage/' . $berita->b_image);
            } else {
                $berita->b_image_url = asset('assets/images/frontend-pages/default.svg');
            }
            return $berita;
        });
    }

    public function index()
    {
        $beritaTerbaru = $this->getFormattedBerita(
            Berita::with('user')->latest()->take(6)->get()
        );
    
        $banners = Banner::where('b_is_active', 1)
                        ->select('id', 'b_title', 'b_image')
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->map(function ($banner) {
                            
                            $banner->b_image_url = $banner->b_image && Storage::exists($banner->b_image)
                                ? asset('storage/' . $banner->b_image)
                                : asset('assets/images/frontend-pages/default.svg');
                            
                            return $banner;
                        });
    
        return view('landingpage.index', compact('beritaTerbaru', 'banners'));
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
