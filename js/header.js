function handlePauseBtn(e) {
    $("#masthead").toggleClass("paused");
    $("#masthead").hasClass("paused") ? $('#headerVideo').get(0).pause() : $('#headerVideo').get(0).play();
}
$("#pause").on('click', this.handlePauseBtn);