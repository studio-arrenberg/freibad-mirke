<?php

// Aktuelle veranstaltungen
$veranstaltungen = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> -1,
    'offset' => '0', 
    'meta_query' => array(
        'relation' => 'AND',
        'date_clause' => array(
            'key' => 'event_date',
            'value' => date("Y-m-d"),
            'compare'	=> '>=',
            'type' => 'DATE'
        ),
        'time_clause' => array(
            'key' => 'event_time',
            'compare'	=> '=',
        ),
    ),
    'orderby' => array(
        'date_clause' => 'ASC',
        'time_clause' => 'ASC',
    ),
);

if (count_query($veranstaltungen)) {
    set_query_var( 'veranstaltung', true);
    ?>

        <h1 class="heading-size-3 margin-bottom"><?php _e('Aktuelle Veranstaltungen', 'quartiersplattform'); ?> </h1>
        <?php card_list($veranstaltungen); 
        
        ?>

    <?php            
}

?>