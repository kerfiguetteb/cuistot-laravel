<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {

    }

    public function show(string $slug, User $user ): RedirectResponse | View
    {
        $expectedSlug = $user->getSlug();
        if ($slug !== $expectedSlug){
            return to_route('users.show', ['slug' => $expectedSlug, 'user' => $user]);
        }
        return view('users.show', [
            "user" => $user
        ]);
    }
}
