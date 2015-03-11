wpvip-slack
===========

Slack WebHooks for WordPress VIP theme commits and deployments. Inspired by Venture Beat’s [implementation for HipChat](https://github.com/VentureBeat/wpvip-hipchat).

## Setup

- Create a new Slack [incoming webhook](https://my.slack.com/services/new/incoming-webhook)
- Set accounts in webhook scripts:
    - `endpoint` - Use **Your Unique Webhook URL** from the Slack incoming webhook (Example: `https://[team].slack.com/services/hooks/incoming-webhook?token=[token]`)
    - `channel` - The channel to receive notifications (Example: `#general`)
- Upload webhook scripts to a public server
- Add `wpcom-meta.php` file to your WordPress VIP theme:
```php
<?php
/**
 * Deploy Webhook: http://example.com/path/to/deploy-webhook.php
 * Commit Webhook: http://example.com/path/to/commit-webhook.php
 */
```