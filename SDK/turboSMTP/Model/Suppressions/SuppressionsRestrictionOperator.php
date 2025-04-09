<?php

namespace TurboSMTP\Model\Suppressions;

enum SuppressionsRestrictionOperator: int
{
    case include = 1;
    case exclude = 2;
}