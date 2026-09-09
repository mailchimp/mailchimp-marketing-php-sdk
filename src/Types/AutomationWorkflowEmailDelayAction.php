<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailDelayAction: string
{
    case PreviousCampaignSent = "previous_campaign_sent";
    case PreviousCampaignOpened = "previous_campaign_opened";
    case PreviousCampaignNotOpened = "previous_campaign_not_opened";
    case PreviousCampaignClickedAny = "previous_campaign_clicked_any";
    case PreviousCampaignNotClickedAny = "previous_campaign_not_clicked_any";
    case PreviousCampaignSpecificClicked = "previous_campaign_specific_clicked";
    case EcommBoughtAny = "ecomm_bought_any";
    case EcommBoughtProduct = "ecomm_bought_product";
    case EcommBoughtCategory = "ecomm_bought_category";
    case EcommNotBoughtAny = "ecomm_not_bought_any";
    case EcommAbandonedCart = "ecomm_abandoned_cart";
    case CampaignSent = "campaign_sent";
    case OpenedEmail = "opened_email";
    case NotOpenedEmail = "not_opened_email";
    case ClickedEmail = "clicked_email";
    case NotClickedEmail = "not_clicked_email";
    case CampaignSpecificClicked = "campaign_specific_clicked";
    case Manual = "manual";
    case Signup = "signup";
    case MergeChanged = "merge_changed";
    case GroupAdd = "group_add";
    case GroupRemove = "group_remove";
    case MandrillSent = "mandrill_sent";
    case MandrillOpened = "mandrill_opened";
    case MandrillClicked = "mandrill_clicked";
    case MandrillAny = "mandrill_any";
    case Api = "api";
    case Goal = "goal";
    case Annual = "annual";
    case Birthday = "birthday";
    case Date = "date";
    case DateAdded = "date_added";
    case TagAdd = "tag_add";
}
