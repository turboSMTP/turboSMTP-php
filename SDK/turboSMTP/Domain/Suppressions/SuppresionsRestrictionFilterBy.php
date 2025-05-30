<?php

namespace TurboSMTP\Domain\Suppressions;

enum SuppresionsRestrictionFilterBy: int
{
    case sender = 1;
    case recipient = 2;
    case reason = 3;
    case subject = 4;
}