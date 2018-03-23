$('document').ready(function () {
//    $("#accordion").accordion({
//        collapsible: true,
//        active: 1,
//        heightStyle: "content"
//    });
    loadImages();
});

function loadImages(){
    var galleryImages = [];
	var loadThese = $('img');
	for(i=0; i<loadThese.length; i++){
		galleryImages[i] = new Image();
		galleryImages[i].src = loadThese[i];
		}
}