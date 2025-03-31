<?php

namespace TurboSMTP\Domain\Suppressions;

enum SuppressionSource: int
{
    case manual = 1;
    case bounce = 2;
    case spam = 3;
    case unsubscribe = 4;
    case validationfailed = 5;
}