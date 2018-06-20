 function playaudiosong(playid,song_source){
// Create a new instance of an audio object and adjust some of its properties

var audio = new Audio();
audio.src = 'audio_upload/'+song_source;
audio.controls = true;
audio.loop = true;
audio.autoplay = true;
$(document).ready(function(){
	$("#upstart").css("padding-top","40px");
	$("#headinfo").css("padding-top","40px");
	$(".maintwo").css("margin-top","40px");
	$(".playbutton").click(function(){
		audio.src='audio_upload/'+$(this).attr('value');
		var dataString = '&currentsource='+ song_source;
	})
})
// Establish all variables that your Analyser will use
var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
// Initialize the MP3 player after the page loads all of its HTML into the window
	document.getElementById('audio_box').appendChild(audio);
	context = new webkitAudioContext(); // AudioContext object instance
	analyser = context.createAnalyser(); // AnalyserNode method
	canvas = document.getElementById('analyser_render');
	ctx = canvas.getContext('2d');
	// Re-route audio playback into the processing graph of the AudioContext
	source = context.createMediaElementSource(audio); 
	source.connect(analyser);
	analyser.connect(context.destination);
	frameLooper();
// frameLooper() animates any style of graphics you wish to the audio frequency
// Looping at the default frame rate that the browser provides(approx. 60 FPS)
function frameLooper(){
	window.webkitRequestAnimationFrame(frameLooper);
	fbc_array = new Uint8Array(analyser.frequencyBinCount);
	analyser.getByteFrequencyData(fbc_array);
	ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
	ctx.fillStyle = '#00CCFF'; // Color of the bars
	bars = 100;
	for (var i = 0; i < bars; i++) {
		bar_x = i * 3;
		bar_width = 2;
		bar_height = -(fbc_array[i] / 2);
		//  fillRect( x, y, width, height ) // Explanation of the parameters below
		ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
	}
}
}
		function checkpriviousaudiosong(playid,song_source)
	{
		$.ajax({
type: "POST",
url: "checksession.php",
cache: false,
success: function(result3){
		var priviousid=result3;	
		var dataString = '&song_source='+ song_source+'&playid='+playid;
		$.ajax({
type: "POST",
url: "createaudiosession.php",
data: dataString,
cache: false,
success: function(result){
		if(result==0)
		{
			$("#"+playid).html("<p style='cursor:pointer;color:#428bca;'>Now Playing | Restart</p>");
			playaudiosong(playid,song_source);
		}else if(result==21){
		}
		else if(result==31){
$("#"+priviousid).html("<i class='glyphicon glyphicon-play playbutton'style='font-size:29px;cursor:pointer;padding:20px;'></i>");
						$("#"+playid).html("<span style='cursor:pointer;color:#428bca;'>Now Playing | Restart</span>");
		}
	}
		})
		}
		});
}