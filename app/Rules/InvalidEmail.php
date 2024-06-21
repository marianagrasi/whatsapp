<?php

namespace App\Rules;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class InvalidEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $email;
    public function __construct($email = null)
    {
        $this->email = $email;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        // $contacts= Contact::where('user_id', auth()->user()->id)
        //     ->whereHas('user', fn($query)=> $query->where('email', $value))
        //     ->get();
        // if($contacts->count()>0){
        //     $fail('El email ya está en la lista de contactos');
        // }
        $contact = Contact::where('user_id', auth()->id())
            ->whereHas('user', function ($query) use ($value) {
                $query->where('email', $value)
                    ->when($this->email, function ($query) {
                        $query->where('email', '!=', $this->email);
                    });
            });

        if ($contact->count() > 0) {

            $fail('Este contacto ya se ha agregado');
        }
    }
}
