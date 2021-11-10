<?php get_header();
?>

<?php
$title = get_field('title');
$description = get_field('description');
$getImage = get_field('background');
$image = $getImage['sizes']['large'];

/*
var_dump(get_field('background'));
*/

if($title) {
    echo $title;
}

if($description): ?>
    <p><?php echo nl2br($description); ?></>

<?php endif;  ?>
    <img class="img-fluid hero-img" src="<?php echo $image; ?>">
<?php
get_footer();

