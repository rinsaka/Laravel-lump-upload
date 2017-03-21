<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

    public function testBasicExample2()
    {
        $this->visit('/')
             ->see('Lump Upload');
    }

    public function testBasicExample3()
    {
        $this->visit('/')
             ->click('Lump Upload')
             ->see('Register New Papers');
    }


    public function testBasicExample4()
    {
        $this->visit('/')
             ->click('Lump Upload')
             ->see('Register New Papers');
    }

    public function testPaperUpload()
        {
            // echo base_path() . '/tests/pdfs/0102.pdf';
            // // ファイルをアップロードする
            // $this->visit('/papers/create')
            //         ->see('Register New Papers')
            //         ->attach(base_path() . '/tests/pdfs/0102.pdf', 'pdfs[]')
            //         ->press('btn_upload');

                            // ->submitForm('Register New Papers',
                            //                 ['journal_id' => 1, 'year' => 2015],
                            //                 ['pdfs' => base_path() . '/tests/pdfs/0102.pdf']);
            //                 ->attach(base_path() . '/tests/pdfs/0102.pdf', 'pdfs')
            //                 ->press('btn_upload')
            //                 ->see('登録されました');
            // echo "\n";
            // echo base_path() . '/tests/pdfs/0102.pdf';
            // echo "\n";


        }


}
