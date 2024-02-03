<?php
/**
 * Silohon Paid ADS Plugin
 * Include Content For Bot review
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$ContentTable = $wpdb->prefix . 'paid_bot';
$set_sql = $wpdb->get_results("SELECT * FROM  $ContentTable");

if( !empty( $set_sql )){ ?>

    <div class="paidmain_content">
        <header class="lpHeader">
            <div class="lpMenus">
            </div>

            <h1>Content for Bot</h1>
        </header>

        <?php 
        foreach( $wpdb->get_results("SELECT * FROM $ContentTable WHERE id='1'") as $key => $row ){
            $title = $row->title;
            $description = $row->desc;
            $thumbnail = $row->images;
            $content = $row->content;
        }
        ?>

        <form action="admin.php?page=sl_paid&tb=bot" method="post" class="paidForm">
            <?php if( isset($contentNotice_1) ){
                echo $contentNotice_1;
            } ?>

            <div class="formTitle">
                <input type="text" name="bot_title" id="bot_title" value="<?php echo $title; ?>" placeholder="Title Here ..." />
            </div>

            <div class="formShortDesc">
                <textarea name="bot_desc" id="bot_desc" placeholder="Meta description.."><?php echo $description; ?></textarea>
            </div>

            <div class="paid_thumb">
                <input type="url" name="bot_img" id="bot_img" placeholder="Thumbnail" value="<?php echo  $thumbnail; ?>">
                <button type="button" id="bot_change_img">Change</button>
            </div>

            <?php 
            
                wp_editor(
                    $content,
                    'bot_editor_1',
                    array(
                        'textarea_name'     =>  'bot_content_1',
                        'media_buttons'     =>  true,
                        'tinymce'           =>  true,
                        'textarea_rows'     =>  18,
                        'editor_height'     =>  500,
                        'default_editor'    =>  'tinymce',
                        'wpautop'           =>  false
                    )
                );
            
            ?>

            <div class="paid_submit_content">
                <button type="submit" name="bot_submit_article">Save</button>
            </div>
        </form>
    </div>

<?php
}