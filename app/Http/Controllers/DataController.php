<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MyTable;
use Yajra\Datatables\DataTables;

class DataController extends Controller
{
    public function __construct()
    {
        $this->MyTable = new MyTable();
    }
    public function index()
    {
        $results1 = $this->MyTable->allData();
        return view('data', ['list' => $results1]);
    }

    public function detail($id)
    {
        $result = $this->MyTable->allData()->where('id', $id);
        $result1 = $this->MyTable->allData();
        return view('detail', ['list' => $result1], ['data' => $result]);
    }

    public function ambil()
    {
        $results1 = $this->MyTable->allData();
        return json_encode($results1);
    }
}
