$(document).ready(function () {
	var pathArray = window.location.pathname.split( '/' ); // Break URL into Array separated by /
	var secondLevelLocation = pathArray[1]; // Get the Controller
	if (secondLevelLocation === '') {secondLevelLocation = 'index';} // If no URL set to index
	$('.nav a[href$="' + secondLevelLocation + '"]').closest('li').addClass('active'); // Find li with href ends with controller as link
	

// 	$.getJSON("https://bootswatch.com/api/4.json", function (data) {
// 		console.log(data);
// 		var themes = data.themes;
// 		var select = $("select");
// 		select.show();
// 		$(".alert").toggleClass("alert-info alert-success");
// 		$(".alert h4").text("Success!");
		
// 		themes.forEach(function(value, index){
// 			select.append($("<option />")
// 				.val(index)
// 				.text(value.name));
// 	});
  
//   select.change(function(){
//     var theme = themes[$(this).val()];
//     $("#themeCSS").attr("href", theme.css);
//   }).change();

// }, "json").fail(function(){
//     $(".alert").toggleClass("alert-info alert-danger");
// 	$(".alert h4").text("Failure!");
// 	console.log("fail");
// });


});

