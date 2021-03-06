<?php //echo "<pre>"; print_r($articleJson); ?>
<?php include("common/navigation.php"); ?>
<style>.item-description {text-align:center;} </style>
<div id="staticContent">
	<?php foreach($articleJson->photoCollection as $itemObject) {
		$mediaURL = '/'.$projectFolder.$itemObject->images[0]->file;
		if(isset($itemObject->images[0]->file)) { ?>
			<div class="potrait-full nowrap" style="height:100%;background-image:url('<?php print $mediaURL; ?>'); background-size:cover; background-position:top; background-repeat:no-repeat;">
				<div class="img-caption">
					<div class="item-description"><?php print $itemObject->caption; ?></div>
				</div>
			</div>
		<?php } else { ?>
			<div class="item-noimg nowrap">
				<div class="item-description"><?php print $itemObject->caption; ?></div>
			</div>
		<?php }
	} ?>
		
	</div>
		<div id="dynContent">
		<div class="col-span-2 full-height"  style="height:100%;background-image:url('<?php echo '/'.$projectFolder.$articleJson->images[0]; ?>');background-size:cover;background-position:center;">
			<img src="<?php echo '/'.$projectFolder.$articleJson->images[0]; ?>" style="display:none;"/>
			<div class="title"><?php echo $articleJson->heading; ?></div>
			<div class="cover-caption" style="width:100%;">
				<div class="social-share-wrapper">
					<?php include("common/socialshare.tpl.php");?>
				</div>				
			</div>
		</div>
	</div>

<script>
var inHeight = "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
var inWidth = "innerWidth" in window ? window.innerWidth : document.documentElement.offsetWidth;
var ldHeight = inHeight * 9/20;

$('body').css('max-height', inHeight);
$('.full-height').css('height',inHeight);
$('.potrait-full').css('height',inHeight);
$('.landscape-half').css('height', ldHeight);
var deviceMode = inWidth/inHeight;

if(inWidth>720 && deviceMode > 1){
  //Instantiating binPackage, The column width should calculated based on the screen size and the number of columns we want
  var bp = new binPackage('target', 'viewport', {
    //columnWidth:           120,
    columnCount:           2,
    standardiseLineHeight: true,
    pagePadding:           0,
    viewportWidth:         inWidth,
    viewportHeight:        inHeight-30,
    pageArrangement:       'horizontal',
    showGrid:              false,
    allowReflow:           true,
    minFixedPadding:       0.5
  });
}

else {
  //Instantiating binPackage, The column width should calculated based on the screen size and the number of columns we want
  var bp = new binPackage('target', 'viewport', {
    columnWidth:           inWidth-40,
    columnCount:           1,
    standardiseLineHeight: true,
    pagePadding:           0,
    viewportWidth:         inWidth,
    viewportHeight:        inHeight,
    pageArrangement:       'vertical',
    showGrid:              false,
    allowReflow:           false,
    minFixedPadding:       0.5
  });
}

bp.flow(document.getElementById('staticContent'), document.getElementById('dynContent'));
</script>
