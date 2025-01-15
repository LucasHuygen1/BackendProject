<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class AdminContactController extends Controller
{
    /**
     * show alle contact vragen
     */
    public function index()
    {
        //op basis van datum, laatste laatst
        $contacts = ContactForm::latest()->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }
    
}
