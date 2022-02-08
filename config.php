<?php
    // The name and address which should be used for the sender details.
    // The name can be anything you want, the address should be something in your own domain. It does not need to exist as a mailbox.
    define('FROM_ADDRESS', 'weLearn@gmail.com');
    define('FROM_NAME', 'WeLearn');

    // The details of your SMTP service, e.g. Gmail.
    define('SMTP_HOSTNAME', 'smtp.gmail.com');
    define('SMTP_USERNAME', 'cmt322WeLearn@gmail.com');
    define('SMTP_PASSWORD', 'zxjpwbnpxfrdknsa');

    define('RECAPTCHA_SITE_KEY', '6Ld8ZBYbAAAAAFaxjWSRgZZCd2Jp29w7tf2mGCff');
    define('RECAPTCHA_SECRET_KEY', '6Ld8ZBYbAAAAAENvUkIx76B1wFbaqPpRsnJcLs9B');

    /**
     * Optional Settings
     */

    // The debug level for PHPMailer. Default is 0 (off), but can be increased from 1-4 for more verbose logging.
    define('PHPMAILER_DEBUG_LEVEL', 0);

    // Which SMTP port and encryption type to use. The default is probably fine for most use cases.
    define('SMTP_PORT', 587);
    define('SMTP_ENCRYPTION', 'tls');
?>