function handleLightboxToggle(e) {
    e.preventDefault();
    e.stopPropagation();
    // Toggle Lightbox
    $("#aspLightboxContainer").toggleClass("hide");
}
console.log("TEST")

$("#aspTriggerLightbox").on('click', this.handleLightboxToggle);
$("#aspLightboxClose").on('click', this.handleLightboxToggle);
