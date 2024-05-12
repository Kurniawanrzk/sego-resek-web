<?php

namespace App\Http\Controllers;
use App\Models\{TipeMenu, Menu, Komen, AdminBalasKomen,TokenKomentar};
use Illuminate\Support\Facades\{Validator};

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $with = [
            "menu_makanan" => Menu::where("tipe_menu", "makanan")->offset(0)->limit(3)->get(),
            "menu_minuman" => Menu::where("tipe_menu", "minuman")->offset(0)->limit(3)->get(),
            "komen" => Komen::offset(0)->limit(2)->get()
        ];
        return view("home")->with("with", $with);
    }

    public function menu(Request $request)
    {
        $with = [
            "menu" =>$request->tipe == NULL ?  Menu::all() : Menu::where("tipe_menu", $request->tipe)->get(),
        ];
        return view("menu")->with("with", $with);
    }

    public function about()
    {
        return view("about");
    }

    public function komentar()
    {
        $with = [
            "menu" => Menu::all() ,
            "komentar" =>Komen::all()
        ];
        return view("komentar")->with("with", $with);;
    }

    public function post_komentar(Request $request) {
        $validator = Validator::make($request->all(), [
            "isi_komen" => "string|required",
            "token_komentar" =>"string|required"
        ]);
        if($validator->fails()) {
            return redirect()->back()->with("error","Scan barcode dan isi komentar!");
        } else if(!(TokenKomentar::where("token_komentar", $request->token_komentar)->exists())) {
            return redirect()->back()->with("error","Token telah tidak aktif atau token yang dimasukkan salah!");
        }

        $newKomen = new Komen;
        $res = $newKomen->create([
            "token_komentar" => $request->token_komentar,
            "komen" => $request->isi_komen
        ]);

        if($res) {
            return redirect()->route("komentar")->with("success","Komentar berhasil di tambahkan!");;
        }
    }
}
