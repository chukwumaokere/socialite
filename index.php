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
	<div id="header" class="header">
	<div class="row">
		<div class="col-xs-2"><img class="logo" src="public/images/icon.png"></div>
		<div class="col-xs-5 header-links active"><a href="#home">Home</a></div>
		<div class="col-xs-4 header-links"><a href="#Other">Other</a></div>
	</div>
	</div>

	<div class="contents" id="scrollable-content">
		<div class="tile" id="fb">
			<div class="tophalf">
				<img class="icon">
			</div>
			<div class="api-return">
				Some stuff goes here
			</div>
		</div>	
		<div class="tile" id="fb">
                        <div class="tophalf">
                                <img class="icon">
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
                </div>  
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
		<div class="tile" id="fb">
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
		if (selectedid){
		//	$(this).find('img').attr('src', function(){ return "public/images/" + this.id});
			//$(this).find('img').attr('src', "public/images/" + $(this).parent.parent.id + '.png');
			//$(this).children("img").attr('src', 'something');
			$(`#${selectedid}`).children("img").attr('src', selectedid + '.png');
			//$("div#fb img").attr('src', 'public/images/fb.png');
			$(`div#${selectedid} img`).attr('src', `public/images/${selectedid}.png`);
			console.log($("#fb").children("img").attr('src', 'public/images/fb.png'));
			//console.log($("#fb").children("img"));
			//console.log($("img"));
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
