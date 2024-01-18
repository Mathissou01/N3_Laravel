<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    private static $users = array(
        array(
            'id' => 1,
            'name' => 'John Doe',
        ),
        array(
            'id' => 2,
            'name' => 'Jane Doe',
        ),
        array(
            'id' => 3,
            'name' => 'Johnny Doe',
        ),
        array(
            'id' => 4,
            'name' => 'Janie Doe',
        ),
        array(
            'id' => 5,
            'name' => 'Jean Doe',
        ),
    );
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Affichage utilisateur';
        $users = self::$users;

        return view('users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
