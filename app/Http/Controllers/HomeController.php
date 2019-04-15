<?php

namespace App\Http\Controllers;

use App\Service\ArquivoExcelImport;
use App\User;
use phpDocumentor\Reflection\Types\Self_;
use Illuminate\Http\Request;

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

    public function index()
    {
        return view('home');
    }

    public function form()
    {
        return view('paginas.form_arquivo');
    }

    public function excelUpload (Request $request)
    {

        $files = $request->file('arquivo');

        $excel = new ArquivoExcelImport();
        $excel->import($files);
//        foreach ($files as $file) {
//            dd($file);
//            if() {
//                $response = [
//                    "message" => "O arquivo foi enviado com sucesso!!!",
//                    "data"    => request()->file('file')
//                ];
//                return $response;
//            }
//        }
    }

}
