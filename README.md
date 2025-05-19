[turboSMTP_home]: https://serversmtp.com/
[api_reference]: https://serversmtp.com/turbo-api/
[turboSMTP_sign_up]: https://serversmtp.com/en/tsmtpregistration1.php
[turboSMTP_analytics_dashboard]: https://dashboard.serversmtp.com/analytics/overview
[turboSMTP_webhooks_reference]: https://serversmtp.com/event-webhook-reference/
[turboSMTP_about_us]: https://serversmtp.com/about-us/
[turboSMTP_contact_us]: https://serversmtp.com/contact-us/
[turboSMTP_api_keys]: https://serversmtp.com/understanding-and-creating-api-keys-with-turbosmtp-a-comprehensive-guide/
[sdk_email]: mailto:sdk@turbo-smtp.com

<img class="header-image is-logo-image" alt="smtp mail server – professional SMTP service provider" src="https://serversmtp.com/wp-content/uploads/2022/02/logo_2021-2.svg" width="290" height="56">

# turboSMTP-php SDK
The **Official turboSMTP PHP** SDK - enables .PHP Developers to work with [turboSMTP API][api_reference] efficiently.

* [turboSMTP Home][turboSMTP_home]
* [turboSMTP API documentation][api_reference]
  
## Table of contents

