<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Drink;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Drink $drink)
    {
        // Validatie
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // comment maken
        $drink->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        // terug naar dink pagina + validatie
        return redirect()->route('drinks.show', $drink)->with('status', 'Comment added!');
    }
}
