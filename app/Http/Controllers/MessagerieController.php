<?php

namespace App\Http\Controllers;


use App\Models\Messagerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MessagerieController extends Controller

{
    public function index()
{

    $messages = Messagerie::select('sender_mail', 'objet', 'the_message', 'date_envoi', 'vu')
                       ->where('target_mail', session('user_mail'))
                       ->orderByDesc('date_envoi')
                       ->get()
                       ->map(function ($message) {
                           $message->date_envoi = \Illuminate\Support\Carbon::parse($message->date_envoi)->format('M d');
                         return $message;
                       });


    return view('Professeur/Messagerie', ['messages' => $messages]);}
    public function index1()
{

    $messages = Messagerie::select('sender_mail', 'objet', 'the_message', 'date_envoi', 'vu')
                       ->where('target_mail', session('user_mail'))
                       ->orderByDesc('date_envoi')
                       ->get()
                       ->map(function ($message) {
                           $message->date_envoi = \Illuminate\Support\Carbon::parse($message->date_envoi)->format('M d');
                         return $message;
                       });


    return view('Admin/Messagerie', ['messages' => $messages]);}
    public function index2()
{

    $messages = Messagerie::select('sender_mail', 'objet', 'the_message', 'date_envoi', 'vu')
                       ->where('target_mail', session('user_mail'))
                       ->orderByDesc('date_envoi')
                       ->get()
                       ->map(function ($message) {
                           $message->date_envoi = \Illuminate\Support\Carbon::parse($message->date_envoi)->format('M d');
                         return $message;
                       });


    return view('Etudiant/Messagerie', ['messages' => $messages]);}

    public function showReceivedMessages()
    {
        $count_received = DB::table('messagerie')
                       ->where('target_mail', '=', session('user_mail'))
                       ->count();
        $messages = Messagerie::where('target_mail', session('email'))->orderByDesc('date_envoi')->get();

        return view('Professeur/Messagerie')->with('messages', $messages);}
    public function showReceivedMessages1()
    {
        $count_received = DB::table('messagerie')
                       ->where('target_mail', '=', session('user_mail'))
                       ->count();
        $messages = Messagerie::where('target_mail', session('email'))->orderByDesc('date_envoi')->get();

        return view('Admin/Messagerie')->with('messages', $messages);}
    public function showReceivedMessages2()
    {
        $count_received = DB::table('messagerie')
                       ->where('target_mail', '=', session('user_mail'))
                       ->count();
        $messages = Messagerie::where('target_mail', session('email'))->orderByDesc('date_envoi')->get();

        return view('Etudiant/Messagerie')->with('messages', $messages);}

    public function showSentMessages()
    {
        $count_sent = DB::table('messagerie')
                   ->where('sender_mail', '=', session('user_mail'))
                   ->count();

        $messages = Messagerie::where('sender_mail', session('user_mail'))->orderByDesc('date_envoi')->get();

        return view('Professeur/Messagerie')->with('messages', $messages);}
    public function showSentMessages1()
    {
        $count_sent = DB::table('messagerie')
                   ->where('sender_mail', '=', session('user_mail'))
                   ->count();

        $messages = Messagerie::where('sender_mail', session('user_mail'))->orderByDesc('date_envoi')->get();

        return view('Admin/Messagerie')->with('messages', $messages);}
    public function showSentMessages2()
    {
        $count_sent = DB::table('messagerie')
                   ->where('sender_mail', '=', session('user_mail'))
                   ->count();

        $messages = Messagerie::where('sender_mail', session('user_mail'))->orderByDesc('date_envoi')->get();

        return view('Etudiant/Messagerie')->with('messages', $messages);}


    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'target_mail' => 'required|email',
            'objet' => 'required',
            'the_message' => 'required',
        ]);

        $message = new Messagerie();
        $message->sender_mail = session('user_mail');
        $message->target_mail = $data['target_mail'];
        $message->objet = $data['objet'];
        $message->the_message = $data['the_message'];
        $message->date_envoi = now();
        $message->save();

        // Redirect back to the inbox page or to a success page
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

}
