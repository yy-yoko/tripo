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
    
    public function followings($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $followings = $user->followings()->paginate(10);

        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        $followers = $user->followers()->paginate(10);

        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        $user->loadRelationshipCounts();

        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);
//dd($favorites);
        // フォロー一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'tripposts' => $favorites,
        ]);
    }
    public function information()
    {
        return view('information.information');
    }
    public function service()
    {
        return view('service.service');
    }
    public function appli()
    {
        return view('appli.appli');
    }
}
