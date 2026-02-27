<?php
/**
 * Fluent Forms — Add Checkable Switch Style
 *
 * Adds a new visual style called 'Switch (Custom)' for radio buttons and checkboxes in Fluent Forms.
 * This allows users to toggle options with a modern switch interface.
 * Include the accompanying CSS file `ff-checkable-switch-style.css` in your theme or plugin to enable the style.
 *
 * @package    FluentFormsSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
 */

add_filter('fluentform/editor_element_customization_settings', function ($settings) {

    // Prüfen, ob layout_class vorhanden ist
    if (!empty($settings['layout_class']['options'])) {

        // Neuen Style hinzufügen
        $settings['layout_class']['options'][] = [
            'value' => 'ff_list_switch',
            'label' => __('Switch (Custom)', 'ff-a4u'),
        ];
    }

    return $settings;
}, 20);