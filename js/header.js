function handlePauseBtn(e) {
    //pause video
    $("#aspMasthead").toggleClass("paused");
    $("#aspMasthead").hasClass("paused") ? $('#aspHeroVideo').get(0).pause() : $('#aspHeroVideo').get(0).play();

    //toggle button
    $("#aspMasthead").hasClass("paused") ? $("#aspPlayPause").html('<span class="ic-play sm white"></span>Play') : $("#aspPlayPause").html('<span class="ic-pause sm white"></span>Pause');
}

$("#aspPlayPause").on('click', this.handlePauseBtn);

/*
 *  Toggle lightbox
 */ 
function handleLightboxToggle(e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("TEST")
    // Toggle Lightbox
    $("#aspLightboxContainer").toggleClass("hide");
}

$("#aspTriggerLightbox").on('click', this.handleLightboxToggle);
$("#aspLightboxClose").on('click', this.handleLightboxToggle);
