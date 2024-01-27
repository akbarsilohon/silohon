<?php 
/**
 * Include short link for thi plugins
 * @package silohon
 * @link https://github.com/akbarsilohon/silohon.git
 */

global $wpdb;
$drLink = $wpdb->prefix . 'paid_direct';
$findData = $wpdb->get_results("SELECT * FROM $drLink"); ?>

<form action="admin.php?page=sl_paid&tb=link" method="post" class="slDirectLink">
    <div class="dlOntop">
        <h1 class="dlNew">Create New Link</h1>
        <p class="dlPn">Please add a <span class="warnaLain">new direct link</span> along with the target URL of your post. If you leave the <span class="warnaLain">target link</span> empty, the plugin will utilize a random method for the target link.</p>

        <?php
            if (isset($infoUpdate)) {
                echo $infoUpdate;
            }
        ?>

        <div class="dlNData">
            <input type="text" name="slDL_new" id="slDL_new" placeholder="New link" />
            <input type="text" name="slDL_tar" id="slDL_tar" placeholder="Link target" />
        </div>
        <button type="submit" class="submitDR" name="submitDR">Save Link</button>
    </div>

    <div class="dlOnbot">
        <?php 
            if( $findData ){ ?>
                <div class="dlDataRow">
                    <h1 class="tbTitle">All Direct Link</h1>
                    <table class="slTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Direct Link</th>
                                <th>Target Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            foreach( $findData as $index => $data ){
                                $directLink = $data->direct_link;
                                $targetLink = esc_url($data->target_link);
                                $trimmedDirectLink = str_replace('-', ' ', $data->direct_link); ?>

                                <tr>
                                    <td><span class="indexNumber"><?php echo $index + 1; ?></span></td>
                                    <td>
                                        <a target="_blank" href="<?php echo esc_url( home_url('/') . ltrim($directLink, '/') ); ?>"><?php echo esc_html($trimmedDirectLink); ?></a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?php echo $targetLink; ?>"><?php echo $data->target_link; ?></a>
                                    </td>
                                    <td class="sitokBagi2">
                                        <button type="button" class="copyAction" onclick="copyToClipboard('<?php echo esc_url( home_url('/') . ltrim($directLink, '/') ); ?>')">
                                            <span class="dashicons dashicons-admin-page"></span>
                                        </button>

                                        <a href="?page=sl_paid&amp;tb=link&amp;action=delete&amp;id=<?php echo $data->id; ?>" class="deleteAction" onclick="return confirm('Are you sure you want to delete this link?')">
                                            <span class="dashicons dashicons-trash"></span>
                                        </a>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
        ?>
    </div>
</form>

<script>
    function copyToClipboard(text) {
        var dummy = document.createElement("textarea");
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        alert("Link copied to clipboard: " + text);
    }
</script>