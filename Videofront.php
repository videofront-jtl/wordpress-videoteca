<?php
/*
Plugin Name: VideoFront Videoteca auto-Embed
Version: 1.0.1
Plugin URI: https://www.videofront.com.br/
Author: Eduardo Kraus
Author URI: https://www.eduardokraus.com.com/
Description: Cria links automaticamente dos vídeos do Videoteca
*/

if ( !defined ( 'ABSPATH' ) ) {
    die();
}

if ( !class_exists ( 'Videofront' ) ) {
    require_once __DIR__ . "/includes/Video.php";
    require_once __DIR__ . "/includes/Settings.php";

    class Videofront
    {
        public function __construct ()
        {
            new Settings();

            add_filter ( 'the_content', array( $this, 'video_embed' ), 10, 3 );
            add_filter ( 'the_content_feed', array( $this, 'video_embed_feed' ), 10, 3 );
        }

        public function video_embed ( $content )
        {
            preg_match_all ( "/videoteca:\/\/\w+/", $content, $matches );

            foreach ( $matches[ 0 ] as $match ) {
                $identifier = preg_replace ( "/videoteca:\/\/(\w+)/", "$1", $match );

                $player = video::getplayer ( $identifier, "" );

                $content = str_replace ( $match, $player, $content );
            }

            return $content;
        }

        public function video_embed_feed ( $content )
        {
            preg_match_all ( "/videoteca:\/\/\w+/", $content, $matches );

            foreach ( $matches[ 0 ] as $match ) {
                $content = str_replace ( $match, "", $content );
            }

            return $content;
        }
    }

    $GLOBALS[ 'Videofront' ] = new Videofront();
}

