<?php

namespace Mailchimp\Types;

enum SegmentTypeItemIpGeoCountryStateOp: string
{
    case Ipgeocountry = "ipgeocountry";
    case Ipgeonotcountry = "ipgeonotcountry";
    case Ipgeostate = "ipgeostate";
    case Ipgeonotstate = "ipgeonotstate";
}
