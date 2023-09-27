<?php 
if( isset( $get_meta['silo_last'][0] )){
    $lasts = false;
    if( !empty( $get_meta['silo_last'][0] )){
        $lasts = $get_meta['silo_last'][0];
        if( is_serialized( $lasts )){
            $lasts = unserialize( $lasts );
        }
    }
}
?>

<div class="builder_panel">
    <div class="builder_item">
        <div class="section_top">
            <h3 class="top_title">Last Section</h3>
            <span id="last_sec" class="last_sec <?php if(empty($lasts['active'])) echo 'last_disabled'; ?>">
                <input <?php if(!empty($lasts['active'])) echo 'checked'; ?> type="checkbox" name="last[active]" id="last[active]" value="true">
            </span>
        </div>
        
        <select style="display:none" id="cats_default">
            <?php foreach ($categories as $key => $option) { ?>
            <option value="<?php echo $key ?>"><?php echo $option; ?></option>
            <?php } ?>
        </select>

        <div class="section_bot is_grid" <?php if(!empty($lasts['active'])) echo 'style="display:grid;"'; ?>>
            <img src="<?php echo SILO_URI . '/build/image/latest.png'; ?>">
            <div class="section_right">
                <label>
                    <span>Category: </span>
                    <select name="last[cat]" id="last[cat]">
                        <?php foreach( $categories as $key => $option ) : ?>
                        <option value="<?php echo $key ?>" <?php if($lasts['cat'] == $key ) echo 'selected'; ?>><?php echo $option ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label>
                    <span>Post Number: </span>
                    <input type="number" name="last[num]" id="last[num]" value="<?php if(!empty($lasts['num'])) : echo $lasts['num']; else : echo 5; endif; ?>">
                </label>

                <label>
                    <span>Random: </span>
                    <div id="last_rand" class="last_rand <?php if( $lasts['order'] != 'rand') echo 'disabled'; ?>">
                        <input <?php if( $lasts['order'] == 'rand') echo 'checked'; ?> type="checkbox" name="last[order]" id="last[order]" value="rand">
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>