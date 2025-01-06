<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class AfterSpecific implements ValidationRule
{
    public function __construct(
        public $date,
        public string $column,
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Carbon::parse($value) < Carbon::parse($this->date)) {
            $fail("validation.after")->translate(["date" => $this->column]);
        }
    }
}
