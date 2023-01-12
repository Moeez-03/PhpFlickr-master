<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="./justifiedGallery/justifiedGallery.min.css" />
	<script src="./justifiedGallery/jquery.justifiedGallery.min.js"></script>

	<script src="./swipebox/src/js/jquery.swipebox.js"></script>
	<link rel="stylesheet" href="./swipebox/src/css/swipebox.css">
</head>

<div id="gallery">
<?php

	include_once('./phpFlickr.php');
    $f = new phpFlickr(api_key: "f2d2b3c71da0881ff579ce97c5208181", secret: "c829ab07af8f3402");
	/*$key = "f0ab50062d44d4d5b807f605367d3cb8";    // enter your API key here
	$secret = "fee3ad89574240f7"; // enter your API secret here
	
	$userid = "197366184@N05"; // Get flickr user id here. Currently points to Jasper Reddin*/
	
	//$f = new phpFlickr($key, $secret);


$respons = $f->people_getPublicPhotos(user_id: "197366184@N05", safe_search: null, extras: "url.m,url_h", per_page: 500)['photos']['photos'];
foreach($respons as $photo){
	$title = str_replace( search:"'", replace:"&#39", $photo['title']);
	echo '<a href="' . $photo['url_h'] . '" class="swipebox" title="' . $style . '"><img alt="' . $title . '"src="' . $photo['url_m'] . '"<>/a>';
}

	
 
?>

</div>

<script>
	$('#gallery').justifiedGallery( {
		rowHeight: 200,
		lastRow: 'nojustify',
		rel: 'Portfolio',
		margins: 2
	});

	$(".swipebox").swipebox({
		loopAtEnd: true
	});
</script>

<style>
	body {
		margin: 0;
	}

	#gallery {
		background-color: black;
	}
</style>
