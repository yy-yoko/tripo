<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use App\Models\User; 

class UsersController extends Controller
{
    public function index()                                        
    {                                                      
        $users = User::orderBy('id','desc')->paginate(10);   
        return view('users.index', [                            
        'users' => $users,                                      
        ]);                                                 
    }                                                     
    
    public function show($id)                               
    {  
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $tripposts = $user->tripposts()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show', [
            'user' => $user,
            'tripposts' => $tripposts,
        ]);
    } 
}
