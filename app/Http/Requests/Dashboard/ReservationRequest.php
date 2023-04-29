<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'date' => [
                'required',
                'date',
                'after_or_equal:now',
                'before_or_equal:+1 week 23.00',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $pickupDate = Carbon::parse($value);
                    $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);

                    // when the restaurant is open
                    $earliestTime = Carbon::createFromTimeString('17:00:00');
                    $lastTime = Carbon::createFromTimeString('23:00:00');

                    return $pickupTime->between($earliestTime, $lastTime) ?
                        true :
                        $fail("The time should be between 17.00 and 23.00.");
                }
            ],
            'guest_number' => ['required', 'integer'],
            'table_id' => ['required', 'integer', 'exists:tables,id']
        ];
    }
}
