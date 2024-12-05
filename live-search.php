<?php 
$search_data = $_POST['key'];
if ($search_data == "") {
} else {
        $countryData = $db->CustomQuery("SELECT country_name,country_slug from countries where country_name like '%{$search_data}%'");
        $consultancyData = $db->CustomQuery("SELECT consultancy_name,consultancy_slug from consultancies where consultancy_name like '%{$search_data}%'");
        $all = array_merge($countryData, $consultancyData); ?>
        <ul id="search-list"><?php if ($all == null) { ?><li><strong>No results Matched keyword:<?= $search_data ?></strong></li>
                        <?php } ?><?php if ($countryData == null) {
                                        } else { ?><li><a href="https://www.consultancynepal.com/country" style="text-decoration:none"><strong class="text-info">Countries</strong></a></li>
                <?php }
                                        foreach ($countryData as $results) { ?><li><a href="<?= $results->country_slug ?>" class="text-success"><?= $results->country_name ?></a></li>
                        <?php } ?><?php if ($consultancyData == null) {
                                        } else { ?><li><a href="https://www.consultancynepal.com/consultancy" style="text-decoration:none"><strong class="text-info">Consultancies</strong></a></li>
                <?php }
                                        foreach ($consultancyData as $results) { ?><li><a href="<?= $results->consultancy_slug ?>" class="text-secondary"><?= $results->consultancy_name ?></a></li><?php } ?></ul><?php } ?>