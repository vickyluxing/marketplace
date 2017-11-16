function openModal(pid) {
	$.ajax({
		type: "POST",
		url: "review.php",
		data: {"action": "getreviews", "pid": pid},
		success: function(result) {
			$(".review-box").html('');
			var jArray = JSON.parse(result);
			for(var i = 0; i < jArray.length; i++){
				$(".review-box").append('<div id="review'+i+'" class="review"></div>');
				$("#review"+i).append('<div id="review-top'+i+'"></div>');
				$("#review-top"+i).append('<span class="review-user">'+jArray[i][2]+'</span>');

				var stars = jArray[i][3];
				for(var j = 1; j <= stars; j++)
					$("#review-top"+i).append('<span class="glyphicon glyphicon-star"></span>');
				var starsInt = parseInt(stars);
				for(var j = starsInt+1; j <= 5; j++)
					$("#review-top"+i).append('<span class="glyphicon glyphicon-star-empty"></span>');

				$("#review"+i).append('<div class="review-content">'+jArray[i][4]+'</div>');
			}
			$(".review-input").html('<form>  <div class="form-group"><textarea class="form-control" id="reviewTextarea" placeholder="Write your review here" rows="3"></textarea></div><button type="button" onclick="submitReview('+pid+')" class="btn btn-primary">Submit Review</button></form>');
		}
	});
    $("#popupModal").css("display", "block");
}

function submitReview(pid) {
	$.ajax({
		type: "POST",
		url: "review.php",
		data: {"action": "submitreview", "pid": pid, "uname": $("#username").val(), "rating": $("#star-rating").val(),"review": $("#reviewTextarea").val()},
		success: function(result) {
			location.reload(true);
		}
	});
}

$(".close").click(function() {
    $("#popupModal").css("display", "none");
});


function toggleStars(rating) {
	for(var i = 1; i <= rating; i++) {
		if($("#star"+i).hasClass("glyphicon-star-empty")) {
			$("#star"+i).removeClass("glyphicon-star-empty");
			$("#star"+i).addClass("glyphicon-star");
		}
	}
	var intRating = parseInt(rating);
	for(var i = intRating+1; i <= 5; i++) {
		if($("#star"+i).hasClass("glyphicon-star")) {
			$("#star"+i).removeClass("glyphicon-star");
			$("#star"+i).addClass("glyphicon-star-empty");
		}
	}
}

$("#star1, #star2, #star3, #star4, #star5").hover(
	function() {
		var rating = $(this).attr("id").substring(4);
		toggleStars(rating);
	}, function() {
		var currentRating = $("#star-rating").val();
		toggleStars(currentRating);
	}
);

$("#star1, #star2, #star3, #star4, #star5").click(function() {
	var rating = $(this).attr("id").substring(4);
	toggleStars(rating);
	$("#star-rating").val(rating);
});

