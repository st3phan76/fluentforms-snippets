/**
 * Project: Fluent Forms — Duplicate Textfield
 * Description: Copies or duplicates the input from one text field to another live.
 *
 * @author   st3phan76
 * @profile  https://github.com/st3phan76
 * @version  1.0.0
 *
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
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