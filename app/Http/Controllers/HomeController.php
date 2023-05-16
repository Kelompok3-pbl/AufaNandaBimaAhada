<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kerjasama;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            'title'     =>  'Dashboard'
        ]);
    }
    public function dataChart(Request $request)
    {
        $kerjasama = Kerjasama::selectRaw('COUNT(id_kerjasama) as total,YEAR(created_at) as tahun');
        $kerjasama->when($request->query('tahunDari') != "all", function ($q) use ($request) {
            $q->whereYear('created_at', '>=', trim($request->query('tahunDari')));
        });
        $kerjasama->when($request->query('tahunKe') != "all", function ($q) use ($request) {
            $q->whereYear('created_at', '<=', trim($request->query('tahunKe')));
        });
        $kerjasama->groupBy('tahun')->orderBy('created_at', 'ASC');
        $data = [];
        foreach ($kerjasama->get() as $key => $value) {
            $data['data'][] = $value->total;
            $data['label'][] = $value->tahun;
        }
        return response()->json($data, 200);
    }
    public function dataChartProdi(Request $request)
    {
        $prodi = Prodi::withCount(['kerjasama' => function ($query) use ($request) {
            $query->when($request->query('tahunDari') != "all", function ($q) use ($request) {
                $q->whereYear('kerjasamas.created_at', '>=', trim($request->query('tahunDari')));
            });
            $query->when($request->query('tahunKe') != "all", function ($q) use ($request) {
                $q->whereYear('kerjasamas.created_at', '<=', trim($request->query('tahunKe')));
            });
        }])->get();
        $data = [];
        foreach ($prodi as $key) {
            $data['nama_prodi'][] = $key->nama_prodi;
            $data['total'][] = $key->kerjasama_count;
        }
        return response()->json($data, 200);
    }
    public function dataChartKategori(Request $request)
    {
        $prodi = Kategori::withCount(['kerjasama' => function ($query) use ($request) {
            $query->when($request->query('tahunDari') != "all", function ($q) use ($request) {
                $q->whereYear('kerjasamas.created_at', '>=', trim($request->query('tahunDari')));
            });
            $query->when($request->query('tahunKe') != "all", function ($q) use ($request) {
                $q->whereYear('kerjasamas.created_at', '<=', trim($request->query('tahunKe')));
            });
        }])->get();
        $data = [];
        foreach ($prodi as $key) {
            $data['nama_kategori'][] = $key->nama_kategori;
            $data['total'][] = $key->kerjasama_count;
        }
        return response()->json($data, 200);
    }
}
