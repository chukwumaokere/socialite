<!DOCTYPE html>
<title></title>

<head>
<link href='public/css/style.css' rel='stylesheet'></link> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</script>
</head>

<body>
<div class="app-contents">
	<div id="header" class="header"></div>

	<div class="contents" id="scrollable-content">
		<div class="tile" id="fb">
			<div class="tophalf">
				<img class="icon">
			</div>
			<div class="api-return">
				Some stuff goes here
			</div>
		</div>	
		<div class="tile" id="yt">
			<div class="tophalf">
				<img class="icon">
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
		</div>
		<div class="tile" id="tw">
			<div class="tophalf">
				<img class="icon">	
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
		</div>
	</div>

	<div id="footer" class="footer"></div>
	<script>
$(document).ready(function() {
        var selector = document.getElementsByClassName('tile');
        var totalitems = selector.length;
        var x = 0;
        while (x < totalitems){
                var selected = selector[x];
		var selectedid = selected.id;
                console.log(selectedid);
		if (selectedid == 'fb'){
		//	$(this).find('img').attr('src', function(){ return "public/images/" + this.id});
			//$(this).find('img').attr('src', "public/images/" + $(this).parent.parent.id + '.png');
			//$(this).children("img").attr('src', 'something');
			console.log($(this).attr('src', 'testing'));
		}
                x++;
	//	$("img").attr('src', function(){ return "public/images/" + this.id})
	//console.log($("img"));
        }
});
</script>
</div>
</body>
</html>
