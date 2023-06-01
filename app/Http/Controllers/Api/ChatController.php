<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ChatController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $chats = Chat::all();

        return response()->json($chats);
    }

    public function getChatsFromUser(User $user)
    {
        $chats = Chat::all();
        $userChats= new Collection();
        foreach($chats as $chat){
        
        if($chat->emit==$user->id || $chat->recept==$user->id){
            $userChats->push($chat);
        }
        

        }

        return response()->json($userChats);    
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $chat = Chat::create($request->all());

        return response()->json($chat, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Chat $chat)
    {
        return response()->json($chat);
    }

    public function getOneFromUser()
    {
        $chats = Chat::all();

        return response()->json($chats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Chat $chat)
    {
        $chat->update($request->all());

        return response()->json($chat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json(null, 204);
    }
}
