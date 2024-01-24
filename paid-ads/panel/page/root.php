<div class="paid_dash">
    <div class="paid_card">
        <?php 
            $phpVersion = phpversion();
            $maxUploadSize = ini_get('upload_max_filesize');
            $maxPostSize = ini_get('post_max_size');
            $memoryLimit = ini_get('memory_limit');
            $maxExecutionTime = ini_get('max_execution_time'); ?>
            <h1 class="php_h">PHP Info</h1>
            <ul class="php_item">
                <li class="php_list">
                    <span class="disk">Version</span>
                    <span class="desk">: <?php echo $phpVersion; ?></span>
                </li>
                <li class="php_list">
                    <span class="disk">Max Upload Size</span>
                    <span class="desk">: <?php echo $maxUploadSize; ?>B</span>
                </li>
                <li class="php_list">
                    <span class="disk">Max Post Size</span>
                    <span class="desk">: <?php echo $maxPostSize; ?>B</span>
                </li>
                <li class="php_list">
                    <span class="disk">Memory Limit</span>
                    <span class="desk">: <?php echo $memoryLimit; ?>B</span>
                </li>
                <li class="php_list">
                    <span class="disk">Max Execution Time</span>
                    <span class="desk">: <?php echo $maxExecutionTime; ?></span>
                </li>
            </ul>
    </div>

    <div class="paid_card">
        <?php 
            global $wpdb;
            $table_name = $wpdb->prefix . 'paid_license';
            $query_all = "SELECT * FROM $table_name";
            $results_all = $wpdb->get_results($query_all);

            $data_id_1 = null;
            foreach ($results_all as $row) {
                if ($row->id == 1) {
                    $data_id_1 = $row;
                    break;
                }
            }

            if( $data_id_1 ){
                $email = trim(strtolower($data_id_1->email));
                $lisensi = trim(strtolower($data_id_1->lisensi));
                $last_update = $data_id_1->last_update;

                $expiration_date = date('Y-m-d', strtotime($last_update . ' + 365 days'));
                $days_used = floor((time() - strtotime($last_update)) / (60 * 60 * 24));
                $days_remaining = floor((strtotime($expiration_date) - time()) / (60 * 60 * 24));

                echo '
                    <canvas id="paid_card"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById("paid_card");
                        new Chart( ctx, {
                            type: "doughnut",
                            data: {
                                labels: ["Remaining ' .$days_remaining. ' days", "Usage ' .$days_used. ' days"],
                                datasets: [{
                                    data: [ '. $days_remaining .', '. $days_used .' ],
                                    backgroundColor: [
                                        "#2271b1",
                                        "#ff385c"
                                    ]
                                }]
                            }
                        });
                    </script>
                ';
            }
        ?>
    </div>

    <div class="paid_card">
        <h1>License Information</h1>
        <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'paid_license';
            $query_all = "SELECT * FROM $table_name";
            $results_all = $wpdb->get_results($query_all);

            $data_id_1 = null;
            foreach ($results_all as $row) {
                if ($row->id == 1) {
                    $data_id_1 = $row;
                    break;
                }
            }

            if( $data_id_1 ){
                $email = trim(strtolower($data_id_1->email));
                $lisensi = trim(strtolower($data_id_1->lisensi));
                $last_update = $data_id_1->last_update;
                $expiration_date = date('Y-m-d', strtotime($last_update . ' + 365 days')); ?>

                <form class="paidLic">
                    <label for="">
                        <span>Email:</span>
                        <input type="text" value="<?php echo substr( $email, 0, 5 ); ?> ******" readonly />
                    </label>

                    <label for="">
                        <span>License:</span>
                        <input type="text" value="<?php echo substr( $lisensi, 0, 5 ); ?> ******" readonly />
                    </label>

                    <label for="">
                        <span>Create Date:</span>
                        <input type="text" value="<?php echo date('Y-m-d', strtotime($last_update)); ?>" readonly />
                    </label>

                    <label for="">
                        <span>Expire Date:</span>
                        <input type="text" value="<?php echo date('Y-m-d', strtotime($expiration_date)); ?>" readonly />
                    </label>
                </form>
                <?php
            }
        ?>
    </div>

    <div class="paid_card">
        <h1>Link</h1>
        <?php 
            global $wpdb;
            $drLink = $wpdb->prefix . 'paid_direct';
            $findData = $wpdb->get_results("SELECT * FROM $drLink");

            if( $findData ){ ?>
                <ul class="paid_linkShow">
                    <?php 
                        foreach( $findData as $index => $data ){
                            $directLink = $data->direct_link;
                            $targetLink = esc_url( $data->target_link );
                            $trimmedDirectLink = str_replace('-', ' ', $data->direct_link); ?>
                            <li class="linkItem">
                                <span class="indexNumber"><?php echo $index + 1; ?></span>
                                <a target="_blank" href="<?php echo esc_url( home_url('/') . ltrim($directLink, '/') ); ?>">
                                    <?php echo esc_html($trimmedDirectLink); ?>
                                </a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
                <?php
            } else{ ?>

                <p class="paid_notice">
                    Empty direct link. Please create on <a href="admin.php?page=sl_paid&tb=link" class="paid_newDirect">this page =></a>.
                </p>

                <?php
            }
        ?>
    </div>
</div>
