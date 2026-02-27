/**
 * Fluent Forms — Duplicate Textfield Input
 *
 * Live-copies the input from one text field to another in Fluent Forms.
 * This allows users to automatically replicate data between fields as they type,
 * improving form usability and reducing redundant input.
 *
 * @package    FluentFormsSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
 */

(function () {
    function setupMirrorField() {
        const source = document.querySelector('input[name="fieldname_to_copy_from"]');
        const target = document.querySelector('input[name="fieldname_to_copy_to"]');
        if (!source || !target) return;

        source.addEventListener('input', function () {
            if (!target.dataset.manuallyEdited) {
                target.value = source.value;
                target.dispatchEvent(new Event('input', { bubbles: true }));
            }
        });

        target.addEventListener('input', function () {
            if (target.value !== source.value) {
                target.dataset.manuallyEdited = 'true';
            }
        });

        target.addEventListener('change', function () {
            if (target.value === '') {
                delete target.dataset.manuallyEdited;
            }
        });
    }

    const mirrorObserver = new MutationObserver(function () {
        setupMirrorField();
        mirrorObserver.disconnect();
    });
    mirrorObserver.observe(document.body, { childList: true, subtree: true });
})();