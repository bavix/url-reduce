<?php

namespace App;

class HttpCodeConst
{

    // https://tools.ietf.org/html/rfc7231
    const B_CONTINUE            = 100;
    const B_SWITCHING_PROTOCOLS = 101;

    const B_OK                            = 200;
    const B_CREATED                       = 201;
    const B_ACCEPTED                      = 202;
    const B_NON_AUTHORITATIVE_INFORMATION = 203;
    const B_NO_CONTENT                    = 204;
    const B_RESET_CONTENT                 = 205;

    const B_MULTIPLE_CHOICES  = 300;
    const B_MOVED_PERMANENTLY = 301;
    const B_FOUND             = 302;
    const B_SEE_OTHER         = 303;

    const B_USE_PROXY          = 305;
    const B_UNUSED             = 306;
    const B_TEMPORARY_REDIRECT = 307;

    const B_BAD_REQUEST        = 400;
    const B_PAYMENT_REQUIRED   = 402;
    const B_FORBIDDEN          = 403;
    const B_NOT_FOUND          = 404;
    const B_METHOD_NOT_ALLOWED = 405;
    const B_NOT_ACCEPTABLE     = 406;

    const B_REQUEST_TIMEOUT = 408;
    const B_CONFLICT        = 409;
    const B_GONE            = 410;
    const B_LENGTH_REQUIRED = 411;

    const B_PAYLOAD_TOO_LARGE      = 413;
    const B_URI_TOO_LONG           = 414;
    const B_UNSUPPORTED_MEDIA_TYPE = 415;
    const B_EXPECTATION_FAILED     = 417;

    const B_INTERNAL_SERVER_ERROR = 500;
    const B_NOT_IMPLEMENTED       = 501;
    const B_BAD_GATEWAY           = 502;
    const B_SERVICE_UNAVAILABLE   = 503;
    const B_GATEWAY_TIMEOUT       = 504;
    const B_VERSION_NOT_SUPPORTED = 505;

    // https://tools.ietf.org/html/rfc2518
    const B_PROCESSING = 102;

    // https://tools.ietf.org/html/rfc7233
    const B_PARTIAL_CONTENT       = 206;
    const B_RANGE_NOT_SATISFIABLE = 416;

    // https://tools.ietf.org/html/rfc4918
    const B_MULTI_STATUS = 207;

    const B_UNPROCESSABLE_ENTITY = 422;
    const B_LOCKED               = 423;
    const B_FAILED_DEPENDENCY    = 424;

    const B_INSUFFICIENT_STORAGE = 507;

    // https://tools.ietf.org/html/rfc5842
    const B_ALREADY_REPORTED = 208;
    const B_LOOP_DETECTED    = 508;

    // https://tools.ietf.org/html/rfc3229
    const B_IM_USED = 226;

    // https://tools.ietf.org/html/rfc7232
    const B_NOT_MODIFIED        = 304;
    const B_PRECONDITION_FAILED = 412;

    // https://tools.ietf.org/html/rfc7538
    const B_PERMANENTLY_REDIRECT = 308;

    // https://tools.ietf.org/html/rfc7235
    const B_UNAUTHORIZED                  = 401;
    const B_PROXY_AUTHENTICATION_REQUIRED = 407;

    // https://tools.ietf.org/html/rfc2817
    const B_UPGRADE_REQUIRED = 426;

    // https://tools.ietf.org/html/rfc6585
    const B_PRECONDITION_REQUIRED           = 428;
    const B_TOO_MANY_REQUESTS               = 429;
    const B_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

    const B_NETWORK_AUTHENTICATION_REQUIRED = 511;

    // https://tools.ietf.org/html/rfc2295
    const B_VARIANT_ALSO_NEGOTIATES = 506;

    // https://tools.ietf.org/html/rfc2774
    const B_NOT_EXTENDED = 510;

}