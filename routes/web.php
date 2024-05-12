<?php

use App\Http\Controllers\Admin\{AdminsController};
use App\Http\Controllers\PageController;
use App\Http\Middleware\AdminAuthenticated;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', [PageController::class, "home"])->name('home');
    Route::post('/create/komentar', 'PageController@post_komentar')->name('post_komentar');
    Route::get('/about', 'PageController@about')->name('pages.about');
    Route::get('/komentar', 'PageController@komentar')->name('komentar');
    Route::get('/menu/{tipe?}', [PageController::class, "menu"])->name('menu');
    Route::prefix("/admin")->group(function() {
        Route::get("/login", [AdminsController::class, 'get_login'])
        ->name("admin_login_get");
        Route::post("/login", [AdminsController::class, 'post_login'])
        ->name("admin_login_post");

        Route::middleware(AdminAuthenticated::class)->group(function(){
            Route::get('dashboard', [AdminsController::class, 'admin_dashboard'])->name("admin_dashboard");
            Route::get("create/menu", [AdminsController::class, 'admin_add_menu'])->name("admin_add_menu");
            Route::post("create/token/post", [AdminsController::class, 'buat_token_komentar'])->name("buat_token_komentar");
            Route::post("create/menu/post", [AdminsController::class, 'admin_menu_post'])->name("admin_menu_post");
            Route::get("update/menu/{id}", [AdminsController::class, 'admin_update_menu'])->name("admin_update_menu");
            Route::put("update/menu/put/{id}", [AdminsController::class, 'admin_menu_put'])->name("admin_menu_put");
            Route::delete("delete/menu/{id}", [AdminsController::class, 'delete_menu'])->name("delete_menu");
            Route::get("menu", [AdminsController::class, "get_all_menu"])->name("get_all_menu");
            Route::get("komen", [AdminsController::class, "get_all_komen"])->name("get_all_komen");
            Route::get("kasir", [AdminsController::class, "kasir_page"])->name("kasir_page");
            Route::delete("delete/komen/{id}", [AdminsController::class, 'delete_komen'])->name("delete_komen");
            Route::delete("delete/balas/{id}", [AdminsController::class, 'delete_balasan'])->name("delete_balasan");
            Route::post("create/admin/komen/post", [AdminsController::class, 'admin_post_komen'])->name("admin_post_komen");

        });
        Route::post("/logout", [AdminsController::class, 'admin_logout'])->name('admin_logout');
    });

});
