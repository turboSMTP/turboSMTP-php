<?php

namespace TurboSMTP\Domain;

enum RelayStatus: int
{
    case NEW = 1;
    case DEFER = 2;
    case SUCCESS = 3;
    case OPEN = 4;
    case CLICK = 5;
    case REPORT = 6;
    case FAIL = 7;
    case SYSFAIL = 8;
    case UNSUB = 9;
}