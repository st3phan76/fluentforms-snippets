/**
 * Project: Fluent Forms — Add Checkable Switch Style
 * Description: Adds a new Style 'Switch (Custom)' to Radio and Checkboxes. Use it with ff-checkable-switch-style.css
 *
 * @author   st3phan76
 * @profile  https://github.com/st3phan76
 * @version  1.0.0
 *
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
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