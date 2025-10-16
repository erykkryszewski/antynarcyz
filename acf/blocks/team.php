<?php
$url = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$section_id = get_field("section_id");
$background = get_field("background");
$team = get_field("team");

// Określ klasy kolumn na podstawie liczby elementów
$team_count = !empty($team) ? count($team) : 0;
$col_class = "col-6 col-md-4"; // domyślnie

if ($team_count == 4) {
    $col_class = "col-6 col-md-4 col-xl-3";
} elseif ($team_count == 3) {
    $col_class = "col-6 col-md-4";
} elseif ($team_count == 2) {
    $col_class = "col-6 col-md-6";
}
?>

<?php if (!empty($team)): ?>
<div class="team <?php if ($background == 'true') { echo 'team--background'; } ?>">
    <?php if (!empty($section_id)): ?>
    <div class="section-id" id="<?php echo esc_html($section_id); ?>"></div>
    <?php endif; ?>
    <div class="container">
        <div class="team__wrapper">
            <div class="row">
                <?php foreach ($team as $key => $item): ?>
                <div class="<?php echo $col_class; ?>">
                    <div class="team__item">
                        <?php if (!empty($item['image'])): ?>
                        <div class="team__image <?php if ($item['image_class'] == 'object-fit-contain') { echo 'team__image--padding';} ?>">
                            <?php echo wp_get_attachment_image($item['image'], 'team-image', '', [ 'class' => $item['image_class'], ]); ?>
                        </div>
                        <?php endif; ?>
                        <div class="team__content">
                            <h3 class="team__title"><?php echo apply_filters('the_title', $item['title']); ?></h3>
                            <?php echo apply_filters('acf_the_content', str_replace('&nbsp;', ' ', $item['text'])); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
