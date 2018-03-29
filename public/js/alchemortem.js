$('document').ready(function () {
//    $("#accordion").accordion({
//        collapsible: true,
//        active: 1,
//        heightStyle: "content"
//    });
    loadImages();
});

function loadImages(){
    var images = [];
	var loadThese = $('img');
	for(i=0; i<loadThese.length; i++){
		images[i] = new Image();
		images[i].src = loadThese[i];
		}
}