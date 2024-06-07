<?php

namespace App\Http\Controllers;

use App\Models\administrasi;
use App\Models\BobotAdministrasi;
use App\Models\BobotMesin;
use App\Models\BobotNavigasi;
use App\Models\BobotNilaiGap;
use App\Models\GapAdministrasi;
use App\Models\GapMesin;
use App\Models\GapNavigasi;
use App\Models\Kapal;
use App\Models\KriteriaAspekAdministrasi;
use App\Models\KriteriaAspekMesin;
use App\Models\KriteriaAspekNavigasi;
use App\Models\mesin;
use App\Models\navigasi;
use App\Models\Rengking;
use App\Models\TargetAdministrasi;
use App\Models\TargetMesin;
use App\Models\TargetNavigasi;
use App\Models\TotalKriteriaAspekAdministrasi;
use App\Models\TotalKriteriaAspekMesin;
use App\Models\TotalKriteriaAspekNavigasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kariawanController extends Controller
{
    public function dashboard()
    {
        return view('kariawan/dashboard');
    }

    public function listKapal()
    {
        $kapal = Kapal::all();
        return view('kariawan/list-kapal', ['kapal'=>$kapal]);
    }

    public function tambahKapal()
    {
        return view('kariawan/tambah-kapal');
    }

    public function prosesTambah(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required|max:255',
                'pemilik' => 'required|max:255',
                'gt' => 'required|unique:kapal|numeric',
                'tahun' => 'required|numeric',
                'tipe' => 'required|max:255',
                'kedatangan' => 'required',
                'awak' => 'required',
                'pernyataan' => 'required',
                'kesehatan' => 'required',
                'penumpang' => 'required',
                'mesinUtama' => 'required',
                'mesinBantu' => 'required',
                'listrik' => 'required',
                'bahanBakar' => 'required',
                'navigasi' => 'required',
                'radio' => 'required',
                'komunikasi' => 'required',
                'alatPenolong' => 'required',
                'label' => 'required',
            ],
                [
                    'nama.required' => 'nama wajib diisi',
                    'nama.max' => 'maksimal 255 carakter',

                    'pemilik.required' => 'pemilik kapal wajib diisi',
                    'pemilik.max' => 'maksimal 255 carakter',

                    'gt.required' => 'gt wajib diisi',
                    'gt.unique' => 'gt sudah ada',
                    'gt.numeric' => 'gt harus berupa angka',

                    'tahun.required' => 'tahun wajib diisi',
                    'tahun.numeric' => 'tahun harus berupa angka',

                    'tipe.required' => 'tipe kapal wajib diisi',
                    'tipe.max' => 'maksimal 255 carakter',
                    'kedatangan.required' => 'laporan kedatangan & keberangkatan wajib diisi',
                    'awak.required' => 'daftar awak kapal wajib diisi',
                    'pernyataan.required' => 'surat pernyataan narkoba wajib diisi',
                    'kesehatan.required' => 'buku kesehatan kapal wajib diisi',
                    'penumpang.required' => 'penumpang kapal wajib diisi',
                    'mesinUtama.required' => 'mesin utama kapal wajib diisi',
                    'mesinBantu.required' => 'mesin bantu kapal wajib diisi',
                    'listrik.required' => 'tenaga listrik utama & darurat kapal wajib diisi',
                    'bahanBakar.required' => 'jenis bahan bakar wajib diisi',
                    'navigasi.required' => 'perlengkapan navigasi kapal wajib diisi',
                    'radio.required' => 'perlengkapan radio kapal wajib diisi',
                    'komunikasi.required' => 'surat izin komunikasi radio wajib diisi',
                    'alatPenolong.required' => 'daya apung wajib diisi',
                    'label.required' => 'label kapal wajib diisi',
                ]
        ); 

        $kapal = new Kapal;
        $kapal->nama_kapal = $request->nama;
        $kapal->pemilik = $request->pemilik;
        $kapal->gt = $request->gt;
        $kapal->tahun = $request->tahun;
        $kapal->jenis_kapal = $request->tipe;
        $kapal->save();

        $dataKapal = Kapal::latest()->first();
        $administrasi = new administrasi;
        $administrasi->kapal_id = $dataKapal->id;
        $administrasi->laporanKedatangan = $request->kedatangan;
        $administrasi->daftarAwak = $request->awak;
        $administrasi->suratPernyataan = $request->pernyataan;
        $administrasi->bukuKesehatan = $request->kesehatan;
        $administrasi->menifesPenumpang = $request->penumpang;
        $administrasi->save();

        $mesin = new mesin;
        $mesin->kapal_id = $dataKapal->id;
        $mesin->mesinUtama = $request->mesinUtama;
        $mesin->mesinBantu = $request->mesinBantu;
        $mesin->teganganListrik = $request->listrik;
        $mesin->bahanBakar = $request->bahanBakar;
        $mesin->save();

        $navigasi = new navigasi;
        $navigasi->kapal_id = $dataKapal->id;
        $navigasi->perlengkapanNavigasi = $request->navigasi;
        $navigasi->perangkatRadio = $request->radio;
        $navigasi->izinKomunikasiRadio = $request->komunikasi;
        $navigasi->dayaApungPenolong = $request->alatPenolong;
        $navigasi->labelKapal = $request->label;
        $navigasi->save();

        // mulai Pencarian Nilai Gap
        // Administrasi
        // $administrasi = administrasi::where('kapal_id', $dataKapal->id)->first();
        $targetAdministrasi = TargetAdministrasi::where('id', '1')->first();
        $gapAdministrasi = new GapAdministrasi;
        $gapAdministrasi->kapal_id = $dataKapal->id;
        $gapAdministrasi->kriteria_1 = $request->kedatangan - $targetAdministrasi->laporanKedatangan;
        $gapAdministrasi->kriteria_2 = $request->awak - $targetAdministrasi->daftarAwak;
        $gapAdministrasi->kriteria_3 = $request->pernyataan - $targetAdministrasi->suratPernyataan;
        $gapAdministrasi->kriteria_4 = $request->kesehatan - $targetAdministrasi->bukuKesehatan;
        $gapAdministrasi->kriteria_5 = $request->penumpang - $targetAdministrasi->menifesPenumpang;
        $gapAdministrasi->save();

        // mesin
        $targetMesin = TargetMesin::where('id', '1')->first();
        $gapMesin = new GapMesin;
        $gapMesin->kapal_id = $dataKapal->id;
        $gapMesin->kriteria_1 = $request->mesinUtama - $targetMesin->mesinUtama;
        $gapMesin->kriteria_2 = $request->mesinBantu - $targetMesin->mesinBantu;
        $gapMesin->kriteria_3 = $request->listrik - $targetMesin->teganganListrik;
        $gapMesin->kriteria_4 = $request->bahanBakar - $targetMesin->bahanBakar;
        $gapMesin->save();

        // navigasi
        $targetNavigasi = TargetNavigasi::where('id', '1')->first();
        $gapNavigasi = new GapNavigasi;
        $gapNavigasi->kapal_id = $dataKapal->id;
        $gapNavigasi->kriteria_1 = $request->navigasi - $targetNavigasi->perlengkapanNavigasi;
        $gapNavigasi->kriteria_2 = $request->radio - $targetNavigasi->perangkatRadio;
        $gapNavigasi->kriteria_3 = $request->komunikasi - $targetNavigasi->izinKomunikasiRadio;
        $gapNavigasi->kriteria_4 = $request->alatPenolong - $targetNavigasi->dayaApungPenolong;
        $gapNavigasi->kriteria_5 = $request->label - $targetNavigasi->labelKapal;
        $gapNavigasi->save();
        // selesai Mencari Nilai Gap

        // mulai Konversi pembobotan nilai
        $bobotNilaiGap = BobotNilaiGap::where('id', '1')->first();
        // administrasi
        $gapKonversiAdministrasi = GapAdministrasi::where('kapal_id', $dataKapal->id)->first();
        $bobotAdministrasi = new BobotAdministrasi;
        $bobotAdministrasi->kapal_id = $dataKapal->id;

        $bobotAdministrasi->kriteria_1 = $gapKonversiAdministrasi->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotAdministrasi->kriteria_2 = $gapKonversiAdministrasi->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotAdministrasi->kriteria_3 = $gapKonversiAdministrasi->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotAdministrasi->kriteria_4 = $gapKonversiAdministrasi->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotAdministrasi->kriteria_5 = $gapKonversiAdministrasi->kriteria_5 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_5 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_5 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_5 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_5 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_5 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotAdministrasi->save();

        // mesin
        $gapKonversiMesin = GapMesin::where('kapal_id', $dataKapal->id)->first();
        $bobotMesin = new BobotMesin;
        $bobotMesin->kapal_id = $dataKapal->id;

        $bobotMesin->kriteria_1 = $gapKonversiMesin->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_2 = $gapKonversiMesin->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_3 = $gapKonversiMesin->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_4 = $gapKonversiMesin->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->save();

        // Navigasi
        $gapKonversiNavigasi = GapNavigasi::where('kapal_id', $dataKapal->id)->first();
        $bobotNavigasi = new BobotNavigasi;
        $bobotNavigasi->kapal_id = $dataKapal->id;

        $bobotNavigasi->kriteria_1 = $gapKonversiNavigasi->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_2 = $gapKonversiNavigasi->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_3 = $gapKonversiNavigasi->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_4 = $gapKonversiNavigasi->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_5 = $gapKonversiNavigasi->kriteria_5 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_5 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_5 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_5 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_5 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_5 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->save();
        // selesai Konversi pembobotan nilai

        // mulai gap kriteria aspek

        // Administrasi
        $bobotAspekAdministrasi = BobotAdministrasi::where('kapal_id', $dataKapal->id)->first();

        $kriteriaAspekAdministrasi = new KriteriaAspekAdministrasi;
        $kriteriaAspekAdministrasi->kapal_id = $dataKapal->id;
        $kriteriaAspekAdministrasi->kriteria_1 = $bobotAspekAdministrasi->kriteria_1;
        $kriteriaAspekAdministrasi->kriteria_2 = $bobotAspekAdministrasi->kriteria_2;
        $kriteriaAspekAdministrasi->kriteria_3 = $bobotAspekAdministrasi->kriteria_3;
        $kriteriaAspekAdministrasi->kriteria_4 = $bobotAspekAdministrasi->kriteria_4;
        $kriteriaAspekAdministrasi->kriteria_5 = $bobotAspekAdministrasi->kriteria_5;

        $kriteriaAspekAdministrasi->cf = strval(sprintf("%.2f",(floatval($bobotAspekAdministrasi->kriteria_1) + floatval($bobotAspekAdministrasi->kriteria_2) + floatval($bobotAspekAdministrasi->kriteria_3))/3));
        $kriteriaAspekAdministrasi->sf = strval(sprintf("%.2f",(floatval($bobotAspekAdministrasi->kriteria_4) + floatval($bobotAspekAdministrasi->kriteria_5))/2));
        $kriteriaAspekAdministrasi->save();

        // Mesin
        $bobotAspekMesin = BobotMesin::where('kapal_id', $dataKapal->id)->first();
        $kriteriaAspekMesin = new KriteriaAspekMesin;
        $kriteriaAspekMesin->kapal_id = $dataKapal->id;
        $kriteriaAspekMesin->kriteria_1 = $bobotAspekMesin->kriteria_1;
        $kriteriaAspekMesin->kriteria_2 = $bobotAspekMesin->kriteria_2;
        $kriteriaAspekMesin->kriteria_3 = $bobotAspekMesin->kriteria_3;
        $kriteriaAspekMesin->kriteria_4 = $bobotAspekMesin->kriteria_4;
        $kriteriaAspekMesin->cf = strval(sprintf("%.2f",(floatval($bobotAspekMesin->kriteria_1) + floatval($bobotAspekMesin->kriteria_2))/2));
        $kriteriaAspekMesin->sf = strval(sprintf("%.2f",(floatval($bobotAspekMesin->kriteria_3) + floatval($bobotAspekMesin->kriteria_4))/2));
        $kriteriaAspekMesin->save();

        // Navigasi
        $bobotAspekNavigasi = BobotNavigasi::where('kapal_id', $dataKapal->id)->first();

        $kriteriaAspekNavigasi = new KriteriaAspekNavigasi;
        $kriteriaAspekNavigasi->kapal_id = $dataKapal->id;
        $kriteriaAspekNavigasi->kriteria_1 = $bobotAspekNavigasi->kriteria_1;
        $kriteriaAspekNavigasi->kriteria_2 = $bobotAspekNavigasi->kriteria_2;
        $kriteriaAspekNavigasi->kriteria_3 = $bobotAspekNavigasi->kriteria_3;
        $kriteriaAspekNavigasi->kriteria_4 = $bobotAspekNavigasi->kriteria_4;
        $kriteriaAspekNavigasi->kriteria_5 = $bobotAspekNavigasi->kriteria_5;
        $kriteriaAspekNavigasi->cf = strval(sprintf("%.2f",(floatval($bobotAspekNavigasi->kriteria_1) + floatval($bobotAspekNavigasi->kriteria_2) + floatval($bobotAspekNavigasi->kriteria_3))/3));
        $kriteriaAspekNavigasi->sf = strval(sprintf("%.2f",(floatval($bobotAspekNavigasi->kriteria_4) + floatval($bobotAspekNavigasi->kriteria_5))/2));
        $kriteriaAspekNavigasi->save();
        // selesai gap kriteria aspek

        // mulai Total Kriteria Aspek
        // administrasi
        $kaAdministrasi = KriteriaAspekAdministrasi::where('kapal_id', $dataKapal->id)->first();
        $tkaAdministrasi = new TotalKriteriaAspekAdministrasi;
        $tkaAdministrasi->kapal_id = $dataKapal->id;
        $tkaAdministrasi->cf = $kaAdministrasi->cf;
        $tkaAdministrasi->sf = $kaAdministrasi->sf;
        $tkaAdministrasi->niaa = strval(sprintf("%.2f",(((60/100) * floatval($kaAdministrasi->cf)) + ((40/100) * floatval($kaAdministrasi->sf))) ));
        $tkaAdministrasi->save();

        // mesin
        $kaMesin = KriteriaAspekMesin::where('kapal_id', $dataKapal->id)->first();
        $tkaMesin = new TotalKriteriaAspekMesin;
        $tkaMesin->kapal_id = $dataKapal->id;
        $tkaMesin->cf = $kaMesin->cf;
        $tkaMesin->sf = $kaMesin->sf;
        $tkaMesin->niam = strval(sprintf("%.2f",(((60/100) * floatval($kaMesin->cf)) + ((40/100) * floatval($kaMesin->sf))) ));
        $tkaMesin->save();

        // Navigasi
        $kaNavigasi = KriteriaAspekNavigasi::where('kapal_id', $dataKapal->id)->first();
        $tkaNavigasi = new TotalKriteriaAspekNavigasi;
        $tkaNavigasi->kapal_id = $dataKapal->id;
        $tkaNavigasi->cf = $kaNavigasi->cf;
        $tkaNavigasi->sf = $kaNavigasi->sf;
        $tkaNavigasi->nianp = strval(sprintf("%.2f",(((60/100) * floatval($kaNavigasi->cf)) + ((40/100) * floatval($kaNavigasi->sf))) ));
        $tkaNavigasi->save();
        // selesai Total Kriteria Aspek

        // mulai rengking

        $rtkaAdministrasi = TotalKriteriaAspekAdministrasi::where('kapal_id', $dataKapal->id)->first();
        $rtkaMesin = TotalKriteriaAspekMesin::where('kapal_id', $dataKapal->id)->first();
        $rtkaNavigasi = TotalKriteriaAspekNavigasi::where('kapal_id', $dataKapal->id)->first();

        $rengking = new Rengking;
        $rengking->kapal_id = $dataKapal->id;
        $rengking->niaa = $rtkaAdministrasi->niaa;
        $rengking->niam = $rtkaMesin->niam;
        $rengking->nianp = $rtkaNavigasi->nianp;
        $rengking->hasilAkhir = strval(sprintf("%.3f",(((40/100) * floatval($rtkaAdministrasi->niaa)) + ((30/100) * floatval($rtkaMesin->niam)) + ((30/100) * floatval($rtkaNavigasi->nianp)) ) ));
        $rengking->save();

        // selesai rengking

        return redirect('/list-kapal')->with('status', 'Data Kapal Sukses Ditambahkan');
    }

    public function editKapal($slug)
    {
        $kapal = Kapal::where('slug', $slug)->first();
        $administrasi = administrasi::where('kapal_id', $kapal->id)->first();
        $mesin = mesin::where('kapal_id', $kapal->id)->first();
        $navigas = navigasi::where('kapal_id', $kapal->id)->first();
        return view('kariawan/edit-kapal', ['kapal'=>$kapal, 'administrasi'=>$administrasi, 'mesin'=>$mesin, 'navigasi'=>$navigas]);
    }

    public function prosesEdit(Request $request, $slug)
    {
        $validated = 
            [
                'nama' => 'required|max:255',
                'pemilik' => 'required|max:255',
                'tahun' => 'required|numeric',
                'tipe' => 'required|max:255',
            ];
        $kapal = Kapal::where('slug', $slug)->first();
        if ($request['gt'] != $kapal->gt) {
            $validated['gt'] ='required|unique:kapal|numeric';
        }
        $request->validate($validated);

        $kapal->nama_kapal = $request->nama;
        $kapal->slug = null;
        $kapal->pemilik = $request->pemilik;
        $kapal->tahun = $request->tahun;
        $kapal->jenis_kapal = $request->tipe;
        $kapal->update();

        $administrasi = administrasi::where('kapal_id', $kapal->id)->first();
        $administrasi->laporanKedatangan = $request->kedatangan;
        $administrasi->daftarAwak = $request->awak;
        $administrasi->suratPernyataan = $request->pernyataan;
        $administrasi->bukuKesehatan = $request->kesehatan;
        $administrasi->menifesPenumpang = $request->penumpang;
        $administrasi->update();

        $mesin = mesin::where('kapal_id', $kapal->id)->first();
        $mesin->mesinUtama = $request->mesinUtama;
        $mesin->mesinBantu = $request->mesinBantu;
        $mesin->teganganListrik = $request->listrik;
        $mesin->bahanBakar = $request->bahanBakar;
        $mesin->update();

        $navigasi = navigasi::where('kapal_id', $kapal->id)->first();
        $navigasi->perlengkapanNavigasi = $request->navigasi;
        $navigasi->perangkatRadio = $request->radio;
        $navigasi->izinKomunikasiRadio = $request->komunikasi;
        $navigasi->dayaApungPenolong = $request->alatPenolong;
        $navigasi->labelKapal = $request->label;
        $navigasi->update();

        // mulai Pencarian Nilai Gap
        // Administrasi
        // $administrasi = administrasi::where('kapal_id', $dataKapal->id)->first();
        $targetAdministrasi = TargetAdministrasi::where('id', '1')->first();
        $gapAdministrasi = GapAdministrasi::where('kapal_id', $kapal->id)->first();
        $gapAdministrasi->kriteria_1 = $request->kedatangan - $targetAdministrasi->laporanKedatangan;
        $gapAdministrasi->kriteria_2 = $request->awak - $targetAdministrasi->daftarAwak;
        $gapAdministrasi->kriteria_3 = $request->pernyataan - $targetAdministrasi->suratPernyataan;
        $gapAdministrasi->kriteria_4 = $request->kesehatan - $targetAdministrasi->bukuKesehatan;
        $gapAdministrasi->kriteria_5 = $request->penumpang - $targetAdministrasi->menifesPenumpang;
        $gapAdministrasi->update();

        // mesin
        $targetMesin = TargetMesin::where('id', '1')->first();
        $gapMesin = GapMesin::where('kapal_id', $kapal->id)->first();
        $gapMesin->kriteria_1 = $request->mesinUtama - $targetMesin->mesinUtama;
        $gapMesin->kriteria_2 = $request->mesinBantu - $targetMesin->mesinBantu;
        $gapMesin->kriteria_3 = $request->listrik - $targetMesin->teganganListrik;
        $gapMesin->kriteria_4 = $request->bahanBakar - $targetMesin->bahanBakar;
        $gapMesin->update();

        // navigasi
        $targetNavigasi = TargetNavigasi::where('id', '1')->first();
        $gapNavigasi = GapNavigasi::where('kapal_id', $kapal->id)->first();
        $gapNavigasi->kriteria_1 = $request->navigasi - $targetNavigasi->perlengkapanNavigasi;
        $gapNavigasi->kriteria_2 = $request->radio - $targetNavigasi->perangkatRadio;
        $gapNavigasi->kriteria_3 = $request->komunikasi - $targetNavigasi->izinKomunikasiRadio;
        $gapNavigasi->kriteria_4 = $request->alatPenolong - $targetNavigasi->dayaApungPenolong;
        $gapNavigasi->kriteria_5 = $request->label - $targetNavigasi->labelKapal;
        $gapNavigasi->update();
        // selesai Mencari Nilai Gap

         // mulai Konversi pembobotan nilai
         $bobotNilaiGap = BobotNilaiGap::where('id', '1')->first();
         // administrasi
         $gapKonversiAdministrasi = GapAdministrasi::where('kapal_id', $kapal->id)->first();
         $bobotAdministrasi = BobotAdministrasi::where('kapal_id', $kapal->id)->first();
 
         $bobotAdministrasi->kriteria_1 = $gapKonversiAdministrasi->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
         $bobotAdministrasi->kriteria_2 = $gapKonversiAdministrasi->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
         $bobotAdministrasi->kriteria_3 = $gapKonversiAdministrasi->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
         $bobotAdministrasi->kriteria_4 = $gapKonversiAdministrasi->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
         $bobotAdministrasi->kriteria_5 = $gapKonversiAdministrasi->kriteria_5 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiAdministrasi->kriteria_5 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiAdministrasi->kriteria_5 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiAdministrasi->kriteria_5 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiAdministrasi->kriteria_5 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiAdministrasi->kriteria_5 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
         $bobotAdministrasi->update();

         // mesin
        $gapKonversiMesin = GapMesin::where('kapal_id', $kapal->id)->first();
        $bobotMesin = BobotMesin::where('kapal_id', $kapal->id)->first();

        $bobotMesin->kriteria_1 = $gapKonversiMesin->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_2 = $gapKonversiMesin->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_3 = $gapKonversiMesin->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->kriteria_4 = $gapKonversiMesin->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiMesin->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiMesin->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiMesin->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiMesin->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiMesin->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotMesin->update();

        // Navigasi
        $gapKonversiNavigasi = GapNavigasi::where('kapal_id', $kapal->id)->first();
        $bobotNavigasi = BobotNavigasi::where('kapal_id', $kapal->id)->first();

        $bobotNavigasi->kriteria_1 = $gapKonversiNavigasi->kriteria_1 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_1 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_1 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_1 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_1 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_1 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_2 = $gapKonversiNavigasi->kriteria_2 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_2 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_2 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_2 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_2 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_2 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_3 = $gapKonversiNavigasi->kriteria_3 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_3 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_3 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_3 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_3 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_3 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_4 = $gapKonversiNavigasi->kriteria_4 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_4 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_4 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_4 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_4 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_4 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->kriteria_5 = $gapKonversiNavigasi->kriteria_5 == 0 ? $bobotNilaiGap->sesuaiDibutuhkan : ($gapKonversiNavigasi->kriteria_5 == 1 ? $bobotNilaiGap->kelebihan_1_tingkat : ($gapKonversiNavigasi->kriteria_5 == -1 ? $bobotNilaiGap->kekurangan_1_tingkat : ($gapKonversiNavigasi->kriteria_5 == 2 ? $bobotNilaiGap->kelebihan_2_tingkat : ($gapKonversiNavigasi->kriteria_5 == -2 ? $bobotNilaiGap->kekurangan_2_tingkat : ($gapKonversiNavigasi->kriteria_5 == 3 ? $bobotNilaiGap->kelebihan_3_tingkat : $bobotNilaiGap->kekurangan_3_tingkat )))));
        $bobotNavigasi->update();
        // selesai Konversi pembobotan nilai

        // mulai gap kriteria aspek

        // Administrasi
        $bobotAspekAdministrasi = BobotAdministrasi::where('kapal_id', $kapal->id)->first();

        $kriteriaAspekAdministrasi = KriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekAdministrasi->kriteria_1 = $bobotAspekAdministrasi->kriteria_1;
        $kriteriaAspekAdministrasi->kriteria_2 = $bobotAspekAdministrasi->kriteria_2;
        $kriteriaAspekAdministrasi->kriteria_3 = $bobotAspekAdministrasi->kriteria_3;
        $kriteriaAspekAdministrasi->kriteria_4 = $bobotAspekAdministrasi->kriteria_4;
        $kriteriaAspekAdministrasi->kriteria_5 = $bobotAspekAdministrasi->kriteria_5;

        $kriteriaAspekAdministrasi->cf = strval(sprintf("%.2f",(floatval($bobotAspekAdministrasi->kriteria_1) + floatval($bobotAspekAdministrasi->kriteria_2) + floatval($bobotAspekAdministrasi->kriteria_3))/3));
        $kriteriaAspekAdministrasi->sf = strval(sprintf("%.2f",(floatval($bobotAspekAdministrasi->kriteria_4) + floatval($bobotAspekAdministrasi->kriteria_5))/2));
        $kriteriaAspekAdministrasi->update();

        // Mesin
        $bobotAspekMesin = BobotMesin::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekMesin = KriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekMesin->kriteria_1 = $bobotAspekMesin->kriteria_1;
        $kriteriaAspekMesin->kriteria_2 = $bobotAspekMesin->kriteria_2;
        $kriteriaAspekMesin->kriteria_3 = $bobotAspekMesin->kriteria_3;
        $kriteriaAspekMesin->kriteria_4 = $bobotAspekMesin->kriteria_4;
        $kriteriaAspekMesin->cf = strval(sprintf("%.2f",(floatval($bobotAspekMesin->kriteria_1) + floatval($bobotAspekMesin->kriteria_2))/2));
        $kriteriaAspekMesin->sf = strval(sprintf("%.2f",(floatval($bobotAspekMesin->kriteria_3) + floatval($bobotAspekMesin->kriteria_4))/2));
        $kriteriaAspekMesin->update();

        // Navigasi
        $bobotAspekNavigasi = BobotNavigasi::where('kapal_id', $kapal->id)->first();

        $kriteriaAspekNavigasi = KriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekNavigasi->kriteria_1 = $bobotAspekNavigasi->kriteria_1;
        $kriteriaAspekNavigasi->kriteria_2 = $bobotAspekNavigasi->kriteria_2;
        $kriteriaAspekNavigasi->kriteria_3 = $bobotAspekNavigasi->kriteria_3;
        $kriteriaAspekNavigasi->kriteria_4 = $bobotAspekNavigasi->kriteria_4;
        $kriteriaAspekNavigasi->kriteria_5 = $bobotAspekNavigasi->kriteria_5;
        $kriteriaAspekNavigasi->cf = strval(sprintf("%.2f",(floatval($bobotAspekNavigasi->kriteria_1) + floatval($bobotAspekNavigasi->kriteria_2) + floatval($bobotAspekNavigasi->kriteria_3))/3));
        $kriteriaAspekNavigasi->sf = strval(sprintf("%.2f",(floatval($bobotAspekNavigasi->kriteria_4) + floatval($bobotAspekNavigasi->kriteria_5))/2));
        $kriteriaAspekNavigasi->update();
        // selesai gap kriteria aspek

        // mulai Total Kriteria Aspek
        // administrasi
        $kaAdministrasi = KriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $tkaAdministrasi = TotalKriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $tkaAdministrasi->cf = $kaAdministrasi->cf;
        $tkaAdministrasi->sf = $kaAdministrasi->sf;
        $tkaAdministrasi->niaa = strval(sprintf("%.2f",(((60/100) * floatval($kaAdministrasi->cf)) + ((40/100) * floatval($kaAdministrasi->sf))) ));
        $tkaAdministrasi->update();

        // mesin
        $kaMesin = KriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $tkaMesin = TotalKriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $tkaMesin->cf = $kaMesin->cf;
        $tkaMesin->sf = $kaMesin->sf;
        $tkaMesin->niam = strval(sprintf("%.2f",(((60/100) * floatval($kaMesin->cf)) + ((40/100) * floatval($kaMesin->sf))) ));
        $tkaMesin->update();

        // Navigasi
        $kaNavigasi = KriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();
        $tkaNavigasi = TotalKriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();
        $tkaNavigasi->cf = $kaNavigasi->cf;
        $tkaNavigasi->sf = $kaNavigasi->sf;
        $tkaNavigasi->nianp = strval(sprintf("%.2f",(((60/100) * floatval($kaNavigasi->cf)) + ((40/100) * floatval($kaNavigasi->sf))) ));
        $tkaNavigasi->update();
        // selesai Total Kriteria Aspek

        // mulai rengking

        $rtkaAdministrasi = TotalKriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $rtkaMesin = TotalKriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $rtkaNavigasi = TotalKriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();

        $rengking = Rengking::where('kapal_id', $kapal->id)->first();
        $rengking->niaa = $rtkaAdministrasi->niaa;
        $rengking->niam = $rtkaMesin->niam;
        $rengking->nianp = $rtkaNavigasi->nianp;
        $rengking->hasilAkhir = strval(sprintf("%.3f",(((40/100) * floatval($rtkaAdministrasi->niaa)) + ((30/100) * floatval($rtkaMesin->niam)) + ((30/100) * floatval($rtkaNavigasi->nianp)) ) ));
        $rengking->save();

        // selesai rengking
        
        return redirect('/list-kapal')->with('status', 'Data Kapal Sukses DiUbah');
    }

    public function hapusKapal($slug)
    {
        $kapal = Kapal::where('slug', $slug)->first();
        $administrasi = administrasi::where('kapal_id', $kapal->id)->first();
        $administrasi->delete();
        $mesin = mesin::where('kapal_id', $kapal->id)->first();
        $mesin->delete();
        $navigasi = navigasi::where('kapal_id', $kapal->id)->first();
        $navigasi->delete();

        $gapAdministrasi = GapAdministrasi::where('kapal_id', $kapal->id)->first();
        $gapAdministrasi->delete();
        $gapMesin = GapMesin::where('kapal_id', $kapal->id)->first();
        $gapMesin->delete();
        $gapNavigasi = GapNavigasi::where('kapal_id', $kapal->id)->first();
        $gapNavigasi->delete();

        $bobotAdministrasi = BobotAdministrasi::where('kapal_id', $kapal->id)->first();
        $bobotAdministrasi->delete();
        $bobotMesin = BobotMesin::where('kapal_id', $kapal->id)->first();
        $bobotMesin->delete();
        $bobotNavigasi = BobotNavigasi::where('kapal_id', $kapal->id)->first();
        $bobotNavigasi->delete();
        $kriteriaAspekAdministrasi = KriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekAdministrasi->delete();
        $kriteriaAspekMesin = KriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekMesin->delete();
        $kriteriaAspekNavigasi = KriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();
        $kriteriaAspekNavigasi->delete();

        $tkaAdministrasi = TotalKriteriaAspekAdministrasi::where('kapal_id', $kapal->id)->first();
        $tkaAdministrasi->delete();
        $tkaMesin = TotalKriteriaAspekMesin::where('kapal_id', $kapal->id)->first();
        $tkaMesin->delete();
        $tkaNavigasi = TotalKriteriaAspekNavigasi::where('kapal_id', $kapal->id)->first();
        $tkaNavigasi->delete();

        $rengking = Rengking::where('kapal_id', $kapal->id)->first();
        $rengking->delete();

        $kapal->delete();

        return redirect('/list-kapal')->with('status', 'Data Kapal Sukses DiHapus');
    }

    public function spesifikasi()
    {
        return view('kariawan/spesifikasi-halaman');
    }

    public function peringkat()
    {
        $rengking = Rengking::with('kapal')->get();
        return view('kariawan/peringkat', ['rengking'=>$rengking]);
    }

    public function testing()
    {
        $rengking = Rengking::with('kapal')->get();
        return view('kariawan/testing-halaman', ['rengking'=>$rengking]);
    }
}