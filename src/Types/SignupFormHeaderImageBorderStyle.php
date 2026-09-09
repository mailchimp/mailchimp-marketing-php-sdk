<?php

namespace Mailchimp\Types;

enum SignupFormHeaderImageBorderStyle: string
{
    case None = "none";
    case Solid = "solid";
    case Dotted = "dotted";
    case Dashed = "dashed";
    case Double = "double";
    case Groove = "groove";
    case Outset = "outset";
    case Inset = "inset";
    case Ridge = "ridge";
}
