<?php

namespace TurboSMTP\Model\Relays;

enum RelayFilterCriteria: int
{
    case subject = 1;
    case sender = 2;
    case recipient = 3;
    case domain = 4;
}