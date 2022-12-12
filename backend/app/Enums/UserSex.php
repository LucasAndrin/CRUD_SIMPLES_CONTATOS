<?php

namespace App\Enums;

use function PHPUnit\Framework\matches;

enum UserSex: int
{
    case Male = 1;
    case Female = 2;
}
