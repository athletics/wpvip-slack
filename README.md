wpvip-slack
===========

Slack WebHooks for WordPress VIP theme commits and deployments. Inspired by Venture Beat’s [implementation for HipChat](https://github.com/VentureBeat/wpvip-hipchat).

## Setup

- Create a new Slack [incoming webhook](https://my.slack.com/services/new/incoming-webhook)
- Set accounts in webhook scripts:
	- `team` - Your organization name taken from your Slack URL `https://[team].slack.com/`
	- `channel` - The channel to receive notifications (Example: `#general`)
	- `token` - The token from **Your Unique Webhook URL** `https://[team].slack.com/services/hooks/incoming-webhook?token=[token]`
- Upload webhook scripts to a public server
- Add `wpcom-meta.php` file to your WordPress VIP theme:
```php
<?php
/**
 * Deploy Webhook: http://example.com/path/to/deploy-webhook.php
 * Commit Webhook: http://example.com/path/to/commit-webhook.php
 */
```