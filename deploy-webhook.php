<?php

/**
 * WordPress VIP to Slack Deploy WebHook
 *
 * @see http://lobby.vip.wordpress.com/2014/03/03/deploy-webhook/
 */

$accounts = array(
	array(
		'team' => '',
		'channel' => '',
		'token' => '',
	),
);

if ( ! isset( $_REQUEST['repo'] ) || $_REQUEST['repo'] !== 'vip' ) {
	return;
}

array_map( function ( $account ) {

	$endpoint = "https://{$account['team']}.slack.com/services/hooks/incoming-webhook?token={$account['token']}";

	$payload = array(
		'channel'    => $account['channel'],
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

}, $accounts );