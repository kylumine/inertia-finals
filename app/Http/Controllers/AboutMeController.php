<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutMeController extends Controller
{
    public function show()
    {
       
        $user = auth()->user();
        $aboutMeContent = $user ? $user->about_me : 'Tell me about yourself.';
    
        return Inertia::render('Portfolio', [
            'aboutMeContent' => $aboutMeContent,
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
    
        $user = User::find(auth()->id());
    
        if ($user) {
            $user->about_me = $request->content;
            $user->save();
        }
    
        return redirect()->back()->with('success', 'Content updated successfully.');
    }

    
}
