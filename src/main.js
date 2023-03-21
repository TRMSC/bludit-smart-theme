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