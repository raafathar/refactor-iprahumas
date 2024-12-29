<?php

use App\Models\LetterHistory;
use Illuminate\Support\Facades\Auth;

if (!function_exists('format_date')) {
  function format_date($date, $format = 'F j, Y')
  {
    return \Carbon\Carbon::parse($date)->format($format);
  }
}

if (!function_exists('generate_letter_number')) {
  function generate_letter_number($data)
  {
    $new_sequence = (LetterHistory::whereYear('letter_date', now()->year)->max('number_sequence') ?? 0) + 1;
    $formatted_sequence = str_pad($new_sequence, 4, '0', STR_PAD_LEFT);
    $letter_type = "SK.ANGGOTA";

    $letter_number = "{$formatted_sequence}/" . config('app.name') . "/{$letter_type}/" . to_roman(now()->month) . "/" . now()->year;

    LetterHistory::create([
      'letter_number' => $letter_number,
      'number_sequence' => $new_sequence,
      'sender' => config('app.name'),
      'letter_type' => $letter_type,
      'letter_date' => now(),
      'recipient' => $data->name,
      'created_by' => Auth::user()->id,
    ]);

    return $letter_number;
  }
}

if (!function_exists('to_roman')) {
  function to_roman($number)
  {
    $map = [
      1000 => 'M',
      900 => 'CM',
      500 => 'D',
      400 => 'CD',
      100 => 'C',
      90 => 'XC',
      50 => 'L',
      40 => 'XL',
      10 => 'X',
      9 => 'IX',
      5 => 'V',
      4 => 'IV',
      1 => 'I'
    ];
    $result = '';

    foreach ($map as $value => $symbol) {
      while ($number >= $value) {
        $result .= $symbol;
        $number -= $value;
      }
    }

    return $result;
  }
}
