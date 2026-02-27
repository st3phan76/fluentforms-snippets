<?php
/**
 * Fluent Forms — Rename Upload File Name
 *
 * Replaces the default `ff-hash-ff` in uploaded file names with a custom prefix in Fluent Forms.
 * This allows developers to generate more readable and meaningful file names for uploads,
 * improving organization and file management.
 *
 * @package    FluentFormsSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
 */

add_filter('fluentform/uploaded_file_name', function($file, $originalFileArray, $formData, $form) {
    $allowedFormIds = [26, 29];

    if (!in_array((int) $form->id, $allowedFormIds)) {
        return $file;
    }

    $datetime = wp_date('Y-m-d_His', null, new DateTimeZone('Europe/Berlin'));
    $originalName = $originalFileArray['name'];
    $file['name'] = $datetime . '_' . $originalName;

    return $file;
}, 10, 4);