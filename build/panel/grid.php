<div class="builder_panel">
    <div class="builder_item">
        <div class="item_top">
            <h3>
                Grid Layout
                <span><a id="close_all">Cloase All</a> <a id="open_all">Expand All</a></span>
            </h3>
        </div>

        <select style="display:none" id="cats_default">
            <?php foreach ($categories as $key => $option) { ?>
            <option value="<?php echo $key ?>"><?php echo $option; ?></option>
            <?php } ?>
        </select>
        
        <div class="item_bot">
            <a class="add_item" data-title="Loop 6 Posts" title="Grid Layouts 6 Posts | Silo" data-style="g6">
                <img src="<?php echo SILO_URI . '/build/image/grid-post-6.png'; ?>">
            </a>
            <a class="add_item" data-title="Loop 9 Posts" title="Grid Layouts 9 Posts | Silo" data-style="g9">
                <img src="<?php echo SILO_URI . '/build/image/grid-post-9.png'; ?>">
            </a>
        </div>

        <ul id="item_list" class="item_list">
        <?php
            $i=0;
            if( !empty( $grids ) && is_array( $grids )){
                foreach( $grids as $grid ){ $i++; ?>
                <li id="grid_item_<?php echo $i ?>" class="grid_item">
                    <div class="grid_header">
                        <h3 class="grid_title">
                            Grid Layout: <?php if( !empty($grid['cat'])) echo get_the_category_by_ID( $grid['cat'] ); ?>
                            <a style="display:none;" class="toggle-open">+</a>
							<a style="display:block;" class="toggle-close">-</a>
                        </h3>
                    </div>

                    <div class="grid_body">
                        <label>
                            <span>Category: </span>
                            <select name="grid_layouts[<?php echo $i ?>][cat]" id="grid_layouts[<?php echo $i ?>][cat]">
                                <?php 
                                foreach( $categories as $key => $option ){ ?>
                                <option value="<?php echo $key ?>" <?php if( $grid['cat'] == $key ) echo 'selected'; ?>><?php echo $option ?></option>
                                <?php } ?>
                            </select>
                        </label>

                        <label>
                            <span>Post Number: </span>
                            <input type="number" name="grid_layouts[<?php echo $i ?>][num]" id="grid_layouts[<?php echo $i ?>][num]" value="<?php echo $grid['num']; ?>">
                        </label>

                        <label>
                            <span>Random Post: </span>
                            <div class="grid_checkbox <?php if( isset($grid['order']) && $grid['order'] == 'rand' ) echo 'disabled'; ?>">
                                <input <?php if( isset($grid['order']) && $grid['order'] == 'rand' ) echo 'checked'; ?> type="checkbox" name="grid_layouts[<?php echo $i ?>][order]" id="grid_layouts[<?php echo $i ?>][order]" value="rand">
                            </div>
                        </label>

                        <input type="hidden" name="grid_layouts[<?php echo $i ?>][style]" id="grid_layouts[<?php echo $i ?>][style]" value="<?php echo $grid['style'] ?>">
                        <a class="del-cat"></a>
                    </div>
                </li>
                <?php }
            }
        ?>
        </ul>

        <script>
            var nextCell = <?php echo $i + 1; ?>;
            var tempPath =' <?php echo SILO_URI; ?>';
        </script>
    </div>
</div>