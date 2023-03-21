/**
 * Prepare page and call smart plugins script if it exists
 * 
 * @event
 * @listens onload
 * @class window 
 * @returns {void}
 *
 */
window.onload = () => {

    // Run internal functions
    setBodyPadding();
    addAltText();

    //Call the Smart Plugin's runSmartPlugin function if it is installed
    if (typeof runSmartPlugin === 'function') {
        runSmartPlugin();
    }
  
};


/**
 * Set padding for pages body and scroll to new screen position
 * 
 * @async
 * @function setBodyPadding
 * @returns {Promise} Scroll to the new screen position
 *
 */
setBodyPadding = async () => {

    // Set padding
    const navbarHeight = document.querySelector('.navbar').offsetHeight;
    const footerHeight = document.querySelector('footer').offsetHeight;
    document.body.style.padding = navbarHeight + 'px 0 ' + (footerHeight + 50) + 'px 0';

    // Get scroll position
    const currentScroll = window.scrollY;
    const newScroll = currentScroll - navbarHeight;

    // Scroll window
    await new Promise(resolve => setTimeout(resolve, 0));
    window.scrollTo({
      top: newScroll,
      behavior: 'smooth'
    });

};



/**
 * Add a button to images within page for showing the alternative text.
 * 
 * @function
 * @returns {void}
 * 
 */
addAltText = () => {

  const images = document.querySelectorAll(".page img");

  images.forEach(image => {
    const button = document.createElement("button");
    button.style.opacity = "0.9";
    button.style.position = "absolute";
    button.style.left = image.offsetLeft + "px";
    button.style.bottom = image.offsetLeft + "px";
    button.style.margin = "10px";
    button.textContent = "ALT";
    button.classList.add('btn', 'btn-dark', 'btn-sm');

    button.addEventListener("click", () => {
      if (button.textContent === "ALT") {
        const altText = image.alt || "No alt text available.";
        button.textContent = altText;
      } else {
        button.textContent = "ALT";
      }
    });

    image.parentNode.insertBefore(button, image.nextSibling);
  });

}