<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://adminrun.com
 * @since      1.0.0
 *
 * @package    Rating_snippets
 * @subpackage Rating_snippets/public/partials
 */

//Get Content Type
$contentTypeValue = get_post_meta(get_the_ID(), 'content_type_value', true);

/*
Get Saved Values
*/
$ratingValue = get_post_meta(get_the_ID(),'rating_value', true);
$bestRating = get_post_meta(get_the_ID(),'best_rating', true);
$ratingCount = get_post_meta(get_the_ID(),'rating_count', true);
$localBusinessAddress = get_post_meta(get_the_ID(),'local_business_street', true);
$localBusinessTelephone = get_post_meta(get_the_ID(),'local_business_telephone', true);
$localBusinessPrice = get_post_meta(get_the_ID(),'local_business_price', true);

//Get Content as Description
$content = apply_filters('the_content', get_post(get_the_ID())->post_content);
$contentToDescription = wp_trim_words($content, 25, null)


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<head> 
	<script type="application/ld+json">
		<?php if ($contentTypeValue == 'LocalBusiness'):  ?>

			{
			  "@context": "http://schema.org/",
			  "@type": "LocalBusiness",
			  "name": "<?php echo get_the_title();  ?>",
			  "description": "<?php echo $contentToDescription; ?>",
			  "image": "<?php echo get_the_post_thumbnail_url();  ?>",
			  "address": "<?php echo $localBusinessAddress;  ?>",
			  "telephone": "<?php echo $localBusinessTelephone;  ?>",
			  "priceRange": "<?php echo $localBusinessPrice;  ?>",
			  "aggregateRating": {
			    "@type": "AggregateRating",
			    "ratingValue": "<?php echo $ratingValue;  ?>",
			    "bestRating": "<?php echo $bestRating;  ?>",
			    "ratingCount": "<?php echo $ratingCount;  ?>"
			  }
			}

		<?php elseif ($contentTypeValue == 'Movie'): ?>
			{
			  "@context": "http://schema.org/",
			  "@type": "Movie",
			  "name": "<?php echo get_the_title();  ?>",
			  "description": "<?php echo $contentToDescription; ?>",
			  "image": "<?php echo get_the_post_thumbnail_url();  ?>",
			  "dateCreated": "<?php echo $movieDateCreated;  ?>",
			  "director": "<?php echo $movieDateDirector;  ?>",
			  "aggregateRating": {
			    "@type": "AggregateRating",
			    "ratingValue": "<?php echo $ratingValue;  ?>",
			    "bestRating": "<?php echo $bestRating;  ?>",
			    "ratingCount": "<?php echo $ratingCount;  ?>"
			  }
			}
		<?php elseif ($contentTypeValue == 'Books'): ?>
			
			  {
			    "@context": "http://schema.org/",
			    "@type": "Book",
			    "name": "<?php echo get_the_title();  ?>",
			    "description": "<?php echo $contentToDescription; ?>",
			    "aggregateRating": {
			      "@type": "AggregateRating",
			      "ratingValue": "<?php echo $ratingValue;  ?>",
			      "bestRating": "<?php echo $bestRating;  ?>",
			      "ratingCount": "<?php echo $ratingCount;  ?>"
			    }
			  }

		<?php elseif ($contentTypeValue == 'Products'): ?>
			{
			  "@context": "http://schema.org/",
			  "@type": "Product",
			  "name": "<?php echo get_the_title();  ?>",
			  "description": "<?php echo $contentToDescription; ?>",
			  "image": "<?php echo get_the_post_thumbnail_url();  ?>",
			  "aggregateRating": {
			    "@type": "AggregateRating",
			    "ratingValue": "<?php echo $ratingValue;  ?>",
			    "bestRating": "<?php echo $bestRating;  ?>",
			    "ratingCount": "<?php echo $ratingCount;  ?>"
			  }
			}
		<?php endif; ?>
	</script>
</head>
