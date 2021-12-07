<?php

function load_style_script ()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'load_style_script');


function kama_excerpt( $args = '' ){
    global $post;

    if( is_string( $args ) ){
        parse_str( $args, $args );
    }

    $rg = (object) array_merge( [
        'maxchar'           => 350,
        'text'              => '',
        'autop'             => true,
        'more_text'         => 'Читать дальше...',
        'ignore_more'       => false,
        'save_tags'         => '',
        'sanitize_callback' => static function( string $text, object $rg ){
            return strip_tags( $text, $rg->save_tags );
        },
    ], $args );

    $rg = apply_filters( 'kama_excerpt_args', $rg );

    if( ! $rg->text ){
        $rg->text = $post->post_excerpt ?: $post->post_content;
    }

    $text = $rg->text;
    // strip content shortcodes: [foo]some data[/foo]. Consider markdown
    $text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text );
    // strip others shortcodes: [singlepic id=3]. Consider markdown
    $text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text );
    // strip direct URLs
    $text = preg_replace( '~(?<=\s)https?://.+\s~', '', $text );
    $text = trim( $text );

    // <!--more-->
    if( ! $rg->ignore_more && strpos( $text, '<!--more-->' ) ){

        preg_match( '/(.*)<!--more-->/s', $text, $mm );

        $text = trim( $mm[1] );

        $text_append = sprintf( ' <a href="%s#more-%d">%s</a>', get_permalink( $post ), $post->ID, $rg->more_text );
    }
    // text, excerpt, content
    else {

        $text = call_user_func( $rg->sanitize_callback, $text, $rg );
        $has_tags = false !== strpos( $text, '<' );

        // collect html tags
        if( $has_tags ){
            $tags_collection = [];
            $nn = 0;

            $text = preg_replace_callback( '/<[^>]+>/', static function( $match ) use ( & $tags_collection, & $nn ){
                $nn++;
                $holder = "~$nn";
                $tags_collection[ $holder ] = $match[0];

                return $holder;
            }, $text );
        }

        // cut text
        $cuted_text = mb_substr( $text, 0, $rg->maxchar );
        if( $text !== $cuted_text ){

            // del last word, it not complate in 99%
            $text = preg_replace( '/(.*)\s\S*$/s', '\\1...', trim( $cuted_text ) );
        }

        // bring html tags back
        if( $has_tags ){
            $text = strtr( $text, $tags_collection );
            $text = force_balance_tags( $text );
        }
    }

    // add <p> tags. Simple analog of wpautop()
    if( $rg->autop ){

        $text = preg_replace(
            [ "/\r/", "/\n{2,}/", "/\n/" ],
            [ '', '</p><p>', '<br />' ],
            "<p>$text</p>"
        );
    }

    $text = apply_filters( 'kama_excerpt', $text, $rg );

    if( isset( $text_append ) ){
        $text .= $text_append;
    }

    return $text;
}

