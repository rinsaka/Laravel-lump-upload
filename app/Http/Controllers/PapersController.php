<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PapersController extends Controller
{
  private $_pdfs_dir;

    public function __construct() {
      $this->_pdfs_dir = storage_path('app') . '/pdfs';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "Papers:index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo "Papers:create";
        return view('papers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // アップロードされたファイルのオリジナルファイル名を順に取得する
        $files = $request->file('pdfs');
        foreach($files as $file) {
          $filename = $file->getClientOriginalName();
          var_dump($filename);
          echo "<br>";
        }

        var_dump($this->_pdfs_dir);
        echo "<br><br>";

        // アップロードされたファイルの種類を確認する
         $this->_checkMimeType($files);

        // アップロードされたPDFファイルをストレージフォルダに保存する
        $this->_pdfsSave($files);

        dd($files);

    }

    private function _checkMimeType($files) {
      // アップロードされたファイルのMimeTypeを確認する
      $sucess = 0;
      $error = 0;
      foreach ($files as $file) {
        $mime = $file->getMimeType();
        var_dump($mime);
        echo "<br>";
        if ($mime === 'application/pdf') {
          $sucess++;
        } else {
          $error++;
        }
      }
      echo "PDFファイル数 : $sucess <br>";
      echo "エラーファイル数 : $error <br>";
      echo "<br>";

    }

    private function _pdfsSave($files) {
      // アップロードファイルをストレージフォルダに保存する
      $i = 0;  // ファイルのカウンタ
      foreach ($files as $file) {
        // 保存ファイル名を生成する
        $basename = sprintf(
          '%s%02d_%s.pdf',
          time(),
          $i,
          sha1(uniqid(mt_rand(),true)) // ランダムな文字列
        );
        var_dump($basename);
        echo "<br>";
        // ファイルを保存する
        $file->move($this->_pdfs_dir, $basename);

        $i++;
      }
      echo "<br><br>";
      dd($files);
    }

}
