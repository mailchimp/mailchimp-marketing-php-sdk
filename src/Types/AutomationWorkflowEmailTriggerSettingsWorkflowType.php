<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailTriggerSettingsWorkflowType: string
{
    case AbandonedBrowse = "abandonedBrowse";
    case AbandonedCart = "abandonedCart";
    case Api = "api";
    case BestCustomers = "bestCustomers";
    case CategoryFollowup = "categoryFollowup";
    case DateAdded = "dateAdded";
    case EmailFollowup = "emailFollowup";
    case EmailSeries = "emailSeries";
    case GroupAdd = "groupAdd";
    case GroupRemove = "groupRemove";
    case Mandrill = "mandrill";
    case ProductFollowup = "productFollowup";
    case PurchaseFollowup = "purchaseFollowup";
    case RecurringEvent = "recurringEvent";
    case SpecialEvent = "specialEvent";
    case VisitUrl = "visitUrl";
    case WelcomeSeries = "welcomeSeries";
}
