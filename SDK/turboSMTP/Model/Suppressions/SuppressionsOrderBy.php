<?php

namespace TurboSMTP\Model\Suppressions;

enum SuppressionsOrderBy: int
{
    case date = 1;
    case source = 2;
    case recipient = 3;
    case reason = 4;
}