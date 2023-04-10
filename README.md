# Smart-theme for Bludit

## About

Smart theme is created for the flat-file CMS [Bludit](https://www.bludit.com/) by setting priorities on elegance, functionality and customization.  

This theme is a standalone part of the **Smart series** and it is recommended to add the **[Smart plugin 🧩](https://github.com/TRMSC/bludit-smart-plugin)** for a variety of functions and setting options to your installation.

## Features

There are a lot of additional features when using the Smart theme in combination with the Smart plugin 🧩. Because of this the following list shows all of the Smart series features together.

### ✨ General:

- **Responsive** and **modern** design concerning all parts of the DOM
- Determination of **ideal aspect ratios** implemented through a **loading animation**
- **Default header** with websites title and description above the posts on the main page
- Substitute default header for the home page by adding a **landingpage** (Smart plugin 🧩)
- **Customize navbar and footer entries** (Smart plugin 🧩)
- **Light and dark mode** with the **advanced options** of **detecting system mode**, adding a **toggle button** in the navbar, setting **preferred mode** (Smart plugin 🧩)
- **Save display mode** by **clientside cookie** (Smart plugin 🧩)
- **Individual [Cascading Style Sheets (CSS)](https://developer.mozilla.org/en-US/docs/Web/CSS?retiredLocale=de)** for light and dark mode (Smart plugin 🧩)
- Optional **scroll trigger animations** for predefined or customized selectors (Smart plugin 🧩)
- **Button** for **scrolling to top**

### ✨ Sharing:

- **Sharing Buttons** in the navigation bar respectively in the burger menu and within pages
- Automatically created **[Open Graph](https://ogp.me/) meta tags**
- Optionally add own **images for [Open Graph](https://ogp.me/)** tag on every page by using [custom fields ⬇](#custom-fields)

### ✨ Images:

- **Button on images** for showing their **alternative texts**
- Add **alt tags for cover images** by using [custom fields ⬇](#custom-fields)

### ✨ Pages:

- **Display tags, categories, created, last edited, reading time** with appropriate icons
- **Expandable table of contents** area with **clickable entries** automatically generated within pages
- **Related pages** at the end of pages
- **Notice badge for static sites** within search and browse sections
- **Differentiated display** of posts and static pages
- Prepare urls within pages as [preview links ⬇](#preview-links)

## Custom fields
Smart theme supports the following [custom fields](https://docs.bludit.com/en/content/custom-fields).  
The fields are also documented within the smart plugins settings 🧩.

### Alt tags for cover image:
```
"coverImageAlt": {
    "type": "string",
    "placeholder": "Alt tag for cover image",
    "position": "bottom"
}
```

### Alternate Open Graph image URL:
```
"altOG": {
    "type": "string",
    "placeholder": "Open Graph Image URL",
    "position": "bottom"
}
```

## HTML implementations

### Preview links:

Prepare urls within pages as **preview links** by naming the link title as `smart-preview`. This can be done within the HTML code or directly within the Tiny MCE editor when a link is added.  
Preview links are displayed with the image, title and description of their target urls.  
This feature is also documented within the smart plugins settings 🧩.

### Share elements:

Use the class `share` for html elements to open the share dialog when it is clicked.  

## License notes

This repository is based on the [MIT licensed](https://github.com/bludit/bludit/blob/main/LICENSE) theme ["Alternative"](https://github.com/bludit/bludit/tree/main/bl-themes/alternative) of the [Bludit package](https://github.com/bludit/bludit) (Copyright (c) 2015-2021 Diego Najar).

All additional and changed features can be viewed in the [feature list](#Features), in the [history](https://github.com/TRMSC/bludit-smart-theme/commits/) and in the [release area](https://github.com/TRMSC/bludit-smart-theme/releases).

Check out the [license](/LICENSE) for more information.
