<?php

namespace Mailchimp\Types;

enum SignupFormStylesItemSelector: string
{
    case PageBackground = "page_background";
    case PageHeader = "page_header";
    case PageOuterWrapper = "page_outer_wrapper";
    case BodyBackground = "body_background";
    case BodyLinkStyle = "body_link_style";
    case FormsButtons = "forms_buttons";
    case FormsButtonsHovered = "forms_buttons_hovered";
    case FormsFieldLabel = "forms_field_label";
    case FormsFieldText = "forms_field_text";
    case FormsRequired = "forms_required";
    case FormsRequiredLegend = "forms_required_legend";
    case FormsHelpText = "forms_help_text";
    case FormsErrors = "forms_errors";
    case MonkeyRewardsBadge = "monkey_rewards_badge";
}
