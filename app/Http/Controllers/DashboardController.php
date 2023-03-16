<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /** @var User */
        $user = $request->user();
        //$user = Auth::user();

        $myOrders = $user->orders()->paginate(5);
        //$myOrders = $user->orders;

        return Inertia::render('Dashboard', compact('myOrders'));
    }
}
