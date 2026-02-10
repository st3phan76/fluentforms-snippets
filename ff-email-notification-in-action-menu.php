/**
 * Project: Fluent Forms — Add Email Notifications to action menu
 * Description: Adds translated Email Notification Link in action menu
 *
 * @author   st3phan76
 * @profile  https://github.com/st3phan76
 * @version  1.0.0
 *
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action('admin_footer', function() {
    global $pagenow;
    
    // run only on fluentform admin page
    if ($pagenow === 'admin.php' && isset($_GET['page']) && $_GET['page'] === 'fluent_forms') {
        // Hole die Übersetzungen serverseitig
        $notification_text = __('Email Notifications', 'fluentform');
        $settings_text = __('Settings', 'fluentform');
        ?>
        <script>
        jQuery(document).ready(function($) {
            // get translations
            var notificationText = <?php echo json_encode($notification_text); ?>;
            var settingsText = <?php echo json_encode($settings_text); ?>;
            
            // wait until ff interface is loaded
            var attempts = 0;
            var maxAttempts = 25;
            
            var addMenuItem = setInterval(function() {
                attempts++;
                
                var settingsLinks = $('.row-actions-item.ff_edit a:contains("' + settingsText + '")');
                
                if (settingsLinks.length > 0) {
                    clearInterval(addMenuItem);
                    
                    settingsLinks.each(function() {
                        var settingsLink = $(this);
                        var settingsItem = settingsLink.closest('.row-actions-item');
                        
                        if (settingsItem.next('.row-actions-item.ff_nachrichten').length === 0) {
                            var settingsUrl = settingsLink.attr('href');
                            var formIdMatch = settingsUrl.match(/form_id=(\d+)/);
                            var formId = formIdMatch ? formIdMatch[1] : '1';
                            
                            var nachrichtenUrl = '/wp-admin/admin.php?page=fluent_forms&form_id=' + formId + '&route=settings&sub_route=form_settings#/email-settings';
                            
                            var nachrichtenItem = $('<span class="row-actions-item ff_nachrichten">')
                                .append($('<a>')
                                    .attr('href', nachrichtenUrl)
                                    .text(notificationText));
                            
                            settingsItem.after(nachrichtenItem);
                            nachrichtenItem.before(' ');
                            nachrichtenItem.after(' ');
                        }
                    });
                }
                
                if (attempts >= maxAttempts) {
                    clearInterval(addMenuItem);
                }
            }, 200);
        });
        </script>
        <?php
    }
}, 99);
