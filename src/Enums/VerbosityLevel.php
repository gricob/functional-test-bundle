<?php

namespace Gricob\FunctionalTestBundle\Enums;

/**
 * @method static quiet()
 * @method static normal()
 * @method static verbose()
 * @method static veryVerbose()
 * @method static debug()
 */
class VerbosityLevel extends Enum
{
    const
        QUIET = 16,
        NORMAL = 32,
        VERBOSE = 64,
        VERY_VERBOSE = 128,
        DEBUG = 256;
}
