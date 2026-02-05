<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Food;

Route::get('/foods', function (Request $request) {
    $search = $request->query('search');

    $q = Food::query();

    if ($search) {
        $q->where('name_en', 'like', "%{$search}%")
          ->orWhere('name_local', 'like', "%{$search}%");
    }

    return $q->orderBy('name_en')->limit(50)->get();
});
