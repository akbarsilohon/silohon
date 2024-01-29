<?php
if (isset($get_meta['silo_hero'][0])) {
    $heros = false;
    if (!empty($get_meta['silo_hero'][0])) {
        $heros = $get_meta['silo_hero'][0];
        if (is_serialized($heros)) {
            $heros = unserialize($heros);
        }
    }
}
?>

<div class="builder_panel">
    <div class="builder_item">
        <div class="section_top">
            <h3 class="top_title">Hero Post</h3>
            <span id="hero_sec" class="hero_sec <?php if (isset($heros['active']) && empty($heros['active'])) echo 'hero_disabled'; ?>">
                <input <?php if (isset($heros['active']) && !empty($heros['active'])) echo 'checked'; ?> type="checkbox" name="hero[active]" id="hero[active]" value="true">
            </span>
        </div>

        <select style="display:none" id="cats_default">
            <?php foreach ($categories as $key => $option) : ?>
                <option value="<?php echo $key ?>"><?php echo $option; ?></option>
            <?php endforeach; ?>
        </select>

        <div class="hero_bot" <?php if (isset($heros['active']) && !empty($heros['active'])) echo 'style="display:grid;"'; ?>>
            <img src="<?php echo SILO_URI . '/build/image/heroes.png'; ?>">
            <div class="hero_right">
                <label>
                    <span>Category: </span>
                    <select name="hero[cat]" id="hero[cat]">
                        <option value="" <?php if (isset($heros['cat']) && $heros['cat'] == '') echo 'selected'; ?>>Default</option>
                        <?php foreach ($categories as $key => $option) : ?>
                            <option value="<?php echo $key ?>" <?php if (isset($heros['cat']) && $heros['cat'] == $key) echo 'selected'; ?>><?php echo $option ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label>
                    <span>Post Number: </span>
                    <input type="number" name="hero[num]" id="hero[num]" value="<?php echo isset($heros['num']) ? $heros['num'] : 5; ?>">
                </label>

                <label>
                    <span>Random: </span>
                    <div id="hero_rand" class="hero_rand <?php if (isset($heros['order']) && $heros['order'] != 'rand') echo 'disabled'; ?>">
                        <input <?php if (isset($heros['order']) && $heros['order'] == 'rand') echo 'checked'; ?> type="checkbox" name="hero[order]" id="hero[order]" value="rand">
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>
