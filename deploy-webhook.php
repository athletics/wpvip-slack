<?php

/**
 * WordPress VIP to Slack Deploy WebHook
 *
 * @see http://lobby.vip.wordpress.com/2014/03/03/deploy-webhook/
 */

$channel  = '';
$endpoint = '';

if ( ! isset( $_REQUEST['repo'] ) || $_REQUEST['repo'] !== 'vip' ) return;

$payload = array(
	'channel'    => $channel,
	'username'   => 'vip-bot',
	'text'       => "[VIP][{$_REQUEST['theme']}] Deploy Notification (r{$_REQUEST['deployed_revision']}) by {$_REQUEST['deployer']}",
	'icon_emoji' => ':checkered_flag:',
);

$payload = array_map( 'urlencode', $payload );

$ch = curl_init();

curl_setopt( $ch, CURLOPT_URL, $endpoint );
curl_setopt( $ch, CURLOPT_POST, count( $payload ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, 'payload=' . json_encode( $payload ) );

$result = curl_exec( $ch );

curl_close( $ch );