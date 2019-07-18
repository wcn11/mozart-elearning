<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soal_judul;
use App\Student;
use Illuminate\Support\Facades\Auth;
use App\Soal;
use App\Hasil;
use App\Nilai;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Illuminate\Support\Facades\Session;
use App\Mentor;

class SoalController extends Controller
{
    public function index()
    {
        Session::forget("status_soal");

        $mentor = Student::find(Auth::guard('student')->user()->id_student);

        // foreach($mentor as $m){
        //     echo $m['id_student'];
        // }

        return view("student.soal", compact('mentor'));

        // $soal = Soal_judul::where("id_mentor", $mentor_id->id_mentor)->get();

        // date_default_timezone_set('Asia/Jakarta');
        
        // $status_mengerjakan = [];

        // $status_batas = [];

        // for($i = 0; $i < count($soal); $i++){

        //     $nilai = Nilai::where("kode_judul_soal", $soal[$i]['kode_judul_soal'])->where('id_student', Auth::guard("student")->user()->id_student)->get();


        //     if(now() > $soal[$i]['tanggal_selesai']){

        //         $status_batas[] = array(
        //             'status'.$i => "lewat"
        //         );

                
        //         if($nilai->isEmpty()){  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "belum"
        //             );             
        //         }else{  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "selesai"
        //             );    
        //         }

        //     }elseif(now() > $soal[$i]['tanggal_mulai']){

        //         $status_batas[] = array(
        //             'status'.$i => "waktunya"
        //         );

        //         if($nilai->isEmpty()){  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "belum"
        //             );             
        //         }else{  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "selesai"
        //             );    
        //         }

        //     }else{

        //         $status_batas[] = array(
        //             'status'.$i => "Belum waktunya"
        //         );
                
        //         if($nilai->isEmpty()){  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "belum"
        //             );             
        //         }else{  
        //             $status_mengerjakan[] = array(
        //                 'status'.$i => "selesai"
        //             );    
        //         }

        //     }
        // }

        // return view('student.soal', ['soal' => $soal, 'status_mengerjakan' => $status_mengerjakan, 'status_batas' => $status_batas]);

    }

    public function soalpermentor($id_mentor){
        
        $id = Crypt::decrypt($id_mentor);

        $soal = Soal_judul::where("id_mentor", $id)->get();

        date_default_timezone_set('Asia/Jakarta');
        
        $status_mengerjakan = [];

        $status_batas = [];

        for($i = 0; $i < count($soal); $i++){

            $nilai = Nilai::where("kode_judul_soal", $soal[$i]['kode_judul_soal'])->where('id_student', Auth::guard("student")->user()->id_student)->get();


            if(now() > $soal[$i]['tanggal_selesai']){

                $status_batas[] = array(
                    'status'.$i => "lewat"
                );

                
                if($nilai->isEmpty()){  
                    $status_mengerjakan[] = array(
                        'status'.$i => "belum"
                    );             
                }else{  
                    $status_mengerjakan[] = array(
                        'status'.$i => "selesai"
                    );    
                }

            }elseif(now() > $soal[$i]['tanggal_mulai']){

                $status_batas[] = array(
                    'status'.$i => "waktunya"
                );

                if($nilai->isEmpty()){  
                    $status_mengerjakan[] = array(
                        'status'.$i => "belum"
                    );             
                }else{  
                    $status_mengerjakan[] = array(
                        'status'.$i => "selesai"
                    );    
                }

            }else{

                $status_batas[] = array(
                    'status'.$i => "Belum waktunya"
                );
                
                if($nilai->isEmpty()){  
                    $status_mengerjakan[] = array(
                        'status'.$i => "belum"
                    );             
                }else{  
                    $status_mengerjakan[] = array(
                        'status'.$i => "selesai"
                    );    
                }

            }
        }

        return view("student.daftar_soal_mentor", ["soal" => $soal, 'status_mengerjakan' => $status_mengerjakan, 'status_batas' => $status_batas]);
    }

    public function soal_mengerjakan($id)
    {
        $kode = Crypt::decrypt($id);
        $soal = Soal::where("kode_judul_soal", $kode)->paginate(1);
        $soal_judul = Soal_judul::find($kode);
        return view('student.soal_mengerjakan', compact('soal', 'soal_judul'));
    }

