/*
if (screen.orientation) {
    // Try to lock the screen orientation to landscape
    screen.orientation.lock("landscape")
        .then(() => {
            console.log("Screen orientation locked to landscape");
        })
        .catch(error => {
            console.error("Failed to lock screen orientation: ", error);
        });
} else {
    console.error("screen.orientation API not supported");
}*/
if (screen.msOrientation) {
    screen.msOrientation = "landscape";
} else {
    console.log("msOrientation not supported");
}
