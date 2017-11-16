function openModal(pid) {
	$.ajax({
		type: "POST",
		url: "review.php",
		data: {"action": "getreviews", "pid": pid},
		success: function(result) {
			$(".review-box").html('');
			var jArray = JSON.parse(result);
			for(var i = 0; i < jArray.length; i++)
				$(".review-box").append('<div class="review">'+jArray[i][4]+'</div>');
			$(".review-input").html('<form>  <div class="form-group"><label for="review">Please review our product!</label><textarea class="form-control" id="reviewTextarea" rows="3"></textarea></div><div id="el"></div><button type="button" onclick="submitReview('+pid+')" class="btn btn-primary">Submit</button></form>');
			var el = document.querySelector('#el');
			var callback = function(rating) {
				console.log(rating)
			}
			var myRating = rating(el, 1, 5, callback);
		}
	});
    $("#popupModal").css("display", "block");
}

function submitReview(pid) {
	console.log($("#reviewTextarea").val());
	$.ajax({
		type: "POST",
		url: "review.php",
		data: {"action": "submitreview", "pid": pid, "uid": 5, "rating": 8,"review": $("#reviewTextarea").val()},
		success: function(result) {
			$("#popupModal").css("display", "none");
		}
	});
}

$(".close").click(function() {
    $("#popupModal").css("display", "none");
});

function sendReview(pid) {

}