    public function soal_update(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        //masukkan ke tabel sementara

        $id = $request->kode_judul_soal;

        $cek = Hasil::firstOrNew(array('kode_soal' => $request->kode_soal));

        $cek->kode_soal = $request->kode_soal;
        
        $cek->kode_judul_soal = $request->kode_judul_soal;

        $cek->id_student = Auth::guard('student')->user()->id_student;

        if(empty($request->jawaban)){

            $cek->jawaban = null;

        }else {
            $cek->jawaban = $request->jawaban;
        }

        $cek->save();

        //buat atau update tabel nilai (untuk update status)
        
        $soal = Soal::where('kode_judul_soal',$id)->get();
        $hasil = Hasil::where('kode_judul_soal',$id)->get();
        $jumlah = Hasil::where("kode_judul_soal", $id)->count();

        $nilai = 0;
        for($i = 0; $i < $jumlah; $i++){
            if($soal[$i]['pilihan_benar'] == $hasil[$i]['jawaban']){
                $nilai+=1;
            }
        }

        $kode_nilai = Nilai::max("kode_nilai");

        $kode_nilai_slash = strrpos($kode_nilai, "-");

        $kode_nilai_substr = substr($kode_nilai, $kode_nilai_slash+1)+1;

        $mentor = Soal_judul::find($id)->id_mentor;

        $mapel = Soal_judul::find($id)->kode_mapel;

        $kode_judul_soal_slash = strrpos($id, "-");

        $kode_judul_soal_substr = substr($id, $kode_judul_soal_slash+1);

        $mapel_slash = strrpos($mapel, "-");

        $mapel_substr = substr($mapel, $mapel_slash+1);

        $mentor_slash = strrpos($mentor, "-");

        $mentor_substr = substr($mentor, $mentor_slash+1);

        $nilai2 = Nilai::firstOrNew(array('kode_judul_soal' => $id));

        $nilai2->id_student = Auth::guard('student')->user()->id_student;

        $nilai2->kode_nilai = "NIL-".$mentor_substr."-".$mapel_substr."-".$kode_judul_soal_substr."-".$kode_nilai_substr;

        $nilai2->nilai = $nilai;

        $nilai2->kode_judul_soal = $id;

        $nilai2->tanggal_selesai = now();

        $nilai2->status = 'mengerjakan';

        $nilai2->save();

    }

    public function soal_edit($id){
        $kode_judul_soal = Crypt::decrypt($id);

        $hasil = Hasil::where('kode_judul_soal', $kode_judul_soal)->get();

        $soal_judul = Soal_judul::find($kode_judul_soal);

        $soal = Soal::where('kode_judul_soal', $kode_judul_soal)->get();

        return view('student.soal_edit_semua', ['hasil' => $hasil, 'soal' => $soal, 'soal_judul' => $soal_judul]);
    }

    public function soal_edit_persoal($id, $nomor, $id_param){
        $soal_id = Crypt::decrypt($id);

        $soal = Soal::find($soal_id);

        $soal_judul = Soal_judul::find($soal->kode_judul_soal);

        $hasil = Hasil::where('kode_judul_soal', $soal->kode_judul_soal)->where('kode_soal', $soal_id)->get();

        return view('student.soal_edit_persoal', compact('soal', 'soal_judul', 'nomor', 'hasil'));

        echo $hasil[0]['jawaban'];
    }

    public function soal_nilai($id_decrypted)
    {
        $id = Crypt::decrypt($id_decrypted);
        
        $nilai = Nilai::where("kode_judul_soal", $id)->where("id_student", Auth::guard('student')->user()->id_student)->get();

        $nu = Nilai::find($nilai[0]['kode_nilai']);

        $nu->status = "selesai";

        $nu->update();

        return redirect()->route('student.nilai_review', [$id_decrypted, $id_param = $id_decrypted]);
    }

    public function soal_nilai_review($id){

        $id = Crypt::decrypt($id);

        $soal_judul = Soal_judul::find($id);

        $soal = Soal::where('kode_judul_soal', $id)->get();

        $jj = Hasil::where("kode_judul_soal", $id)->get();

        $jumlah_jawaban = count($jj);

        $hasil = Hasil::where("kode_judul_soal", $id)->where('id_student', Auth::guard('student')->user()->id_student)->get();

        $nilai = Nilai::where("kode_judul_soal", $id)->where('id_student', Auth::guard('student')->user()->id_student)->get();

        return view('student.soal_nilai_review', compact('soal_judul', 'soal', 'hasil', 'nilai', 'jumlah_jawaban'));

    }

    public function soal_nilai_cetak($id){

        $soal_judul = Soal_judul::find($id);

        $soal = Soal::where('kode_judul_soal', $id)->get();

        $hasil = Hasil::where("kode_judul_soal", $id)->where('id_student', Auth::guard('student')->user()->id_student)->get();

        $nilai = Nilai::where("kode_judul_soal", $id)->where('id_student', Auth::guard('student')->user()->id_student)->get();

        $jj = Hasil::where("kode_judul_soal", $id)->get();

        $jumlah_jawaban = count($jj);

        $pdf = \PDF::loadview("student.soal_nilai_cetak", compact('soal_judul', 'soal', 'hasil', 'nilai', 'jumlah_jawaban'));
        // $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('javascript-delay', 5000);
        // $pdf->setOption('enable-smart-shrinking', true);;
        // $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->download("[".Auth::guard('student')->user()->name."]_[". $soal_judul->judul . "]_" . date("H:i:s") . '.pdf');
    }
}