<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Wizard extends Component
{
    public $currentStep = 1;
    public $name, $username,$password;
    public $successMsg = '';
  
    /**
     * Write code on Method
     */
    public function render()
    {
        return view('livewire.wizard');
    }
  
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required'
        ]);
 
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     */
    public function submitForm()
    {
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
        ]);
  
        $this->successMsg = 'Usuario creado con exito.';
  
        $this->clearForm();
  
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
    }
}
