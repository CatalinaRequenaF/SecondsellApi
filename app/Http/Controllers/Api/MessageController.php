<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MessageController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @param  \App\Models\Chat  $chat
    * @return \Illuminate\Http\JsonResponse
    */
   public function index(Chat $chat)
   {
       $messages = $chat->messages;

       return response()->json($messages);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Chat  $chat
    * @return \Illuminate\Http\JsonResponse
    */
   public function store(Request $request, Chat $chat)
   {
       $message = $chat->messages()->create($request->all());

       return response()->json($message, 201);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Chat  $chat
    * @param  \App\Models\Message  $message
    * @return \Illuminate\Http\JsonResponse
    */
   public function show(Chat $chat, Message $message)
   {
       return response()->json($message);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Chat  $chat
    * @param  \App\Models\Message  $message
    * @return \Illuminate\Http\JsonResponse
    */
   public function update(Request $request, Chat $chat, Message $message)
   {
       $message->update($request->all());

       return response()->json($message);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Chat  $chat
    * @param  \App\Models\Message  $message
    * @return \Illuminate\Http\JsonResponse
    */
   public function destroy(Chat $chat, Message $message)
   {
       $message->delete();

       return response()->json(null, 204);
   }

   public function getAllMessagesFromChat(Chat $chat)
   {
    return response()->json($chat->messages);    
   }
}
