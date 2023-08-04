<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Show extends Component
{

    public User $user;
    public string $name;
    #[Rule('required|email:rfc,dns', message: 'Please provide a post title')]
    public string $email;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $country;

    public bool $email_general;
    public bool $email_advertisement;
    public bool $email_upcoming;
    public bool $phone_general;
    public bool $phone_advertisement;
    public bool $phone_upcoming;

    public array $countries;

    public function mount(){
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->city = $this->user->city;
        $this->state = $this->user->state;
        $this->zip = $this->user->zip;
        $this->country = $this->user->country;
        $user_settings = $this->user->notification_settings;
        $this->email_general = $user_settings->email_general;
        $this->email_advertisement = $user_settings->email_advertisement;
        $this->email_upcoming = $user_settings->email_upcoming;
        $this->phone_general = $user_settings->phone_general;
        $this->phone_advertisement = $user_settings->phone_advertisement;
        $this->phone_upcoming = $user_settings->phone_upcoming;
        $this->countries = collect(Http::get('https://restcountries.com/v3.1/all?fields=name')->json())->sortBy('name')->toArray();
    }

    public function save(){
        // set the properties to the user object
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->address = $this->address;
        $this->user->city = $this->city;
        $this->user->state = $this->state;
        $this->user->zip = $this->zip;
        $this->user->country = $this->country;
        // save the user object
        $this->user->save();
        // send notification about the update
        session()->flash('success','Profile updated successfully');
    }
    public function render()
    {
        return view('livewire.profile.show')->extends('layouts.user');
    }
}
