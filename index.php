<html>
<head>
<title>USA Top 10 Musics</title>
<style type="text/css">
  body{
    background-image: url('https://i.pinimg.com/736x/f3/5a/0d/f35a0d29d4d68a1a4fb6728052322e7f.jpg')
  }
</style>
<style>
	body {font-family:cursive;}
    .bigYellow {
      font-size: 25px;
      color: #f5e90c;
    }
  
    .poster img{
      position: center;
      max-width: 200px;
    }
    .container2{
      background-color: silver;
      border-radius: 20px;
      padding: 10px;
      margin-bottom:5px;
      position:relative; 
    }
     
   .container{
    background-color: darkblue;
    border:1px solid #5e1294;
    border-radius: 5px;
    padding: 50px;
    margin-bottom:30px;
    position:relative;  
   }
   
  
   .film{
    color: black;
    border:10px solid #5e1294;
    background-color: gray;
    border-radius: 5px;
    padding: 50px;
    margin-bottom:5px;
    position:relative;   
  }
 
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }
  .pic img{
	max-width:200px;
}
</style>
<script src="https://code.jquery.com/jquery-latest.js"></script>
  
<script type="text/javascript">
function bondTemplate(film){
  return `
        <div class="container">
        <div class="film">
        <b>Artist</b>: ${film.Artist}<br />
        <b>Title</b>: ${film.Title}<br />
        <b>Year</b>: ${film.Year}<br />
        <b>Gener</b>: ${film.Gener}<br />
        <b>Producer</b>: ${film.Producer}<br />
        <b>Writer</b>: ${film.Writer}<br />
      </div>
        <div class="pic"><img src="thumbnails/${film.Image}" /></div>
      </div>
  `;
  
}
  
$(document).ready(function() { 
 
 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
     console.log(data);
//let myData = JSON.stringify(data,null,4);
  //  myData = "<pre>" + myData + "</pre>";
    //$("#output").html(myData);
//use data.title to show the order of films
    $("#filmtitle").html(data.title);
//clear the previous films
     $("#films").html("");
  //loop through data.films and add to #films div
    $.each(data.films,function(i,item){
      let myFilm = bondTemplate(item);
      $("<div></div>").html(myFilm).appendTo("#films");
    });
  
   });
   request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });
 
  });
}); 
</script>
</head>
	<body>
  <div class="container2">
	<h1>Billboard Hot 100 Top 10</h1>
  </div>
    <div class="poster"><img src="images/Pose.jpg" /></div>
    
    <div class="container2">
    <div class="bigYellow">
		<a href="year" class="category">Current Top 10 by Winner</a><br />
		<a href="box" class="category">Current Top 10 by alphabetical </a>
    <div>
		<h3 id="filmtitle">This is a Web Service</h3>
    
		<div id="films">
    </div>
    </div>
      <div id="output">By, Michael Bilhu</div>
	</body>
</html>