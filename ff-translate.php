<?php
/**
 * Fluent Forms — PHP Translation
 *
 * Overrides Fluent Forms language strings using a gettext filter.
 * This allows developers to customize form labels, messages, and interface text
 * programmatically without modifying core plugin files, ensuring updates remain safe.
 *
 * @package    FluentFormsSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
 */

add_filter( 'gettext', 'ff_translations', 20, 3 );

function ff_translations( $translated, $original, $domain ) {
    if ( $domain !== 'fluentform' ) {
        return $translated;
    }

    $strings = [
        'Submit' => 'Absenden',
		'Entries from All Forms' => 'Einträge aller Formulare',
        // ...
    ];

    return $strings[ $original ] ?? $translated;
}