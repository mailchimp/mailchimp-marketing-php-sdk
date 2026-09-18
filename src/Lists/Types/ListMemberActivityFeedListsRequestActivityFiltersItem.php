<?php

namespace Mailchimp\Lists\Types;

enum ListMemberActivityFeedListsRequestActivityFiltersItem: string
{
    case Bounce = "bounce";
    case Click = "click";
    case Conversation = "conversation";
    case EcommerceSignup = "ecommerce_signup";
    case Event = "event";
    case WebEngagement = "web_engagement";
    case GenericSignup = "generic_signup";
    case LandingPageSignup = "landing_page_signup";
    case MarketingPermission = "marketing_permission";
    case Note = "note";
    case Open = "open";
    case Order = "order";
    case PostcardSent = "postcard_sent";
    case Sent = "sent";
    case Signup = "signup";
    case SquatterSignup = "squatter_signup";
    case Unsub = "unsub";
    case WebsiteSignup = "website_signup";
    case SurveyResponse = "survey_response";
    case SmsBulkSent = "sms_bulk_sent";
    case InboxThread = "inbox_thread";
    case QboPaymentLink = "qbo_payment_link";
    case VideoCallTranscripts = "video_call_transcripts";
    case WhatsappBulkSent = "whatsapp_bulk_sent";
    case WhatsappDelivered = "whatsapp_delivered";
}
