<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Berita;
use App\Models\Training;
use App\Models\PageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
    
            // Decode entitas HTML lalu hapus tag HTML
            $berita->b_content = strip_tags(html_entity_decode($berita->b_content ?? '', ENT_QUOTES | ENT_HTML5));
    
            // Cek keberadaan gambar dan buat URL yang benar
            $berita->b_image_url = $berita->b_image && Storage::exists($berita->b_image)
                ? Storage::url($berita->b_image)
                : asset('assets/images/frontend-pages/default.svg');
    
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

    public function get_berita(Request $request)
    {
        $size = $request->size;  // Default size is 6
        $page = $request->number; // Default page is 1
    
        $posts = Berita::with('user')
            ->orderBy('b_date', 'desc')
            ->paginate($size, ['*'], 'page[number]', $page);
    
        $this->getFormattedBerita($posts);
    
        // Return the formatted JSON response
        return response()->json([
            'meta' => [
                'page' => [
                    'current-page' => $posts->currentPage(),
                    'per-page' => $posts->perPage(),
                    'from' => $posts->firstItem(),
                    'to' => $posts->lastItem(),
                    'total' => $posts->total(),
                    'last-page' => $posts->lastPage(),
                ],
            ],
            'links' => [
                'first' => $posts->url(1),
                'prev'  => $posts->previousPageUrl(),
                'next'  => $posts->nextPageUrl(),
                'last'  => $posts->url($posts->lastPage()),
            ],
            'data' => $posts->items(),
        ]);
    }

    // halaman menu profile dan detail profile

    public function get_pages() {
        $pages = PageProfile::where('p_is_active', 1)->get();
        return response()->json($pages);
    }

    public function detail_profil($slug)
    {
        $page = PageProfile::where('p_slug', $slug)->firstOrFail();
        $page->p_content = strip_tags($page->p_content);
            
        if ($page->p_image && Storage::exists($page->p_image)) {
            $page->p_image_url = asset('storage/' . $page->p_image);
        } else {
            $page->p_image_url = asset('assets/images/frontend-pages/default.svg');
        }

        return view('landingpage.profil.detail', compact('page'));
    }

    // halaman grid berita dan detail berita

    public function berita_view () {
        return view('landingpage.berita.index');
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

    // halaman grid pelatihan dan detail pelatihan

    public function pelatihan_view() {
        return view('landingpage.pelatihan.index');
    }

    public function get_pelatihan(Request $request) {
        // Get the selected year, month, and day from the request
        $year = $request->year;
        $month = $request->month;
        $day = $request->day;
    
        $startdate = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-" . str_pad($day, 2, '0', STR_PAD_LEFT);
    
        $pelatihan = Training::where('p_is_public', 1)
        ->whereDate('p_start_date', '=', $startdate)
        ->get();
    
        $pelatihan->each(function ($item) {
        
            // Format the p_start_date
            $item->p_start_date = \Carbon\Carbon::parse($item->p_start_date)->format('j F Y'); 
        
            $item->p_image = $item->p_image && Storage::exists($item->p_image)
                ? asset('storage/' . $item->p_image)
                : asset('assets/images/frontend-pages/default.svg');
        });
    
    
        return response()->json($pelatihan);
    }


    public function detail_pelatihan($slug)
    {
        $pelatihan = Training::where('p_slug', $slug)->firstOrFail();

        // Format tanggal menggunakan Carbon
        $pelatihan->p_start_date = Carbon::parse($pelatihan->p_start_date)->format('d F Y');
        $pelatihan->p_end_date = Carbon::parse($pelatihan->p_end_date)->format('d F Y');
        
        // Pastikan konten dapat dirender sebagai HTML
        $pelatihan->p_content = strip_tags($pelatihan->p_content);

        if ($pelatihan->p_image && Storage::exists($pelatihan->p_image)) {
            $pelatihan->p_image = asset('storage/' . $pelatihan->p_image);
        } else {
            $pelatihan->p_image = asset('assets/images/frontend-pages/default.svg');
        }
        
        return view('landingpage.pelatihan.detail', compact('pelatihan'));
    }
    
}
