<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        try {
            // Obtener todos los usuarios con paginación
            $users = User::orderBy('created_at', 'desc')->paginate(10);
            
            // Contar total de usuarios
            $totalUsers = User::count();
            
            return view('users.index', compact('users', 'totalUsers'));
            
        } catch (\Exception $e) {
            return view('users.index', [
                'users' => collect([]),
                'totalUsers' => 0,
                'error' => $e->getMessage()
            ]);
        }
    }
}