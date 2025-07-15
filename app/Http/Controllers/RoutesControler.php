<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesControler extends Controller
{
    public function Dashboard(){
        return 'Hallo,ini halaman dashboard yang dibuat dengan controler laravel';
    }
}
