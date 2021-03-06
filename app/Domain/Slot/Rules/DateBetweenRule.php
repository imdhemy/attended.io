<?php

namespace App\Domain\Slot\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateBetweenRule implements Rule
{
    /** @var \Carbon\Carbon */
    protected $startDate;

    /** @var \Carbon\Carbon */
    protected $endDate;

    /** @var string|null */
    protected $message;

    public function __construct(Carbon $startDate, Carbon $endDate)
    {
        $this->startDate = $startDate;

        $this->endDate = $endDate;
    }

    public function passes($attribute, $value)
    {
        $date = Carbon::parse($value);

        return $date->between($this->startDate, $this->endDate);
    }

    public function message(): string
    {
        return "This date must be between {$this->startDate->format('Y-m-d H:i')} and {$this->endDate->format('Y-m-d H:i')}";
    }
}
