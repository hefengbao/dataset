<?php

namespace App\Http\Controllers;

class TongueTwisterController extends Controller
{
    public function create()
    {

        try {

            $text = \Spatie\PdfToText\Pdf::getText(storage_path('app/绕口令.pdf'));

            dd($text);
        } catch (\Exception $e) {
            dd($e);
        }

    }
}
