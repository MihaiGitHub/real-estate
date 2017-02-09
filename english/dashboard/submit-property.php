<?php
ob_start(); 
session_start();

if(!$_SESSION['auth']){ 
	header('Location: index.php?authen=false');
	exit;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){


/*
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	exit;
*/
	$address = $_POST['p-address'];
/* old
	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address),
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);

	$data = json_decode($resp, true);

	include 'include/dbconnect.php';

	$stmt = $objDb->prepare('INSERT INTO properties (`uid`, `title`, `description`, `lat`, `lng`, `price`, `bedrooms`, `bathrooms`) VALUES (:uid, :title, :description, :lat, :lng, :price, :bedrooms, :bathrooms)');
	$result = $stmt->execute(array('uid' => $_SESSION['id'], 'title' => $_POST['p-title'], 'description' => $_POST['p-desc'], 'lat' => $data['results'][0]['geometry']['location']['lat'], 'lng' => $data['results'][0]['geometry']['location']['lng'], 'price' => $_POST['p-price'], 'bedrooms' => $_POST['p-bedroom'],'bathrooms' => $_POST['p-bathroom']));
	*/
	///////////////////
	
	include 'include/dbconnect.php';

	if(!isset($_SESSION['pid'])){

$stmt = $objDb->prepare('INSERT INTO properties (`uid`, `title`, `property_status`, `property_type`, `description`, `features`, `lat`, `lng`, `price`, `bedrooms`, `bathrooms`, `garages`, `land_area`) VALUES (:uid, :title, :property_status, :property_type, :description, :features, :lat, :lng, :price, :bedrooms, :bathrooms, :garages, :land_area)');
$result = $stmt->execute(array('uid' => $_SESSION['id'], 'title' => $_POST['p-title'], 'property_status' => $_POST['p-status'], 'property_type' => $_POST['p-type'], 'description' => $_POST['p-desc'], 'features' => implode(",",$_POST["features"]), 'lat' => $_POST['p-lat'], 'lng' => $_POST['p-long'], 'price' => $_POST['p-price'], 'bedrooms' => $_POST['p-bedroom'], 'bathrooms' => $_POST['p-bathroom'], 'garages' => $_POST['p-garage'], 'land_area' => $_POST['p-land']));
	} else {

$stmt = $objDb->prepare('UPDATE properties SET title = :title, property_status = :property_status, property_type = :property_type, description = :description, features = :features, lat = :lat, lng = :lng, price = :price, bedrooms = :bedrooms, bathrooms = :bathrooms, garages = :garages, land_area = :land_area WHERE id = :pid');
$result = $stmt->execute(array('title' => $_POST['p-title'], 'property_status' => $_POST['p-status'], 'property_type' => $_POST['p-type'], 'description' => $_POST['p-desc'], 'features' => implode(",",$_POST["features"]), 'lat' => $_POST['p-lat'], 'lng' => $_POST['p-long'], 'price' => $_POST['p-price'], 'bedrooms' => $_POST['p-bedroom'], 'bathrooms' => $_POST['p-bathroom'], 'garages' => $_POST['p-garage'],'land_area' => $_POST['p-land'],  'pid' => $_SESSION['pid']));

	}
//////////////////////////
	
	if($result){
		/*
		$pid = $objDb->lastInsertId($result);

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		$j = 0; //Variable for indexing uploaded image 

		if (!is_dir('uploads/'.$_SESSION['id'].'/'.$pid)) {
			mkdir('uploads/'.$_SESSION['id'].'/'.$pid, 0777, true);
		}
		
		$target_path = "uploads/".$_SESSION['id']."/".$pid."/"; //Declaring Path for uploaded images

		for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

			$validextensions = array("JPG", "JPEG", "PNG", "jpeg", "jpg", "png");  //Extensions which are allowed
			$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
			$file_extension = end($ext); //store extensions in the variable
			
			$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
			$j = $j + 1;//increment the number of uploaded images according to the files in array
		
			if (($_FILES["file"]["size"][$i] < 6000000) //Approx. 100kb files can be uploaded.
						&& in_array($file_extension, $validextensions)) {
					if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
					//	echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
						
						$stmt2 = $objDb->prepare('INSERT INTO properties_images (`pid`, `url`) VALUES (:pid, :url)');
						$result2 = $stmt2->execute(array('pid' => $pid, 'url' => $target_path));
					} else {//if file was not moved.
		//				echo $j. '2).<span id="error">please try again!.</span><br/><br/>';
					}
				} else {//if file size and file type was incorrect.
		//			echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
				}
		}
		*/

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		header("Location:index.php");
		exit;
	}


}
?>
<body class="submit-property">
	<?php include 'include/nav.php'; ?>

	<!--Breadcrumb Section-->
	<section class="breadcrumb-box" data-parallax="scroll" data-image-src="../assets/img/breadcrumb-bg.jpg">
		<div class="inner-container container">
			<h1>Submit Property</h1>

			<div class="breadcrumb">
				<ul class="list-inline">
					<li class="home"><a href="../index.html">Home</a></li>
					<li><a href="#">Submit Property</a></li>
				</ul>
			</div>
		</div>
	</section>
	<!--Breadcrumb Section-->

	<section class="main-container container">
		<div class="descriptive-section">
			<h2 class="hsq-heading type-2">Submit Property</h2>

			<div class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda beatae consequuntur doloremque
				eos eum ex fugit iste labore mollitia necessitatibus odio officiis optio perferendis porro quae qui quia
				quod reiciendis sit temporibus ullam unde ut vel veniam, vero voluptatum! Dignissimos fugiat iusto numquam.
				Ad distinctio earum et harum maiores officiis perferendis quia tenetur? Aspernatur dolore doloremque error
				et, ex hic illo laborum minus modi praesentium, quasi quos repellat soluta!
			</div>
		</div>
		<div class="submit-main-box clearfix">
			<form action="submit-property.php" id="submit-property-main-form" method="post">
				<div class="row t-sec">
					<div class="col-md-6 l-sec">
						<div class="information-box">
							<h3>Basic Details <i class="fa fa-info"></i></h3>

							<div class="box-content">
								<div class="field-row">
									<input type="text" placeholder="Title" id="p-title" name="p-title">
								</div>
								<div class="field-row clearfix">
									<div class="col-xs-6">
										<select id="p-status" name="p-status">
											<option value="0">Property Status</option>
											<option value="For Sale">For Sale</option>
											<option value="For Rent">For Rent</option>
										</select>
									</div>
									<div class="col-xs-6">
										<select id="p-type" name="p-type">
											<option value="0">Property Type</option>
											<option value="Apartment">Apartment</option>
											<option value="House">House</option>
											<option value="Villa">Villa</option>
											<option value="Office">Office</option>
											<option value="Condo">Condo</option>
										</select>
									</div>
								</div>
								<div class="field-row clearfix">
									<div class="col-xs-6">
										<div class="input-group l-icon">
											<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
											<input type="text" class="form-control number-field" id="p-price" name="p-price" placeholder="Price">
										</div>
									</div>
									<div class="col-xs-6">
										<select id="p-bedroom" name="p-bedroom">
											<option value="0">Bedroom</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">+5</option>
										</select>
									</div>
								</div>
								<div class="field-row clearfix">
									<div class="col-xs-6">
										<select id="bathroom" name="p-bathroom">
											<option value="0">Bathroom</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">+5</option>
										</select>
									</div>
									<div class="col-xs-6">
										<select id="garage" name="p-garage">
											<option value="0">Garages</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">+5</option>
										</select>
									</div>
								</div>
								<div class="field-row clearfix">
									<div class="col-xs-6">
										<div class="input-group r-icon">
											<input type="text" class="form-control number-field" id="p-land" name="p-land" placeholder="Land Area">
											<span class="input-group-addon">m2</span>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="input-group r-icon">
											<input type="text" class="form-control number-field" id="p-build" name="p-build" placeholder="Build Aria">
											<span class="input-group-addon">m2</span>
										</div>
									</div>
								</div>
								<div class="field-row">
									<textarea name="p-desc" id="p-desc" placeholder="Description"></textarea>
								</div>
							</div>
						</div>

						<div class="information-box">
							<h3>Features <i class="fa fa-info"></i></h3>`

							<div class="box-content">
								<ul class="features-box-submit clearfix">
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-1">
											<input type="checkbox" value="Attic" id="p-f-1" name="features[]">
											<span></span>
											Attic
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-2">
											<input type="checkbox" value="Gas heat" id="p-f-2" name="features[]">
											<span></span>
											Gas heat
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-3">
											<input type="checkbox" value="Ocean view" id="p-f-3" name="features[]">
											<span></span>
											Ocean view
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-4">
											<input type="checkbox" value="Wine cellar" id="p-f-4" name="features[]">
											<span></span>
											Wine cellar
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-5">
											<input type="checkbox" value="Basketball court" id="p-f-5" name="features[]">
											<span></span>
											Basketball court
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-6">
											<input type="checkbox" value="Gym" id="p-f-6" name="features[]">
											<span></span>
											Gym
										</label

									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-7">
											<input type="checkbox" value="Pound" id="p-f-7" name="features[]">
											<span></span>
											Pound
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-8">
											<input type="checkbox" value="Fireplace" id="p-f-8" name="features[]">
											<span></span>
											Fireplace
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-9">
											<input type="checkbox" value="Lake view" id="p-f-9" name="features[]">
											<span></span>
											Lake view
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-10">
											<input type="checkbox" value="Pool" id="p-f-10" name="features[]">
											<span></span>
											Pool
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-11">
											<input type="checkbox" value="Back yard" id="p-f-11" name="features[]">
											<span></span>
											Back yard
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-12">
											<input type="checkbox" value="Front yard" id="p-f-12" name="features[]">
											<span></span>
											Front yard
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-13">
											<input type="checkbox" value="Fenced yard" id="p-f-13" name="features[]">
											<span></span>
											Fenced yard
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-14">
											<input type="checkbox" value="Sprinklers" id="p-f-14" name="features[]">
											<span></span>
											Sprinklers
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-15">
											<input type="checkbox" value="Washer and dryer" id="p-f-15" name="features[]">
											<span></span>
											Washer and dryer
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-16">
											<input type="checkbox" value="Deck" id="p-f-16" name="features[]">
											<span></span>
											Deck
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-17">
											<input type="checkbox" value="Balcony" id="p-f-17" name="features[]">
											<span></span>
											Balcony
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-18">
											<input type="checkbox" value="Laundry" id="p-f-18" name="features[]">
											<span></span>
											Laundry
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-19">
											<input type="checkbox" value="Concierge" id="p-f-19" name="features[]">
											<span></span>
											Concierge
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-20">
											<input type="checkbox" value="Doorman" id="p-f-20" name="features[]">
											<span></span>
											Doorman
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-21">
											<input type="checkbox" value="Private space" id="p-f-21" name="features[]">
											<span></span>
											Private space
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-22">
											<input type="checkbox" value="Storage" id="p-f-22" name="features[]">
											<span></span>
											Storage
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-23">
											<input type="checkbox" value="Recreation" id="p-f-23" name="features[]">
											<span></span>
											Recreation
										</label>
									</li>
									<li class="col-xs-6 col-sm-4 hsq-checkbox">
										<label for="p-f-24">
											<input type="checkbox" value="Roof Deck" id="p-f-24" name="features[]">
											<span></span>
											Roof Deck
										</label>
									</li>
								</ul>
							</div>
						</div>

						<div class="information-box">
							<h3>Floor Plans <i class="fa fa-info"></i></h3>
							<div class="box-content">
								<div class="uploader-container">
									<div id="floorplan-uploader" class="img-uploader">
										<div id="preview-template" class="preview-box">
											<i class="fa fa-remove" data-dz-remove></i>
											<img data-dz-thumbnail />
											<div class="error text-danger" data-dz-errormessage></div>
											<div class="progress-box" data-dz-uploadprogress></div>
										</div>
										<div class="btn add-images-btn" id="add-floorplan">Brows Image</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 r-sec">
					<div class="information-box">
						<h3>Location <i class="fa fa-info"></i></h3>

						<div class="box-content">
							<div class="field-row">
								<input type="text" placeholder="Address" name="p-address" id="p-address">
							</div>
							<div class="field-row">
								<div id="p-map"></div>
							</div>
							<div class="field-row clearfix">
								<div class="col-xs-6">
									<input type="text" placeholder="Longitude" id="p-long" name="p-long">
								</div>
								<div class="col-xs-6">
									<input type="text" placeholder="Latitude" id="p-lat" name="p-lat">
								</div>
							</div>

						</div>
					</div>
					<div class="information-box">
						<h3>Neighborhood <i class="fa fa-info"></i></h3>
						<div class="box-content">
							<div class="neighborhood-container">
								<div class="neighborhood-row clearfix" id="neighborhood-pattern">
									<div class="col-xs-4 place-container">
										<input type="text" name="neighborhood[]['place']" class="p-neighbor-place" placeholder="Add a place">
									</div>
									<div class="col-xs-3 distance-container">
										<div class="input-group r-icon">
											<input type="text" name="neighborhood[]['distance']" class="form-control number-field" placeholder="ex: 3" class="p-neighbor-distance">
											<span class="input-group-addon">min</span>
										</div>
									</div>
									<div class="col-xs-5 btn-container">
										<input type="hidden" class="neighbor-by" name="neighborhood[]['by']">
										<div class="btn-group" role="group">
											<button type="button" class="btn" data-value="1"><i class="fa fa-bicycle"></i></button>
											<button type="button" class="btn" data-value="2"><i class="fa fa-train"></i></button>
											<button type="button" class="btn" data-value="3"><i class="fa fa-car"></i></button>
											<button type="button" class="btn" data-value="4"><i class="fa fa-male"></i></button>
										</div>
									</div>
								</div>
								<div class="neighborhood-row clearfix">
									<div class="col-xs-4 place-container">
										<input type="text" name="neighborhood[]['place']" class="p-neighbor-place" placeholder="Add a place">
									</div>
									<div class="col-xs-3 distance-container">
										<div class="input-group r-icon">
											<input type="text" name="neighborhood[]['distance']" class="form-control number-field" placeholder="ex: 3" class="p-neighbor-distance">
											<span class="input-group-addon">min</span>
										</div>
									</div>
									<div class="col-xs-5 btn-container">
										<input type="hidden" class="neighbor-by" name="neighborhood[]['by']">
										<div class="btn-group" role="group">
											<button type="button" class="btn" data-value="1"><i class="fa fa-bicycle"></i></button>
											<button type="button" class="btn" data-value="2"><i class="fa fa-train"></i></button>
											<button type="button" class="btn" data-value="3"><i class="fa fa-car"></i></button>
											<button type="button" class="btn" data-value="4"><i class="fa fa-male"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="add-neighborhood-btn btn bt-default"><i class="fa fa-plus"></i></div>

						</div>
					</div>
					<div class="information-box">
						<h3>Video Presentation <i class="fa fa-info"></i></h3>

						<div class="box-content">
							<div class="field-row">
								<textarea id="p-video" placeholder="Paste the embed code here"></textarea>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row b-sec">
					<div class="information-box">
						<h3>Gallery <i class="fa fa-info"></i></h3>
						<div class="box-content">
							<div class="uploader-container">
								<div id="gallery-uploader" class="img-uploader">
									<div id="gallery-preview-template" class="preview-box">
										<i class="fa fa-remove" data-dz-remove></i>
										<img data-dz-thumbnail />
										<div class="error text-danger" data-dz-errormessage></div>
										<div class="progress-box" data-dz-uploadprogress></div>
									</div>
									<div class="btn add-images-btn" id="add-gallery">Brows Image</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row b-sec">
					<div class="information-box">
						<button class="btn" type="submit">Save Property</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<!-- JS Include Section -->
	<script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/helper.js"></script>
	<script type="text/javascript" src="../assets/js/select2.min.js"></script>
	<script type="text/javascript" src="../assets/js/dropzone.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<script type="text/javascript" src="../assets/js/template.js"></script>
	<!-- End of JS Include Section -->
	<script type="text/javascript">
		function initialize() {
			var myLatLng = new google.maps.LatLng(40.6700, -73.9400);
			var mapOptions = {
				zoom: 12,
				center: myLatLng,
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"off"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],

				// Extra options
				mapTypeControl: false,
				panControl: false,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL,
					position: google.maps.ControlPosition.LEFT_BOTTOM
				}
			};
			var map = new google.maps.Map(document.getElementById('p-map'), mapOptions);
			var image = '../assets/img/marker-1.png';

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				draggable: true,
				icon: image
			});
			if (jQuery('#p-address').length > 0) {
				var input = document.getElementById('p-address');
				var autocomplete = new google.maps.places.Autocomplete(input);
				google.maps.event.addListener(autocomplete, 'place_changed', function () {
					var place = autocomplete.getPlace();
					jQuery('#p-lat').val(place.geometry.location.lat());
					jQuery('#p-long').val(place.geometry.location.lng());
					marker.setPosition(place.geometry.location);
					map.setCenter(place.geometry.location);
					map.setZoom(15);
				});
			}
			google.maps.event.addListener(marker, 'dragend', function (event) {
				jQuery('#p-lat').val(event.latLng.lat());
				jQuery('#p-long').val(event.latLng.lng());
			});
		}


		google.maps.event.addDomListener(window, 'load', initialize);

		jQuery(document).ready(function(){
			// Enable Uploader

			var previewNode = document.querySelector("#preview-template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);

			jQuery('#floorplan-uploader').dropzone({
				url: "upload.php",
				thumbnailWidth: 105,
				thumbnailHeight: 105,
				maxFilesize: 5,
				previewTemplate: previewTemplate,
				acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
				clickable: "#add-floorplan",
				success: function (file, response) {
					jQuery(window).trigger('resize.px.parallax');
				}
			});


			var previewNode = document.querySelector("#gallery-preview-template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);

			jQuery('#gallery-uploader').dropzone({
				url: "upload.php",
				thumbnailWidth: 105,
				thumbnailHeight: 105,
				maxFilesize: 5,
				previewTemplate: previewTemplate,
				acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
				clickable: "#add-gallery",
				success: function (file, response) {
					jQuery(window).trigger('resize.px.parallax');
				}
			});
		});

	</script>



<?php		  
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
//include 'include/footer.php'; 
?>
</body>
</html>