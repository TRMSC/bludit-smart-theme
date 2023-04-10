/**
 * Define const variables
 * 
 * @param {array} shareData Site information for share method
 *
 */
const shareData = {
  title: document.title,
  text: document.title,
  url: window.location
};



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
    generateShareImage();
    createToc();
    addSmartPreview();

    // Call the Smart Plugin's runSmartPlugin function if it is installed
    if (typeof runSmartPlugin === 'function') {
        runSmartPlugin();
    }

    // Build function for adding event listeners
    const addClickEvent = function(element, handler) {
        element.addEventListener('click', handler);
    };

    // Add event listener for sharing buttons
    const shareElements = document.getElementsByClassName('share');
    for (let i = 0; i < shareElements.length; i++) {
      addClickEvent(shareElements[i], sharePage);
    }

    // Add event listener for scrolling to top
    window.addEventListener("scroll", scrollToTop);
  
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
 * Discover image for generating og meta tag
 *
 * @function generateShareImage
 * @returns {void}
 * 
 */
generateShareImage = () => {

  const discoverImage = () => {

    // Search for landing page image
    let shareImage = document.querySelector('img.landingpage-image');
    if (shareImage) {
      return shareImage.src;
    }

    // Search for cover image
    shareImage = document.querySelector('.page-cover-image');
    if (shareImage ) {
      return shareImage.style.backgroundImage.replace(/^url\(['"]?/, '').replace(/['"]?\)$/, '');
    }

    // Search for favicon
    shareImage = document.querySelector('link[rel="shortcut icon"], link[rel="icon"]');
    if (shareImage) {
      return shareImage.href;
    }

    // No image found
    return null;
  
  };

  const shareImageUrl = discoverImage();
  const headElement = document.querySelector('head');
  const ogImageMetaTag = document.createElement('meta');
  ogImageMetaTag.setAttribute('property', 'og:image');
  ogImageMetaTag.setAttribute('content', shareImageUrl);
  headElement.appendChild(ogImageMetaTag);

};



/**
 * Share page by using the share api
 * 
 * @async
 * @function sharePage
 * @throws {error} When the share api isn't available or the share fails
 * 
 */
sharePage = async () => {

  if (navigator.share) {

    // Try using share API
    try {
      await navigator.share(shareData);
      console.log('Shared successfully');
    } catch (err) {
      console.log(`Error: ${err}`);
    }

  } else {

    // Copy to clipboard
    const tempElement = document.createElement("input");
    tempElement.value = shareData.url;
    document.body.appendChild(tempElement);
    tempElement.select();
    document.execCommand("copy");
    document.body.removeChild(tempElement);   

    // Show info
    const popup = document.getElementById("clipboard-info");
    popup.classList.add("show");
    setTimeout(function() {
      popup.classList.remove("show");
    }, 1800);
  }
  
};





/**
 * Add a button to images within page for showing the alternative text.
 * 
 * @function addAltText
 * @returns {void}
 * 
 */
addAltText = () => {

  const images = document.querySelectorAll(".page img, .welcome img, .page-preview img, .landingpage-image");

  images.forEach(image => {
    const altText = image.alt;
    if (!altText) return;

    const button = document.createElement("button");
    button.style.opacity = "0.9";
    button.style.position = "absolute";
    button.style.left = image.offsetLeft + "px";
    button.style.margin = "10px";
    button.style.maxWidth = image.offsetWidth - 20 + "px";
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

};



/**
 * Create table of contents and handle button for interacting
 * 
 * @function createToc
 * @returns {void}
 * 
 */
createToc = () => {

  let toc = document.querySelector('#toc');
  if (!toc) return;

  let headings = document.querySelectorAll('.page-content h1, .page-content h2, .page-content h3, .page-content h4, .page-content h5, .page-content h6');
  if (headings.length === 0) return;
  let tocList = document.querySelector('#toc ul');
  tocList.innerHTML = '<br>' + tocList.innerHTML;

  let tocToggle = document.querySelector('#toc-toggle');
  tocToggle.addEventListener('click', function() {
    toc.classList.toggle('open');
    toc.classList.toggle('close');
    window.scrollTo({
      top: toc.classList.contains('close') ? (toc.offsetTop - 2 * tocToggle.offsetHeight) : toc.offsetTop,
      behavior: 'smooth'
    });
  });

  headings.forEach(function(heading) {
    let tocItem = document.createElement('li');
    let tocLink = document.createElement('a');
    let tag = heading.tagName.toLowerCase();
    
    tocItem.classList.add(tag);
    tocLink.textContent = heading.textContent;
    tocLink.addEventListener('click', function(e) {
      e.preventDefault();
      let scrollPosition = heading.offsetTop;
      window.scrollTo({
        top: scrollPosition,
        behavior: 'smooth'
      });
    });
    
    tocItem.appendChild(tocLink);
    tocList.appendChild(tocItem);
  });

};



/**
 * Control button for scrolling to top
 * 
 * @function scrollToTop
 * @returns {void}
 * 
 */
scrollToTop = () => {

  // Check pages offset
  const backToTopButton = document.querySelector("#back-to-top");
  if (window.pageYOffset > 300) { 
    backToTopButton.classList.add("show");
  } else {
    backToTopButton.classList.remove("show");
  }

  // Calculate the height of the footer and assign it to the bottom property of the button
  const footer = document.querySelector("footer");
  const footerHeight = footer.offsetHeight;
  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;
  const currentPosition = window.pageYOffset + windowHeight;
  const isReachedFooter = currentPosition > documentHeight - footerHeight;
  const bottomPosition = isReachedFooter ? footerHeight + 20 : 20;
  backToTopButton.style.bottom = `${bottomPosition}px`;

  // Scroll to top
  backToTopButton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

};



/**
 * Transform a-tags with the title="smart-preview" to link previews
 *
 * @function addSmartPreview
 * @returns {void}
 * 
 */
addSmartPreview = () => {

  // Select all smart-preview elements
  const smartPreviews = document.querySelectorAll('a[title="smart-preview"]');

  // Loop through each link-preview element
  smartPreviews.forEach(linkPreview => {
    // Get the URL of the link
    const url = linkPreview.getAttribute('href');
    const target = linkPreview.getAttribute('target');

    // Fetch the page data using the URL
    fetch(url)
      .then(response => response.text())
      .then(data => {
        // Parse the HTML data
        const parser = new DOMParser();
        const htmlDoc = parser.parseFromString(data, 'text/html');

        // Get the title and image of the page
        const title = htmlDoc.querySelector('title').textContent;
        const description = htmlDoc.querySelector('meta[name="description"]')?.content;
        const image = htmlDoc.querySelector('meta[property="og:image"]')?.content;

        // Create the link preview element
        const linkPreviewElem = document.createElement('a');
        linkPreviewElem.setAttribute('target', target || '_self');
        linkPreviewElem.href = url;
        linkPreviewElem.title = title;
        linkPreviewElem.classList.add('smart-preview');
        linkPreviewElem.innerHTML = `
            <div class="smart-preview-container">
              <img class="smart-preview-image" src="${image}">
              <div class="smart-preview-text">
                <h6>${title}</h6><p>${description}</p></div>
            </div>
          `;

        // Replace the link-preview element with the link preview
        linkPreview.replaceWith(linkPreviewElem);
      });
  });

};