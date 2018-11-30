<?php

	/**
	 * Get Saved Value
	 *
	 * @since    1.0.0
	 */

	$contentTypeValue = get_post_meta($post->ID, 'content_type_value', true);
	$ratingValue = get_post_meta($post->ID,'rating_value', true);
	$bestRating = get_post_meta($post->ID,'best_rating', true);
	$ratingCount = get_post_meta($post->ID,'rating_count', true);
	$localBusinessAddress = get_post_meta($post->ID,'local_business_street', true);
	$localBusinessTelephone = get_post_meta($post->ID,'local_business_telephone', true);
	$localBusinessPrice = get_post_meta($post->ID,'local_business_price', true);
	$movieDateCreated = get_post_meta($post->ID,'movie_date_created', true);
	$movieDirector  = get_post_meta($post->ID,'movie_director', true);

	/**
	 * Check Additional Field Requirement
	 *
	 * @since    1.0.0
	 */

	$visibilityLocalBusinessBox = "display: none;";
	$visibilityMovieBox = "display: none;";

	if ($contentTypeValue == "LocalBusiness"){ $visibilityLocalBusinessBox = "display: block;"; }
	if ($contentTypeValue == "Movie"){ $visibilityMovieBox = "display: block;"; }

	/**
	 * Create Validation Link
	 *
	 * @since    1.0.0
	 */
	
	$post_url = get_permalink($_GET['post']);
	$valid_url = "https://search.google.com/structured-data/testing-tool#url=" . $post_url;
?>

<!-- Rating Snippets Intro -->

<p>
	Rating Snippets help you rank better in Google by adding rating to your post. <a target="_blank" href="https://developers.google.com/search/docs/data-types/review#review-snippet">Learn more</a>
</p> <hr>

<!-- Select Content Type -->

<b>Select Content Type</b><br><small>* Must select 1 to activate.</small><br>
<select name="contentType" id="contentType">
	<option value="">--</option>
	<option value="LocalBusiness" <?php selected($contentTypeValue, 'LocalBusiness'); ?>>Local Business</option>
	<option value="Movie" <?php selected($contentTypeValue, 'Movie'); ?>>Movie</option>
	<option value="Books" <?php selected($contentTypeValue, 'Books'); ?>>Books</option>
	<option value="Products" <?php selected($contentTypeValue, 'Products'); ?>>Products</option>
</select><br><br>

<!-- Additional Input required -->
<div id="LocalBusiness" class="additionalBox" style="<?php echo $visibilityLocalBusinessBox ?>"> 
	<input value=<?php echo '"'.$localBusinessAddress.'"'; ?> type="text" name="localBusinessAddress" id="localBusinessAddress" placeholder="Address"><br>
	<input value=<?php echo '"'.$localBusinessTelephone.'"'; ?> type="text" name="localBusinessTelephone" id="localBusinessTelephone" placeholder="Phone Number"><br>
	<input value=<?php echo '"'.$localBusinessPrice.'"'; ?> type="text" name="localBusinessPrice" id="localBusinessPrice" placeholder="Price (etc: 'varies', $20-$50)"><br><br>
</div>

<div id="Movie" class="additionalBox" style="<?php echo $visibilityMovieBox ?>">
	<input value=<?php echo '"'.$movieDateCreated.'"'; ?> type="text" name="movieDateCreated" id="movieDateCreated" placeholder="Date Created"><br>
	<input value=<?php echo '"'.$movieDirector.'"'; ?> type="text" name="movieDirector" id="movieDirector" placeholder="Director"><br><br>
</div>

<!-- Rating Value -->

<b>Review Rating</b><br><small>* Numbers only.</small><br>

<input value=<?php echo '"'.$ratingValue.'"'; ?> type="number" name="ratingValue" id="ratingValue" placeholder="Rating Value eg. 88" onkeypress="javascript:return isNumber(event)"><br>

<input value=<?php echo '"'.$bestRating.'"'; ?> type="number" name="bestRating" placeholder="Best Rating eg. 100" onkeypress="javascript:return isNumber(event)"><br>

<input value=<?php echo '"'.$ratingCount.'"'; ?> type="number" name="ratingCount" placeholder="Rating Count eg. 20" onkeypress="javascript:return isNumber(event)">

<!-- Update Button -->
<?php submit_button('Save Changes', 'primary'); ?>


