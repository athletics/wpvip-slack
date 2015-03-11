<?php

/**
 * WordPress VIP to Slack Commit WebHook
 *
 * @see http://lobby.vip.wordpress.com/2014/03/05/commit-webhook/
 */

$accounts = array(
	array(
		'endpoint' => '',
		'channel' => '',
	),
);

if ( ! isset( $_REQUEST['repo'] ) || $_REQUEST['repo'] !== 'vip' ) {
	return;
}

array_map( function ( $account ) {

	$payload = array(
		'channel'    => $account['channel'],
		'username'   => 'vip-bot',
		'text'       => "[VIP][{$_REQUEST['theme']}] Commit Notification (r{$_REQUEST['revision']}) by {$_REQUEST['committer']}",
		'icon_emoji' => ':zap:',
	);

	$payload = array_map( 'urlencode', $payload );

	$ch = curl_init();

	curl_setopt( $ch, CURLOPT_URL, $account['endpoint'] );
	curl_setopt( $ch, CURLOPT_POST, count( $payload ) );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, 'payload=' . json_encode( $payload ) );

	$result = curl_exec( $ch );

	curl_close( $ch );

}, $accounts );