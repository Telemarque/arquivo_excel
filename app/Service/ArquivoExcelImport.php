<?php

namespace App\Service;

use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

/**
 * Created by PhpStorm.
 * User: pc
 * Date: 4/15/2019
 * Time: 4:01 PM
 */
class ArquivoExcelImport{

    public function import(Request $request)
    {
//        dd($request);
//        dd($request->toArray());
        $file   = self::salvarArquivo($request->file('arquivo'));
        $array  = self::gerarExcel($file);
        self::salvarExames($array);
    }

    private function salvarArquivo ($arquivo)
    {

        try {
            Storage::putFileAs('public/arquivo', $arquivo, 'medicamentos.xls');
            $file = public_path('storage/arquivo/medicamentos.xls');
            return $file;
        } catch (Exception $e) {
            echo 'Error '.$e->getMessage();
        }
    }
    private function gerarExcel ($file) {
        try {
            $tste = Excel::load($file , function ($reader) {
            })->toArray();
            dd($tste);
        } catch (Exception $e) {
            echo 'Error '.$e->getMessage();
        }
    }


}
