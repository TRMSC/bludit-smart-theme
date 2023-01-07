/**
 * Prepare page
 * 
 * @event
 * @listens onload
 * @class window 
 *
 */
window.onload = () => {

    setBodyPadding();
  
};


/**
 * Set padding for pages body
 * 
 * @function setBodyPadding
 *
 */
setBodyPadding = () => {
    const navbarHeight = document.querySelector('.navbar').offsetHeight;
    const footerHeight = document.querySelector('footer').offsetHeight;
    document.body.style.padding = navbarHeight + 'px 0 ' + (footerHeight + 50) + 'px';
};