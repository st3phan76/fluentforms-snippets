<?php
/**
 * Project: Fluent Forms — PHP-Translation
 * Description: Overrides FluentForms language strings using a gettext filter
 * 
 *
 * @author   st3phan76
 * @profile  https://github.com/st3phan76
 * @version  1.0.0
 *
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
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