# Cookie disclaimer
Wordpress cookie disclaimer plugin

## Business need
A website like ourselves, that saves cookies and gathers information on users must present a disclaimer telling the user that we save cookies.

## Scope
* **Sites:** For this task we will deal with our main partner, but the feature should be functional on all sites so that all we need to do is restyle it for use on other sites.
* **Pages:** any page whose theme is not "Landing Page".
* **Devices:** Must be displayed on desktop and tablet devices. A separate story will be opened for mobile browsers styling.

## Behavior
* X and "I accept" button have the same functionality - they close the banner
* Continues to be shown until the user closes it, even when navigating between pages
* Once the user closes it - it won't appear again (can be cookie-based)
* Like , links in the content will open in a separate browser tab


## Styling

![cookie disclaimer screenshot](https://github.com/HexagonTech/cookie-disclaimer/raw/master/sample.png "Example of cookie disclaimer")

* Banner is pinned to the same place in the bottom right of the browser window and stays there as the page is scrolled
* z-index: above fold but underneath dimouts
* Mirrored in RTL: Banner is pinned to the bottom left, text and button are aligned to the left
* Banner is resized vertically to accommodate for length of the content
* Button is resized horizontally to accommodate for the length of the text
 * Width: 211px
 * On overflow: use elipses + native OS tooltip when hovering on the button
* Fonts and text styling should match the active theme.

## CMS configuration
|Key|Tooltip usage|default value|
|---|---|---|
|cookie_statement|displayed always as the first sentence in the banner|	We use cookies to give you the best online experience|
|site_ownership_default|displayed as the second sentence in the banner|By using our website, you agree to our `<a href={url: privacy-policy} target="_blank">privacy policy</a>`|
|accept_button|text on the button always|I Accept|
|base-color|used to define base color for border and button|#f7c413|

## Scenarios
* User clears cookies/ incognito - will see the banner until they close it, even if they've seen it before
* Shows up regardless of whether user is logged in or guest
* User navigates between pages - will continue to see the banner until they close it


## Definition of done
* Provide link to a github repository of installable wordpress plugin source code.
* Provide link to a wordpress site front and admin, demonstration of yours implementation.
* **Extra credit:** Allow cookie disclaimer content to be configured per country of visitor.
