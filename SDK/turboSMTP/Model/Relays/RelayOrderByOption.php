<?php

namespace TurboSMTP\Model\Relays;

enum RelayOrderByOption: int
{
    case SendTime = 1;
    case Sender = 2;
    case Recipient = 3;
    case Subject = 4;
}