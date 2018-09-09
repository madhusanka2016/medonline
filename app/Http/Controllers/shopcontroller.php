<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopcontroller extends Controller
{
    public function product()
    {
        return view('product');
    }
    public function getProduct($type)
    {
        $proArr = ["Prescription Medicine", "Diabetes", "Home Medicine", "First Aid", "Mother & Baby", "Wellness", "Personal Care", "Skin Care", "Health Care", "Pet Care", "Supplements"];
        $catArr = ["Prescription Medicine" => 1 , "Diabetes" => 2, "Home Medicine" => 3, "First Aid" => 4, "Mother & Baby" => 5, "Wellness" =>6 , "Personal Care" => 7, "Skin Care" => 8 , "Health Care" => 9, "Pet Care" => 10 , "Supplements" => 11];

        if (in_array($type, $proArr)) {
            $catno = $catArr[$type];
            $items = DB::select("SELECT * FROM item where i_cat='" . $catno . "'");
            $Title=$type;

           // $items= 5;
            return view('product', ['items' => $items,'Title' => $Title,'catnum' => $catno  ]);

        }
    }
    public function searchProduct(Request $request)
    {
        dd($request);
            $id = $request->input('searchinput');

            $items = DB::select("SELECT * FROM item where i_name LIKE '" . $id . "'");
            $Title="Search";

            // $items= 5;
            return view('product', ['items' => $items,'Title' => $Title ]);


    }
}
