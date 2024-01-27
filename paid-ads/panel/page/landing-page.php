<?php
/**
 * Silohon Paid ADS Plugin
 * Include landing page for Ads
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$ContentTable = $wpdb->prefix . 'paid_content';
$set_sql = $wpdb->get_results("SELECT * FROM  $ContentTable");

if( !empty( $set_sql )){ ?>

<div class="paidmain_content">
    <header class="lpHeader">
        <div class="lpMenus">
            <button type="button" class="paid_btn active" onclick="paidSection(1)">Content 1</button>
            <button type="button" class="paid_btn active" onclick="paidSection(2)">Content 2</button>
            <button type="button" class="paid_btn active" onclick="paidSection(3)">Content 3</button>
        </div>

        <h1>Create Content</h1>
    </header>

    <?php 
        foreach( $wpdb->get_results("SELECT * FROM $ContentTable WHERE id='1'") as $key => $row){
            $title_1 = $row->title;
            $title_2 = $row->title2;
            $title_3 = $row->title3;
            $desc_1 = $row->desc;
            $desc_2 = $row->desc2;
            $desc_3 = $row->desc3;
            $img_1 = $row->images;
            $img_2 = $row->images2;
            $img_3 = $row->images3;
            $content_1 = $row->content;
            $content_2 = $row->content2;
            $content_3 = $row->content3;
        } ?>

    <!-- Content 1 -->
    <form action="admin.php?page=sl_paid&tb=lp" class="paidForm" method="post" id="paidForm1">

        <?php if( isset($contentNotice_1) ){
            echo $contentNotice_1;
        } ?>

        <!-- title -->
        <div class="formTitle">
            <input type="text" name="paid_title_1" id="paid_title_1" value="<?php echo $title_1; ?>" placeholder="Title Here ..." />
        </div>

        <!-- Description -->
        <div class="formShortDesc">
            <textarea name="paid_desc_1" id="paid_desc_1" placeholder="Short Description.."><?php echo $desc_1; ?></textarea>
        </div>

        <!-- Thumbnail -->
        <div class="paid_thumb">
            <input type="url" name="paid_img_1" id="paid_img_1" placeholder="Thumbnail" value="<?php echo  $img_1; ?>">
            <button type="button" id="paid_change_img_1">Change</button>
        </div>

        <!-- COntent Body -->
        <?php 
            wp_editor(
                $content_1,
                'paid_editor_1',
                array(
                    'textarea_name'         =>  'paid_content_1',
                    'media_buttons'         =>  true,
                    'tinymce'               =>  true,
                    'textarea_rows'         =>  18,
                    'editor_height'         =>  500,
                    'default_editor'        =>  'tinymce',
                    'wpautop'               =>  false
                )
            );
        ?>

        <div class="paid_submit_content">
            <button type="submit" name="paid_submit_art_1">Save</button>
        </div>
    </form>

    <!-- Content 2 -->
    <form action="admin.php?page=sl_paid&tb=lp" class="paidForm" method="post" id="paidForm2">
        
        <?php if( isset( $notice_2 ) ){
            echo $notice_2;
        } ?>

        <!-- title -->
        <div class="formTitle">
            <input type="text" name="paid_title_2" id="paid_title_2" value="<?php echo $title_2; ?>" placeholder="Title Here ..." />
        </div>

        <!-- description -->
        <div class="formShortDesc">
            <textarea name="paid_desc_2" id="paid_desc_2" placeholder="Short Description.."><?php echo $desc_2; ?></textarea>
        </div>

        <!-- Thumbnail -->
        <div class="paid_thumb">
            <input type="url" name="paid_img_2" id="paid_img_2" placeholder="Thumbnail" value="<?php echo  $img_2; ?>">
            <button type="button" id="paid_change_img_2">Change</button>
        </div>

        <!-- content body -->
        <?php 
            wp_editor(
                $content_2,
                'paid_editor_2',
                array(
                    'textarea_name'         =>  'paid_content_2',
                    'media_buttons'         =>  true,
                    'tinymce'               =>  true,
                    'textarea_rows'         =>  18,
                    'editor_height'         =>  500,
                    'default_editor'        =>  'tinymce',
                    'wpautop'               =>  false
                )
            );
        ?>

        <div class="paid_submit_content">
            <button type="submit" name="paid_submit_art_2">Save</button>
        </div>

    </form>

    <!-- Content 3 -->
    <form action="admin.php?page=sl_paid&tb=lp" class="paidForm" method="post" id="paidForm3">
        <?php 
            if( isset( $notice_3 )){
                echo $notice_3;
            }
        ?>

        <!-- title -->
        <div class="formTitle">
            <input type="text" name="paid_title_3" id="paid_title_3" value="<?php echo $title_3; ?>" placeholder="Title Here ..." />
        </div>

        <!-- description -->
        <div class="formShortDesc">
            <textarea name="paid_desc_3" id="paid_desc_3" placeholder="Short Description.."><?php echo $desc_3; ?></textarea>
        </div>

        <!-- thumbnail 3 -->
        <div class="paid_thumb">
            <input type="url" name="paid_img_3" id="paid_img_3" placeholder="Thumbnail" value="<?php echo  $img_3; ?>">
            <button type="button" id="paid_change_img_3">Change</button>
        </div>

        <!-- content body -->
        <?php 
            wp_editor(
                $content_3,
                'paid_editor_3',
                array(
                    'textarea_name'         =>  'paid_content_3',
                    'media_buttons'         =>  true,
                    'tinymce'               =>  true,
                    'textarea_rows'         =>  18,
                    'editor_height'         =>  500,
                    'default_editor'        =>  'tinymce',
                    'wpautop'               =>  false
                )
            );
        ?>

        <!-- Submit post -->
        <div class="paid_submit_content">
            <button type="submit" name="paid_submit_art_3">Save</button>
        </div>
    </form>
</div>

<?php
}