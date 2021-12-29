<?php
/**
 * Class video.
 *
 * @copyright 2018 Eduardo Kraus  {@link http://videofront.com.br}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class Video
{
    /**
     * Call for get player code.
     *
     * @param string $identifier
     * @param string $safetyplayer
     *
     * @return string
     */
    public static function getplayer ( $identifier, $safetyplayer )
    {
        $post = array(
            "identifier"   => $identifier,
            "safetyplayer" => $safetyplayer,
            "user_agent"   => $_SERVER[ 'HTTP_USER_AGENT' ],
            //'cmid'         => $cmid,
            //'matriculaid'  => $USER->id,
            //'nome'         => fullname ( $USER ),
            //'email'        => $USER->email
        );

        $baseurl = "api/videos/getplayer/";

        return self::load ( $baseurl, $post );
    }

    /**
     * Curl execution.
     *
     * @param string $baseurl
     * @param array  $post
     *
     * @return string
     */
    private static function load ( $baseurl, $post )
    {
        $ch = curl_init ();

        curl_setopt ( $ch, CURLOPT_URL, get_option ( 'videofront_url' ) . (substr(get_option ('videofront_url'), -1) != '/' ? '/' : '') . $baseurl );

        if ( $post != null ) {
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post );
        }

        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, array(
            "authorization:" . get_option ( 'videofront_token' )
        ) );

        $output = curl_exec ( $ch );
        curl_close ( $ch );

        return $output;
    }
}
