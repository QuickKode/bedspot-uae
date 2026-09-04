<?php

namespace App\Http\Requests;

use App\Enums\GenderPreference;
use App\Enums\RoomType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'bills_included' => $this->boolean('bills_included'),
        ]);
    }

    public function rules(): array
    {
        return [
            'title'             => ['required', 'string', 'max:255'],
            'description'       => ['required', 'string', 'min:30', 'max:5000'],
            'emirate'           => ['required', Rule::in(['Dubai', 'Sharjah', 'Abu Dhabi', 'Ajman', 'Ras Al Khaimah', 'Fujairah', 'Umm Al Quwain'])],
            'area'              => ['required', 'string', 'max:100'],
            'address'           => ['nullable', 'string', 'max:255'],
            'monthly_rent'      => ['required', 'numeric', 'min:300', 'max:20000'],
            'security_deposit'  => ['nullable', 'numeric', 'min:0', 'max:50000'],
            'bills_included'    => ['boolean'],
            'room_type'         => ['required', Rule::enum(RoomType::class)],
            'gender_preference' => ['required', Rule::enum(GenderPreference::class)],
            'total_beds'        => ['required', 'integer', 'min:1', 'max:20'],
            'available_beds'    => ['required', 'integer', 'min:0', 'lte:total_beds'],
            'house_rules'       => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'available_beds.lte' => 'Available beds cannot exceed the total number of beds.',
            'description.min'    => 'Please write at least a couple of sentences so seekers know what they are getting.',
        ];
    }
}