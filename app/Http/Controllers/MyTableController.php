<?php

namespace App\Http\Controllers;

use App\Models\MyTable;
use Illuminate\Http\Request;


class MyTableController extends Controller
{
    public function __construct()
    {
        $this->MyTable = new MyTable();
    }

    public function index()
    {
        $results1 = $this->MyTable->allData();
        return view('home', ['list' => $results1]);
    }

    public function rute($id)
    {
        $results1 = $this->MyTable->allData()->where('id', $id);
        return  view('rute', ['data' => $results1]);
    }

    public function titik()
    {
        $results1 = $this->MyTable->allData();
        return json_encode($results1);
    }
}
