<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Table;
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
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'table_id' => 'table',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $table = Table::query()->find($this->table_id)->load([
            'reservations' => function ($query) {
                $query->whereBetween('date', [now()->format('Y-m-d'), now()->addWeek()->format('Y-m-d')]);
            }
        ]);

        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'date' => [
                'required',
                'date',
                'after_or_equal:today',
                'before_or_equal:+1 week',
            ],
            'guest_number' => [
                'required',
                'integer',
                'max:20',
                function (string $attribute, mixed $value, \Closure $fail) use ($table) {
                    if ($value > $table->guest_number) {
                        $fail("Please choose the table base on guests.");
                    }
                }
            ],
            'table_id' => [
                'required',
                'integer',
                function (string $attribute, mixed $value, \Closure $fail) use ($table) {
                    if (!$table) {
                        $fail("The :attribute is invalid.");
                    }
                },
                function (string $attribute, mixed $value, \Closure $fail) use ($table) {
                    foreach ($table->reservations as $reservation) {
                        if ($reservation->date == $this->date) {
                            $fail("The :attribute is reserved for this day.");
                        }
                    }
                }
            ]
        ];
    }
}
