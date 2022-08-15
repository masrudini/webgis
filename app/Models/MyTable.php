<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyTable extends Model
{
    public function allData()
    {
        $results = DB::table('mytable')
            ->select('id', 'Title', 'Latitude', 'Longitude', 'Alamat', 'Gambar', 'Date_Created')->get();
        return $results;
    }

    public function getLokasi()
    {
        $results = DB::table('mytable')
            ->select('id', 'Latitude', 'Longitude')->get();
        return $results;
    }

    public function allLokasi($title)
    {
        $results = DB::table('mytable')
            ->select('Latitude', 'Longitude')->where('Title', $title)->get();
        return $results;
    }
}
