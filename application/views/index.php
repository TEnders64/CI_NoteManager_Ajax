<html>
<head>
	<title>Note Manager</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
		$(document).ready(function(){

			$('form').submit(function(){
				$.post($(this).attr('action'), $(this).serialize(), function(result){
					console.log(result);
					$('#note').append(
						"<div name='"+result.id+"'>"+
							"<h3>"+result.title+"</h3><a class='"+result.id+"' href='notes/delete/"+result.id+"'><h4>Delete</h4></a>"+
							"<form class='outline' action='notes/update/"+result.id+"' method='post'>"+
								"<textarea name='content' id='"+result.id+"'>"+result.description+"</textarea>"+
							"</form>"+
						"</div>");
					$('#title').val("");
				}, 'json');
				return false;
			});

			$('#note').on("focusout", "form", function(){
				$.post($(this).attr('action'), $(this).serialize(), function(output){
					console.log(output);
				}, 'json');
				return false;
			});

			$('#note').on("click", "a", function(){
				console.log(this);
				var div_name = $(this).attr('class');
				console.log(div_name);
				//deleting the note from DB
				$.get($(this).attr('href'), function(){
					//hide the note!
					$('div[name='+div_name+']').slideUp();
					
				});
				return false;
			});

		})
	</script>
	<style>
		.container{
			width: 20%;
			margin: 5% 30%;
		}
		h5, #note{
			border-bottom: 1px solid silver;
		}
		h3, h4{
			display: inline-block;
			vertical-align: top;
			width: 50%;
		}
		h4{
			text-align: right;
		}
		.outline{
			border-bottom: 1px solid gray;
			margin: 10px;
			padding: 5px;
		}
		.form-container{
			margin-top: 10px;
			text-align: center;
		}
		input[name="title"]{
			width: 60%;
		}
		input[type="submit"]{
			width: 30%;
			background: blue;
			color: white;
			border: none;
			border-radius: 5px;
		}
		textarea{
			width: 100%;
			height: 30%;
		}
	</style>
</head>
<body>
	<div class="container">
		<h5>Notes</h5>
		<div id="note"></div>
		<div class="form-container">
			<form action="/notes/create" method="post">
				<input type="text" id="title" name="title" placeholder="Insert note title" />
				<input type="submit" value="Add Note" />
			</form>
		</div>
	</div>
</body>
</html>