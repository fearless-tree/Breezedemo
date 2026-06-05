<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PraktijkmanagementController extends Controller
{
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // View
        return view('Praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home',
        ]);
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

    public function manageUserroles() {
        $users = $this->userModel->sp_GetAllUsers(auth()->user()->id);

        return view('Praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen',
            'users' => $users,
        ]);
    }
}