- [Release notes](#release-notes)
- [Getting Started](#getting-started)
  - [Requirements](#requirements)
  - [API Key](#api-key)
- [Quick start with TurboSMTP Client](#quick-start-with-turbosmtp-client)
  - [TurboSMTP Client Configuration Initialization](#turbosmtp-client-configuration-initialization)
  - [TurboSMTP Client Initialization](#turbosmtp-client-initialization)
  - [TurboSMTP Client Hello World Email example](#turbosmtp-client-hello-world-email-example)
- [Usage](#usage)
  - [SDK Library Documentation](USAGE.md)
  - [Common SDK Use Cases Examples](USE_CASES.md)
- [Contribute](#contribute)
  - [Reporting Bugs](CONTRIBUTING.md#reporting-bugs)
  - [Requesting New Features](CONTRIBUTING.md#requesting-new-features)
  - [How to Submit an Issue or Feature Request](CONTRIBUTING.md#how-to-submit-an-issue-or-feature-request)
- [Troubleshooting](#troubleshooting)
- [About](#about)
- [Support](#support)
- [License](#license)

## Release notes

Changes to the SDK beginning with version 2.0.0 (December 2024) are tracked in [CHANGELOG.md][changes-file].

## Getting Started

### Requirements

- **PHP 8.3+**.
- **A turboSMTP account**, [sign up for free][turboSMTP_sign_up] to send up to 6.000 FREE emails per month (No Obligation - No Credit card required).

### API Key

**<span style="color:red">Review</span>**.
Create your API Key from [turboSMTP Dashboard][turboSMTP_api_keys].

## Quick start with TurboSMTP Client

In order to facilitate construction and usage of **TurboSMTPClientConfiguration**, a **TurboSMTPClientConfigurationBuilder** has been facilitated implementing a *Builder* design pattern:

### TurboSMTP Client Configuration Initialization

As stated above, **TurboSMTPClientConfiguration** uses a builder design pattern (**TurboSMTPClientConfigurationBuilder**) that allows to setup your `ConsumerKey` and `Secret`, option for `EuropeanUser` and your `Timezone` that will be used to consume time sensitive data, like when filtering data by dates.

```php
<?php

namespace SampleNameSpace;

use TurboSMTP\TurboSMTPClientConfigurationBuilder;

class Sample 
{
    public function sample_method()
    {
        $configurationBuilder = new TurboSMTPClientConfigurationBuilder();

        $configuration = $configurationBuilder
                ->setConsumerKey(AppConstants::ConsumerKey)
                ->setConsumerSecret(AppConstants::ConsumerSecret)
                ->setEuropeanUser(AppConstants::EuropeanUser)
                ->build();
    } 
}
```

### TurboSMTP Client Initialization

In order to create a **TurboSMTPClient** simply pass a **TurboSMTPClientConfiguration** to it´s constructor as:

```php
<?php

namespace SampleNameSpace;

use TurboSMTP\TurboSMTPClientConfigurationBuilder;
use TurboSMTP\TurboSMTPClient;

class Sample 
{
    public function sample_method()
    {
        $configurationBuilder = new TurboSMTPClientConfigurationBuilder();

        $configuration = $configurationBuilder
                ->setConsumerKey(AppConstants::ConsumerKey)
                ->setConsumerSecret(AppConstants::ConsumerSecret)
                ->setEuropeanUser(AppConstants::EuropeanUser)
                ->build();

        $ts_client = new TurboSMTPClient($configuration);                
    } 
}
```

### TurboSMTP Client Hello World Email example

```php
<?php

namespace SampleNameSpace;

use TurboSMTP\TurboSMTPClientConfigurationBuilder;
use TurboSMTP\TurboSMTPClient;
use TurboSMTP\Domain\EmailMessage\EmailMessageBuilder;

class Sample 
{
    public function sample_method()
    {
        $configurationBuilder = new TurboSMTPClientConfigurationBuilder();

        $configuration = $configurationBuilder
                ->setConsumerKey(AppConstants::ConsumerKey)
                ->setConsumerSecret(AppConstants::ConsumerSecret)
                ->setEuropeanUser(AppConstants::EuropeanUser)
                ->build();

        $ts_client = new TurboSMTPClient($configuration);
        
        $emailBuilder = new EmailMessageBuilder();
        // Build the email message
        $emailMessage = $emailBuilder
            ->setFrom('sender@yourdomain.com')
            ->addTo('recipient@domain.com')
            ->setSubject('Hello World Simple Email')
            ->setHtmlContent('This email has been sent using <b>turboSMTP SDK</b>.')
            ->build(); // Call build to get the EmailMessage instance
        
        //Send the Email Message.
        $result = $ts_client->getEmailMessages()->SendAsync($emailMessage)->wait();

        //Print the returned message ID.
        echo $result->getMessageID();    
    } 
}
```

*After executing the above code, `$result->getMessage()` should be `OK` and `$result->getMessageID()` should contain a reference number to your sending operation, and you should have an email in the inbox of the `to` recipient. You can check the status of your email [in the UI][turboSMTP_analytics_dashboard], or using **TurboSMTPClient->getRelays()->queryAsync()** method. Alternatively, we can post events to a URL of your choice using our [Event Webhooks][turboSMTP_webhooks_reference]. This gives you information about the events that occur as turboSMTP processes your email.* 

# Usage

- [SDK Library Documentation](USAGE.md)
- [Common SDK Use Cases Examples](USE_CASES.md)

# Contribute

Thank you for considering contributing to our SDK! We welcome all forms of contributions, including bug reports and feature requests. 

Your feedback is invaluable in helping us improve and expand our SDK, please refere to our [CONTRIBUTING](CONTRIBUTING.md) guide for details.

For any inquiries, you can contact us at the following email address:

**Email:** [sdk@turbo-smtp][sdk_email]

Quick links:

- [Reporting Bugs](CONTRIBUTING.md#reporting-bugs)
- [Requesting New Features](CONTRIBUTING.md#requesting-new-features)
- [How to Submit an Issue or Feature Request](CONTRIBUTING.md#how-to-submit-an-issue-or-feature-request)

# Troubleshooting

Please see our [troubleshooting guide](TROUBLESHOOTING.md) for common library issues.

# About

turboSMTP-php is maintained and funded by [Turbo SMTP][turboSMTP_about_us] Company. The names and logos for turboSMTP-php are trademarks of TurboSMTP Company.

# Support

If you need help using Turbo SMTP SDK, please check the [TurboSMTP Support Help Center][turboSMTP_contact_us].

# License

This SDK is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.