<?php

namespace TurboSMTP\Model\Relays;

enum RelayOrderByOption: int
{
    case send_time = 1;
    case sender = 2;
    case recipient = 3;
    case subject = 4;
}