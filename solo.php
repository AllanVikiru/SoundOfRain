<?php
/**
 * 
 * @package SoundOfRain
 */

/*
 Plugin Name: Sound of Rain
 Description: I got bored at work lol. Inspired by <a href = "https://wordpress.org/plugins/hello-dolly"> Hello Dolly</a> by <a href="https://ma.tt">Matt Mullenweg</a> and <a href="https://wordpress.org">WordPress.org</a>. Song: <a href= "https://www.youtube.com/watch?v=Tky406Tczwk">Sound of Rain</a> , performed by <a href="https://en.wikipedia.org/wiki/Solange_Knowles">Solange Knowles</a> (2019).
 Version: 1.0.1
 Author: Allan Vikiru
 Author URI: http://github.com/AllanVikiru
 License: GPLv2 or later
 Text Domain: sound-of-rain
 */

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

function get_lyric() {
	// Sound of Rain Lyrics 
    $lyrics = 
        "He think I don't want to tear it up
        We came all night long, won't you let it up?
        He think I won't want to tear it up
        We lit on our own, won't you let it up?
        Let's go, nobody givin', addressing me
        So nobody dress can effeminate me
        Let's go, nobody taking a joke like me
        So nobody dress can effeminate me
        He think I don't want to tear it up
        We came all night long, won't you let it up?
        He think I won't want to tear it up
        We lit on our own, won't you let it up?
        Let's go, nobody givin', addressing me
        So nobody dress can effeminate me
        Let's go, nobody taking a joke like me
        So nobody dress can effeminate me
        Whoa, oh-oh-oh
        (Whoa, whoa, whoa)
        Swangin' on them
        Swangin' on them, swangin' on them, swangin' on them days
        Swangin' on them days, swangin' on them days
        Swangin' on them, swangin' on them, swangin' on my ways
        Your girl, she go hard in the baste
        Swangin' on them, swangin' on them, swangin' on my ways
        Swangin' on my ways
        Swangin' on my ways
        I've been thinking like, 'Ayy, yo'
        And I've been thinking like, 'Ayy, yo' (sound of rain helps me let go of the pain)
        And I've been thinking like, 'Ayy, yo' (sound of rain helps me let go of the pain)";

    // Splits lyrics into individual lines.
    $lyrics = explode( "\n", $lyrics );

    // Randomly chooses a line.
    return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// Echoes the chosen line.
function sound_of_rain() {
    $chosen = get_lyric();
    $lang   = '';
    if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
    }

    printf(
        '<p id="rain"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
        __( 'Quote from Sound of Rain, by Solange.', 'sound-of-rain' ),
        $lang,
        $chosen
    );
}

// Set function to execute when admin_notices is called.
    add_action( 'admin_notices', 'sound_of_rain' );

// We need some CSS to position the paragraph.
function rain_css() {
    echo "
    <style type='text/css'>
    #rain {
        float: right;
        padding: 5px 10px;
        margin: 0;
        font-size: 12px;
        font-style: oblique;
        font-weight: bold;
        line-height: 1.6666;
    }
    .rtl #rain {
        float: left;
    }
    .block-editor-page #rain {
        display: none;
    }
    @media screen and (max-width: 782px) {
        #rain,
        .rtl #rain {
            float: none;
            padding-left: 0;
            padding-right: 0;
        }
    }
    </style>
    ";
}
// Set function to execute when admin_head is called.
    add_action( 'admin_head', 'rain_css' );
