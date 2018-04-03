<!DOCTYPE html>
<title>Socialite: All your social media in one place</title>

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
		<div class="col-xs-2"><a href="/socialite/"><img class="logo" src="public/images/icon.png"></a></div>
		<div class="col-xs-5 header-links active"><a href="#home">Home</a></div>
		<div class="col-xs-5 header-links"><a href="#Other">Other</a></div>
	</div>
	</div>

	<div class="contents" id="scrollable-content">
		<div class="tile" id="fb">
			<div class="tophalf">
				<img class="icon"> Facebook
			</div>
			<div class="api-return">
				Some stuff goes here
			</div>
		</div>	
		<div class="tile" id="fb">
                        <div class="tophalf">
                                <img class="icon"> Facebook
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
                </div>  
		<div class="tile" id="pt">
                        <div class="tophalf">
                                <img class="icon"> Pintrest
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
                </div>  
		<div class="tile" id="yt"> 
			<div class="tophalf">
				<img class="icon"> YouTube
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
		</div>
		<div class="tile" id="tw"> 
			<div class="tophalf">
				<img class="icon"> Twitter
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
		</div>
		<div class="tile" id="ig"> 
                        <div class="tophalf">
                                <img class="icon"> Instagram 
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
                </div>  
		<div class="tile" id="tw"> 
                        <div class="tophalf"> 
                                <img class="icon"> Twitter
                        </div>
                        <div class="api-return">
                                Some stuff goes here
                        </div>
                </div>
		<div class="tile" id="yt"> 
                        <div class="tophalf">
                                <img class="icon"> YouTube  
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
			$(`div#${selectedid} img`).attr('src', `public/images/${selectedid}.png`);
		}
                x++;
        }
});
</script>
</div>
</body>
</html>
