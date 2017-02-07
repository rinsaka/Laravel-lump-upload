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
          // var_dump($filename);
          // echo "<br>";
        }

        // var_dump($this->_pdfs_dir);
        // echo "<br><br>";

        // アップロードされたファイルの種類を確認する
        $files_success_error = $this->_checkMimeType($files); // MimeTypeによって，2種類に分ける
        $files_success = $files_success_error['success'];   // PDFファイルの配列
        $files_error = $files_success_error['error'];       // その他のファイルの配列


        // アップロードされたPDFファイル「だけ」をストレージフォルダに保存する
        $files_name = $this->_pdfsSave($files_success);

        // アップロード結果を表示する
        echo "<h2>アップロード成功</h2>";
        $i = 0;
        echo "<ol>";
        foreach ($files_success as $file) {
          echo "<li>" . $files_name[$i]['client'] . "  --------->>>>>>   " . $files_name[$i]['storage']. "</li>";
          $i++;
        }
        echo "</ol>";

        echo "<h2>アップロード失敗（PDFファイルではありません）</h2>";
        $i = 0;
        echo "<ol>";
        foreach ($files_error as $file) {
          echo "<li>" . $file->getClientOriginalName() . "</li>";
          $i++;
        }
        echo "</ol>";

        // dd($files, $files_success, $files_error, $files_name);

    }

    private function _checkMimeType($files) {
      // アップロードされたファイルのMimeTypeを確認する
      $array_success = '';
      $array_error = '';
      foreach ($files as $file) {
        $mime = $file->getMimeType();
        if ($mime === 'application/pdf') {
          $array_success[] = $file;
        } else {
          $array_error[] = $file;
        }
      }
      // アップロードファイルをPDFファイルとその他のファイルに分けて返す
      return array('success' => $array_success, 'error' => $array_error);

    }

    private function _pdfsSave($files) {
      // アップロードファイルをストレージフォルダに保存する
      $i = 0;  // ファイルのカウンタ
      $array_names = '';
      foreach ($files as $file) {
        // 保存ファイル名を生成する
        $basename = sprintf(
          '%s%02d_%s.pdf',
          time(),
          $i,
          sha1(uniqid(mt_rand(),true)) // ランダムな文字列
        );
        // ファイルを保存する
        $file->move($this->_pdfs_dir, $basename);
        // クライアントとストレージでの名前を保存する
        $array_names[$i] = array('client' => $file->getClientOriginalName(), 'storage' => $basename);
        $i++;
      }
      return $array_names;   // クライアントとストレージでのファイル名の対応表を返す
    }

}
