<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RequestController extends Controller
{
    public function store (Request $request) : RedirectResponse
    {
       $nama = $request->input('nama', 'Indro Adi');
       return redirect('/nama')->with ('nama',$nama);
    }
    }

