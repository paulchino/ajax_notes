<html>
<head>
	<title>Ajax Notes</title>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">
<script type="text/javascript">

//uses ajax to get all the data
$(document).ready(function() {
	$.get('/main/index_html', function(res) {
		$('#ajax-notes').html(res);
	})
})

//handles the delete and add notes
$(document).on('submit', 'form', function() {
	$.ajax({
		url: $(this).attr('action'),
		type: 'post',
		data: $(this).serialize()
	}).done(function(res) {
		$('#ajax-notes').empty().html(res);
		$('.add-note').val("");
	})
	return false;
})

$(document).on('change', '.note-box', function() {
	$(this).parent().submit();
})
</script>

<body>
	<div class='container'>
		<h1>Notes</h1>
		<hr>
		<!-- Ajax calls adds html inside div -->
		<div id='ajax-notes'>
		</div>
		<div class='add-cont'>
			<form action='/main/create' method='post'>
				<h4>Title</h4>
				<input class='add-note' name='title' type='text'>
				<h4>Description</h4>
				<input class='add-note' name='description' type='text'>
				<input type='submit' value='add notes'>
			</form>
		</div>
	</div>
</body>
</html>