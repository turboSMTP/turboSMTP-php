<?php

namespace TurboSMTP\Model\Shared;

enum OrderType: int
{
    case Asc = 1;
    case Desc = 2;
}