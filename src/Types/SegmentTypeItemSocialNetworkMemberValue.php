<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSocialNetworkMemberValue: string
{
    case Twitter = "twitter";
    case Facebook = "facebook";
    case Linkedin = "linkedin";
    case Flickr = "flickr";
    case Foursquare = "foursquare";
    case Lastfm = "lastfm";
    case Myspace = "myspace";
    case Quora = "quora";
    case Vimeo = "vimeo";
    case Yelp = "yelp";
    case Youtube = "youtube";
}
