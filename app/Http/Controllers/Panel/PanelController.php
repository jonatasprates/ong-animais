<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Donation;
use App\Models\Veterinary;
use App\User;

class PanelController extends Controller
{
    
    private $animal, $donation, $veterinary, $user;
    
    public function __construct(Animal $animal, Donation $donation, Veterinary $veterinary, User $user)
    {
        $this->animal = $animal;
        $this->donation = $donation;
        $this->veterinary = $veterinary;
        $this->user = $user;
    }
    
    public function index()
    {
        $animals = $this->animal->count();
        $donations = $this->donation->count();
        $veterinarys = $this->veterinary->count();
        $users = $this->user->count();
        
        return view('panel.home.index', compact('animals', 'donations', 'veterinarys', 'users'));
    }
}
