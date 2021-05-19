<?php

session_start();

$currentPage = 'tv';
if (isset($_SESSION['user_id'])) {
	include('includes/header_loggedin.php');
} else {
	header("Location: user_login.php");
}

require('includes/connect_db.php');

$g = "SELECT * FROM genre";
$n = mysqli_query($link, $g);
if (mysqli_num_rows($n) > 0) {
	while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {

		$r = mysqli_query($link, "SELECT * FROM tv WHERE tv_genre = '{$row['genre_name']}'");
		if (mysqli_num_rows($r) > 0) {
			# Display body section.
?>
			<br>
			<div>
				<h5 class="genre-title"><?php echo "{$row['genre_name']}"; ?> Programs</h1>
				<div class="responsive-slick">
					<?php
					while ($mov = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
					?>
						<div class="slider-image">
							<a href="series.php?id=<?php echo $mov['tv_id']; ?>">
								<img src="<?php echo "{$mov['tv_img']}"; ?>" class="slider-img" alt="<?php echo "{$mov['tv_title']}"; ?>">
								<div class="info">
									<h2 class="slider-heading"><?php echo "{$mov['tv_title']}"; ?></h2>
								</div>
							</a>
						</div>
				<?php
					}
				}
				?>

				</div>
			</div>
	<?php
	}
	mysqli_close($link);
}
	?>

	<?php

	include('includes/footer.php');

	?>