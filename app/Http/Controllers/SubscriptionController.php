<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SubscriptionController extends Controller
{
    public function index(){
        return view('subscription.index');
    }

    public function subscribe(Request $request){
        $user = Auth::user();

        $user->update([
            'subscribed' => 1,
        ]);

        return redirect('/')->with('success', 'Betaling is succesvol gelukt!');
    }
}
