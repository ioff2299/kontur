<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('index');
    }

    public function store(ContactRequest $request): \Illuminate\Http\JsonResponse
    {

        $validatedData = $request->validated();

        $contact = Contact::create($validatedData);

        event(new \App\Events\ContactCreated($contact));

        return response()->json(['message' => 'Contact saved successfully']);
    }

}
