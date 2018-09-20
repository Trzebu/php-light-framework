<?php

return [
    "max" => [
        "numeric" => ":attribute nie może być większe niż :max.",
    ],
    "min" => [
        "numeric" => ":attribute musi być większe niż :min.",
    ],
    "numeric" => ":attribute musi być liczbą.",
    "string" => [
        "str" => ":attribute musi być ciągiem znaków.",
        "min" => ":attribute musi mieć więcej niż :min znaków.",
        "max" => ":attribute nie może mieć więcej niż :max znaków."
    ],
    "alpha" => [
        "letters" => ":attribute może zawierać tylko litery.",
        "num" => ":attribute może zawierać tylko litery i cyfry.",
    ],
    "is_valid" => [
        "email" => ":attribute musi być poprawnym adresem e-mail.",
        "url" => ":attribute musi być poprawnym adresem URL.",
    ],
    "same" => ":attribute i :other muszą być takie same.",
    "required" => ":attribute jest wymagany.",
    "unique" => ":attribute jest już zajęty.",
    "token" => "Token wygasł. Spróbuj ponownie.",
    "accepted" => ":attribute musi zostać zaakceptowany.",
    "image" => ":attribute musi być grafiką.",
];
