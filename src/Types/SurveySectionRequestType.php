<?php

namespace Mailchimp\Types;

enum SurveySectionRequestType: string
{
    case Introduction = "introduction";
    case Context = "context";
    case Question = "question";
}
