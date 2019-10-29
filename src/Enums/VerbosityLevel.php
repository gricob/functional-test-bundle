<?php

namespace Gricob\FunctionalTestBundle\Enums;

class VerbosityLevel
{
    const QUIET = 16;
    const NORMAL = 32;
    const VERBOSE = 64;
    const VERY_VERBOSE = 128;
    const DEBUG = 256;

    public static function isValid(int $verbosity)
    {
        return in_array(
            $verbosity,
            [
                self::QUIET,
                self::NORMAL,
                self::VERBOSE,
                self::VERY_VERBOSE,
                self::DEBUG
            ]
        );
    }
}