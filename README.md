[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

Fuzzy Pancake -- WordPress theme
===

Hi! Thanks for checking out the Fuzzy Pancake WordPress theme. This theme is designed for bloggers and personal brands -- but I guess you could use it for most anything!

Here are a few special features:

* Custom hero section where you can tell the world about you the cool things you do
* Featured posts in a card layout. You can show off whatever category you want
* Custom slideshow gallery for, well, slideshows
* Custom sidebars -- one for the main page and one for the footer of your posts
* Fully responsive. It looks good on mobile, tablet, and desktop.
* Unique fonts: The theme uses Crimson Text and Lora.

Oh, and one more thing to know:

* Built by me, a writer and not a developer, meaning "things might break occasionally but I'm trying my best thanks for understanding"

Getting Started
---------------

If you want to use this theme for your WordPress website, you can download the zip file from Github here.

//screenshot

A couple notes:

* You need to unzip it, remove something, then rezip it
* I don't know how to do this on a Windows computer

Theme Setup  
-----------

Screenshots  
-----------

keep it simple, head over to http://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `_s` from GitHub. The first thing you want to do is copy the `_s` directory and change the name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in style.css.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.

OR

* Search for: `'_s'` and replace with: `'megatherium-is-awesome'`
* Search for: `_s_` and replace with: `megatherium_is_awesome_`
* Search for: `Text Domain: _s` and replace with: `Text Domain: megatherium-is-awesome` in style.css.
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium_is_Awesome</code>
* Search for: `_s-` and replace with: `megatherium-is-awesome-`

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
