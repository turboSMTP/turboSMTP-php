<?php

namespace TurboSMTP\Model\Relays;

enum RelayFilterCriteria: int
{
    case Subject = 1;
    case Sender = 2;
    case Recipient = 3;
    case Domain = 4;
}