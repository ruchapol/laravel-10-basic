<?php

namespace App\Http\Requests;

use App\Enums\TicketStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
    public function rules(): array
    {
       return [
            // 'title' => ['required', 'string', 'max:255'],   // max of string type in migration
            // 'description' => ['required', 'string'],
            'title' => ['string', 'max:255'],   // max of string type in migration
            'description' => ['string'],
            'status' => ['string', Rule::in(array_column(TicketStatus::cases(), 'value'))],
            'attachment' => ['sometimes', 'file', 'mimes:jpg,jpeg,png,pdf'],
        ];
    }
    
}
