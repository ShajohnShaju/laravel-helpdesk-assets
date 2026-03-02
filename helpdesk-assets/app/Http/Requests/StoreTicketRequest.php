<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // any logged in user who can reach this endpoint is allowed to create a ticket
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // rules for the ticket creation
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'in:' . implode(',', \App\Models\Ticket::PRIORITIES)],
            'asset_id' => ['nullable', 'exists:assets,id'],
            'created_by_name' => ['required', 'string', 'max:255'],
        ];
    }
}
