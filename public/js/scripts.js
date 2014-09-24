/**
 * 
 */
	// RESET WIDGETS
	$('#guest').click(function(e) {
		
		var $this = $(this);
		
		$.widresetMSG = $this.data('guest-msg');
		
		$.SmartMessageBox({
			title : "<i class='fa fa-refresh' style='color:green'></i> Guest Notification",
			content : $.widresetMSG || "You are logged in as a guest. You may be required to provide a digital signature for certain requests",
			buttons : '[Ok]'
		}, function(ButtonPressed) {
			if (ButtonPressed == "Ok") {				
				location.reload();
			}
		});
		e.preventDefault();
	});
	
	/* signature pad start */
	var wrapper = document.getElementById("signature-pad"),
	clearButton = wrapper.querySelector("[data-action=clear]"),
	saveButton = wrapper.querySelector("[data-action=save]"),
	canvas = wrapper.querySelector("canvas"),
	signaturePad;

	//Adjust canvas coordinate space taking into account pixel ratio,
	//to make it look crisp on mobile devices.
	//This also causes canvas to be cleared.
	function resizeCanvas() {
	var ratio =  window.devicePixelRatio || 1;
	canvas.width = canvas.offsetWidth * ratio;
	canvas.height = canvas.offsetHeight * ratio;
	canvas.getContext("2d").scale(ratio, ratio);
	}

	window.onresize = resizeCanvas;
	resizeCanvas();

	signaturePad = new SignaturePad(canvas);

	clearButton.addEventListener("click", function (event) {
	signaturePad.clear();
	});

	saveButton.addEventListener("click", function (event) {
	if (signaturePad.isEmpty()) {
	    alert("Please provide signature first.");
	} else {
	    window.open(signaturePad.toDataURL());
	}
	});

	/* end of signature pad */